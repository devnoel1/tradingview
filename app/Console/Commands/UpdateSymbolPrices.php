<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Symbol;
use App\Models\Wallet;
use App\Models\WalletSymbol;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Scheb\YahooFinanceApi\ApiClientFactory;
use DateTime;

class UpdateSymbolPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tradebase:update-symbol-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all active Symbol prices';

    private $quotes = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->getWalletSymbolQuotes();
        $this->getActiveOrderSymbolQuotes();
        $this->info(json_encode($this->quotes));
        $this->getUpdates();

        return 0;
    }

    private function getActiveOrderSymbolQuotes(): void
    {
        $orders = Order::whereIn('status', ['open', 'waiting', 'pending'])->get();
        foreach ($orders as $order) {
            $this->getSymbolQuotes($order->symbol);
        }
    }

    /**
     */
    private function getWalletSymbolQuotes(): void
    {
        $walletSymbols = WalletSymbol::where("amount", '>', '0')->get();
        foreach ($walletSymbols as $walletSymbol) {
            $this->getSymbolQuotes($walletSymbol->symbol);
        }
    }

    /**
     * @param $walletSymbol
     */
    private function getSymbolQuotes($symbol): void
    {
        $quoteSymbol = $symbol->code;
        if ($symbol->type == 'crypto') {
            $quoteSymbol = $quoteSymbol . "-" . $symbol->currency;
        } elseif ($symbol->type == 'forex') {
            $quoteSymbol = $quoteSymbol . "=X";
        } elseif ($symbol->type == 'commodities') {
            $quoteSymbol = $quoteSymbol . "=F";
        }
        if (!in_array($quoteSymbol, $this->quotes)) {
            $this->quotes[] = $quoteSymbol;
        }
    }

    private function getUpdates(): void
    {
        $guzzleClient = new Client([]);
        $client = ApiClientFactory::createApiClient($guzzleClient);
        $results = $client->getQuotes($this->quotes);

        foreach($results as $result){
            $symbol_code = $result->getSymbol();
            $symbol_price = $result->getRegularMarketPrice();
            if($this->isOpenMarket($result)){
                $this->info($symbol_code . " is open, price: " . $symbol_price);
                $symbol = $this->getSymbolByQuoteCode($symbol_code);
                $symbol->last_value = $symbol_price;
                $symbol->save();
                $this->processSymbolOrders($symbol);
            }
        }
    }

    /**
     * @param \Scheb\YahooFinanceApi\Results\Quote $result
     */
    private function isOpenMarket(\Scheb\YahooFinanceApi\Results\Quote $result): bool
    {
        $market_time = $result->getRegularMarketTime();
        $now = new DateTime();
        $diff = $now->diff($market_time);
        $hours = $diff->h;
        $hours = $hours + ($diff->days * 24);
        if ($hours == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string|null $symbol_code
     * @return mixed
     */
    private function getSymbolByQuoteCode(?string $symbol_code)
    {
        $search_symbol = $symbol_code;
        if (str_contains($symbol_code, "-")) {
            // process crypto
            $search_symbol = explode("-", $symbol_code)[0];
        } elseif (str_contains($symbol_code, "=X")) {
            // process forex
            $search_symbol = str_replace($symbol_code, "=X");
        } elseif (str_contains($symbol_code, "=F")) {
            // process commodities
            $search_symbol = str_replace($symbol_code, "=F");
        }
        $symbol = Symbol::where('code', $search_symbol)->first();
        return $symbol;
    }

    /**
     * @param Symbol $symbol
     */
    private function processSymbolOrders(Symbol $symbol): void
    {
        $orders = Order::where('symbol_id', $symbol->id)->whereIn('status', ['open', 'waiting', 'pending', 'waiting_sell'])->get();
        foreach ($orders as $order) {
            $total = $order->order_total;
            $wallet = $order->wallet;
            if($order->status == 'waiting' || $order->status == 'waiting_sell'){
                if($order->type == 'buy') {
                    if ($wallet->balance > $total) {
                        $this->executeOrder($order, $order->type);
                    } else {
                        $order->status = 'cancelled';
                        $order->save();
                    }
                }elseif($order->type == 'sell'){
                    $in_wallet = $this->isSymbolInWallet($wallet, $symbol);
                    if($in_wallet !== null && $in_wallet->amount >= $order->amount){
                        $this->executeOrder($order, $order->type);
                    }else{
                        $order->status = 'cancelled';
                        $order->save();
                    }
                }
            }elseif($order->status=='pending') {
                if($order->type == 'buy'){
                    if ($order->limit <= $symbol->last_value) {
                        if ($wallet->balance >= $total) {
                            $this->executeOrder($order, $order->type);
                        } else {
                            $order->status = 'cancelled';
                            $order->save();
                        }
                    }
                }elseif($order->type == 'sell'){
                    if ($order->limit >= $symbol->last_value) {
                        $in_wallet = $this->isSymbolInWallet($wallet, $symbol);
                        if($in_wallet !== null && $in_wallet->amount >= $order->amount){
                            $this->executeOrder($order, $order->type);
                        }else{
                            $order->status = 'close';
                            $order->save();
                        }
                    }
                }
            }elseif($order->status='open'){
                if($symbol->last_value <= $order->stop_price){
                    if ($wallet->balance >= $total) {
                        $this->executeOrder($order, 'sell');
                    } else {
                        $order->status = 'close';
                        $order->save();
                    }
                }
                if($order->leverage > 0){
                    $wallet_symbol_price = $this->getWalletSymbolPrice($wallet, $symbol);
                    $leverage_symbol_price = $wallet_symbol_price * $order->leverage;
                    $price = $order->amount * $leverage_symbol_price;
                    $percentage_changed = $this->getPercentageChange($order->price, $price);
                    if($percentage_changed >= 90){
                        $order->status = 'close';
                        $order->sell_wallet_symbol_price = $wallet_symbol_price;
                        $order->sell_price = $price;
                        $order->sell_order_total = 0;
                        $order->save();
                        $this->updateWalletSymbolAmount($wallet, $symbol, $order, 'sell');
                    }
                }
            }
        }
    }

    private function getPercentageChange($oldNumber, $newNumber){
        $decreaseValue = $oldNumber - $newNumber;
        return ($decreaseValue / $oldNumber) * 100;
    }

    private function getWalletSymbolPrice(Wallet $wallet, Symbol $symbol)
    {
        foreach($wallet->walletSymbols() as $walletSymbol){
            if($walletSymbol->symbol_id == $symbol->id){
                return $walletSymbol->getSymbolPrice();
            }
        }
    }

    /**
     * @param WalletSymbol $wallet_symbol
     * @param Order $order
     * @param $type
     */
    private function updateWalletSymbol(WalletSymbol $wallet_symbol, Order $order, $type): void
    {
        if ($type == 'buy') {
            $wallet_symbol->amount += $order->amount;
        } elseif ($type == 'sell') {
            $wallet_symbol->amount -= $order->amount;
        }
        $wallet_symbol->save();
    }

    public function isSymbolInWallet(Wallet $wallet, Symbol $symbol){
        $in_wallet = null;
        foreach ($wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $symbol->id) {
                $in_wallet = $wallet_symbol;
            }
        }
        return $in_wallet;
    }

    /**
     * @param $wallet
     * @param Symbol $symbol
     * @param $order
     * @param $type
     */
    private function updateWalletSymbolAmount($wallet, Symbol $symbol, $order, $type): void
    {
        $in_wallet = false;
        foreach ($wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $symbol->id) {
                $in_wallet = true;
                $this->updateWalletSymbol($wallet_symbol, $order, $type);
            }
        }
        if ($in_wallet == false) {
            $wallet_symbol = WalletSymbol::create([
                'wallet_id' => $wallet->id,
                'symbol_id' => $symbol->id,
                'amount' => 0
            ]);
            $wallet_symbol->save();
            $this->updateWalletSymbol($wallet_symbol, $order, $type);
        }
    }

    /**
     * @param Order $order
     * @param $type
     * @return array
     */
    private function executeOrder(Order $order, $type)
    {
        $order->executeOrderStatusUpdate($type);
        $order->processOrderBalanceSymbolTradingVolume();
    }
}
