<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Symbol;
use App\Models\UserSymbol;
use App\Models\Wallet;
use App\Models\WalletSymbol;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SymbolBuy extends Component
{
    public $active_exchange;
    public $active_symbol;
    public $active_symbol_id;
    public $active_code;
    public $user;
    public $currentSymbol;
    public $symbol_price;
    public $wallet_symbol_price;
    public $active_wallet;
    public $symbol_in_wallet;

    public $selectedType = 'buy';
    public $selectedOrderType = 'market';
    public $price = 0.00;
    public $stop = 0.00;
    public $amount = 0;
    public $limit = 0.00;
    public $leverage = 0;

    public $order_fee = 0.00;
    public $order_price = 0.00;
    public $initial_margin = 0.00;
    public $market_open;
    public $message;
    public $error;
    public $time;
    public $symbol_order_fee;
    public $order_button_enabled = true;

    public function mount()
    {
        $this->user = Auth::user();
        $this->active_wallet = Wallet::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();

        $userSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();
        $this->currentSymbol = $userSymbol->symbol;
        if ($userSymbol !== null) {
            $this->active_exchange = $userSymbol->symbol->exchange->code;
            $this->active_symbol_id = $userSymbol->symbol->id;
            if ($userSymbol->symbol->type == 'crypto') {
                $this->active_symbol = $userSymbol->symbol->code . $userSymbol->symbol->currency;
            } else {
                $this->active_symbol = $userSymbol->symbol->code;
            }
            $this->active_code = $this->active_exchange . ":" . $this->active_symbol;
        } else {
            $this->active_code = "NASDAQ:AAPL";
            $this->currentSymbol = Symbol::where('id', '=', 1)->first();
        }
        
        $this->error = null;

        $this->symbol_in_wallet = $this->symbolAmountInWallet();
        $this->updateSymbolPrice();

        $this->setSymbolOrderFee();
    }


    // done: add used margin to wallet
    // todo: add margin call calculation
    // done: add update wallet / check if order limit or stop
    // done: do order with margin (pending or open status) (see margin used on the order, in combination too own balance)
    // done: do calculation with forex exchange from type to wallet
    // done: add option for max amount in wallet

    // done: wallet type == margin or not
    // done: margin == loan of money on account (need to hava a balance to pay for) (als je dat niet kan krijg je call / wordt het gesloten)
    // done: leverage == multiplyer of the market fluctuation (in the market (fluctuatie) bij 90% verlies alles verkopen)(en is de gebruiker alles kwijt)
    // todo: Open P&L == hoeveel verschil van Profit & Lost ration (per trade) (of op heel account)

    // done: mogelijk maken geld van wallet A naar wallet B over te zetten
    // done: bij storten (kiezen op welke wallet)
    // done: add maintance margin (25%) elke X dag van de maand ( https://budgeting.thenest.com/calculate-maintenance-margin-29150.html )
    // todo: send margin call email (or show in CRM)

    // todo: trading volume (total of specific stock traded in specific date) UCT (time) (EUROPEAN TIME) Total of all orders volume of the date.
    // todo: all orders that are executed, will be added to the trading volume. If the position is closed within 24 hours it will be deducted of the trading volume.
    // todo: every 24 hours check the total trading volume of a asset.)(and check the +- volume of the asset of that 24 hours) if +- is lower deduct difference of the volume)
    // Trading volume asset total = 50, Trading volume asset total differnce = 5, Trading volume difference = 45 so the Total trading volume asset = 5;

    public function closeMessage(){
        $this->error = null;
        $this->message = null;
    }

    public function placeOrder()
    {
        if($this->validateOrder()) {
            $this->processOrder();

            $this->error = null;
            $this->message = "Order placed successfully";
        }

//        return redirect()->to(route('trade'));
    }

    public function render()
    {
        return view('livewire.symbol-buy');
    }

    /**
     * @return int|mixed
     */
    private function symbolAmountInWallet()
    {
        $amount = 0;
        foreach ($this->active_wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $this->active_symbol_id) {
                $amount += $wallet_symbol->amount;
            }
        }
        return $amount;
    }

    private function updateSymbolPrice(): void
    {
        $this->currentSymbol->updateSymbolPrice();
        $this->symbol_price = $this->currentSymbol->last_value;
        $this->market_open = $this->currentSymbol->updateSymbolPriceWithOpenMarket();
    }

    public function setType($type){
        $this->error = null;
        $this->selectedType = $type;
        $this->resetFields();
    }
    public function setOrderType($type){
        $this->selectedOrderType = $type;
    }

    public function updatePrices(){

        $this->error = null;

        $this->order_price = $this->price;
        $this->updateSymbolPrice();

        $this->wallet_symbol_price = $this->getWalletSymbolPrice();
        // $this->setEmptyFieldsToZero();

        $price = $this->price;
        if($price == null or $price == ''){
            $price = 0;
        }
        $amount = $this->amount;
        if($amount == null or $amount == ''){
            $amount = 0;
        }

        if($this->selectedType == 'buy'){
            if($this->selectedOrderType =='market') {
                $amount = round_up($price / $this->wallet_symbol_price, 8);
                $this->amount = $amount;
            }else{
                $price = round_up($amount * $this->wallet_symbol_price, 2);
                $this->price = $price;
            }
        }elseif($this->selectedType == 'sell'){
            $price = round_up($amount * $this->wallet_symbol_price, 2);
        }
        $this->order_fee = round_up($price * $this->symbol_order_fee, 2);
        $this->order_price = round_up($price + $this->order_fee, 2);

        if($this->active_wallet->margin && $this->selectedType == 'buy'){
            $this->initial_margin = round_up($this->order_price * $this->user->userProfile->level->inital_margin_perc, 2);
        }
    }

    public function setSellMax(){
        $this->amount = $this->symbol_in_wallet;
        $this->updatePrices();
    }

    public function setBuyMax(){
        if($this->active_wallet->margin){
            $margin_total = 1 / $this->user->userProfile->level->inital_margin_perc;
            $this->price = round_up($this->active_wallet->balance * $margin_total, 2);
            $this->updatePrices();
            $this->price = round_up(($this->active_wallet->balance * $margin_total) - $this->order_fee, 2);
            $this->updatePrices();
        }else {
            $this->price = round_up($this->active_wallet->balance, 2);
            $this->updatePrices();
            $this->price = round_up($this->active_wallet->balance - $this->order_fee, 2);
            $this->updatePrices();
        }
    }

    private function setEmptyFieldsToZero(): void
    {
        if ($this->price == null or $this->price == '') {
            $this->price = 0;
        }
        if ($this->stop == null or $this->stop == '') {
            $this->stop = 0;
        }
        if ($this->amount == null or $this->amount == '') {
            $this->amount = 0;
        }
        if ($this->limit == null or $this->limit == '') {
            $this->limit = 0;
        }
    }

    private function processOrder(): void
    {
        $this->order_button_enabled = false;
        $this->setEmptyFieldsToZero();
        $this->updatePrices();
        $order_array = [
            'wallet_id' => $this->active_wallet->id,
            'symbol_id' => $this->active_symbol_id,
            'type' => $this->selectedType,
            'status' => 'close',
            'amount' => $this->amount,
            'symbol_price' => $this->symbol_price,
            'wallet_symbol_price' => $this->wallet_symbol_price,
            'price' => $this->price,
            'limit_price' => null,
            'stop_price' => null,
            'fee' => $this->order_fee,
            'leverage' => $this->leverage,
            'order_total' => $this->order_price,
        ];
        if ($this->selectedOrderType == 'limit') {
            $order_array['limit_price'] = $this->limit;
            $order_array['status'] = 'pending';

        } elseif ($this->selectedOrderType == 'stop') {
            $order_array['limit_price'] = $this->limit;
            $order_array['stop_price'] = $this->stop;
            if($this->limit == null or $this->limit <= 0){
                $order_array['status'] = 'open';
            }else{
                $order_array['status'] = 'pending';
            }

        }
        if($this->active_wallet->margin){
            $order_array['initial_margin'] = $this->initial_margin;
        }
        if($this->leverage > 0){
            $order_array['status'] = 'open';
        }
        if($this->market_open == false){
            $order_array['status'] = 'waiting';
        }

        $order = Order::create($order_array);
        $order->save();

        $order->processOrderBalanceSymbolTradingVolume();

        $this->order_button_enabled = true;
        $this->emit('orderPlaced');
        $this->symbol_in_wallet = $this->symbolAmountInWallet();
        $this->resetFields();
    }

    /**
     * @return bool
     */
    private function validateOrder(): bool
    {
        $valid = true;
        if ($this->amount == 0 || $this->price == 0) {
            $this->error = "Amount must be specified";
            $valid = false;
        } elseif ($this->selectedOrderType == 'stop') {
//            if ($this->selectedType == 'buy' && $this->stop < $this->limit) {
//                $this->error = "Stop must be lower than limit";
//                $valid = false;
//            }elseif($this->selectedType == 'sell' && $this->stop > $this->limit) {
//                $this->error = "Stop must be lower than limit";
//                $valid = false;
//            }
        }
        if ($this->selectedType == 'buy') {
            if($this->active_wallet->margin){
                if($this->initial_margin > $this->active_wallet->balance){
                    $this->error = "Insufficient funds for margin";
                    $valid = false;
                }
            }else {
                if ($this->order_price > $this->active_wallet->balance) {
                    $this->error = "Insufficient funds";
                    $valid = false;
                }
            }
        } elseif ($this->selectedType == 'sell') {
            if ($this->amount > $this->symbol_in_wallet) {
                $this->error = "Insufficient funds";
                $valid = false;
            }
        }
        $this->emit('orderPlacingError');
        return $valid;
    }

    private function getWalletSymbolPrice()
    {
        foreach ($this->active_wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $this->currentSymbol->id) {
                return $wallet_symbol->getSymbolPrice();
            }
        }
        $wallet_symbol = WalletSymbol::create([
            'wallet_id' => $this->active_wallet->id,
            'symbol_id' => $this->currentSymbol->id,
            'amount' => 0
        ]);
        $wallet_symbol->save();
        return $wallet_symbol->getSymbolPrice();
    }

    private function resetFields(): void
    {
        $this->amount = 0;
        $this->price = 0;
        $this->limit = 0;
        $this->leverage = 0;
        $this->stop = 0;
        $this->order_fee = 0;
        $this->order_price = 0;
        $this->initial_margin = 0;
    }

    private function setSymbolOrderFee(): void
    {
        if ($this->currentSymbol->type == 'stock') {
            $this->symbol_order_fee = $this->user->userProfile->level->stock_order_fee;
        } elseif ($this->currentSymbol->type == 'crypto') {
            $this->symbol_order_fee = $this->user->userProfile->level->crypto_order_fee;
        } elseif ($this->currentSymbol->type == 'forex') {
            $this->symbol_order_fee = $this->user->userProfile->level->forex_order_fee;
        } elseif ($this->currentSymbol->type == 'indices') {
            $this->symbol_order_fee = $this->user->userProfile->level->indices_order_fee;
        } elseif ($this->currentSymbol->type == 'commodities') {
            $this->symbol_order_fee = $this->user->userProfile->level->commodities_order_fee;
        }
    }
}

// https://www.help.saxo/hc/en-ch/articles/360030994671-What-is-Initial-and-Maintenance-margin-
// https://www.bybit.com/en-US/contract-rules/
// https://budgeting.thenest.com/short-sales-stock-market-work-3776.html

// https://academy.binance.com/en/articles/binance-margin-trading-guide (deze manier)
// 0.02%  == default (margin)
// leverage == 20 / 40 / 60 / 80 (Daar wordt de daal en stijding van stock extra gerekend)

//


// Example: If the margin is 0.02, then the margin percentage is 2%,
// and leverage = 1/0.02 = 100/2 = 50. To calculate the amount of margin used,
// multiply the size of the trade by the margin percentage.
// Leverage trade close automatically at a loss of 90%
// https://medium.com/@sol_98230/what-is-trading-with-leverage-and-how-does-it-multiply-profits-1907a22a2209


//{"ask":139.52,
//"askSize":14,
//"averageDailyVolume10Day":64606825,
//"averageDailyVolume3Month":82313120,
//"bid":139.51,
//"bidSize":11,
//"bookValue":4.146,
//"currency":"USD",
//"dividendDate":{"date":"2021-05-13 00:00:00.000000",
//"timezone_type":1,
//"timezone":"+00:00"},
//"earningsTimestamp":{"date":"2021-04-28 16:30:00.000000",
//"timezone_type":1,
//"timezone":"+00:00"},
//"earningsTimestampStart":{"date":"2021-07-28 10:59:00.000000",
//"timezone_type":1,
//"timezone":"+00:00"},
//"earningsTimestampEnd":{"date":"2021-08-02 12:00:00.000000",
//"timezone_type":1,
//"timezone":"+00:00"},
//"epsForward":5.35,
//"epsTrailingTwelveMonths":4.449,
//"exchange":"NMS",
//"exchangeDataDelayedBy":0,
//"exchangeTimezoneName":"America\/New_York",
//"exchangeTimezoneShortName":"EDT",
//"fiftyDayAverage":128.802,
//"fiftyDayAverageChange":10.712997,
//"fiftyDayAverageChangePercent":0.083174154,
//"fiftyTwoWeekHigh":145.09,
//"fiftyTwoWeekHighChange":-5.574997,
//"fiftyTwoWeekHighChangePercent":-0.038424406,
//"fiftyTwoWeekLow":89.145,
//"fiftyTwoWeekLowChange":50.370003,
//"fiftyTwoWeekLowChangePercent":0.56503457,
//"financialCurrency":"USD",
//"forwardPE":26.07757,
//"fullExchangeName":"NasdaqGS",
//"gmtOffSetMilliseconds":-14400000,
//"language":"en-US",
//"longName":"Apple Inc.",
//"market":"us_market",
//"marketCap":2328170332160,
//"marketState":"REGULAR",
//"messageBoardId":"finmb_24937",
//"postMarketChange":null,
//"postMarketChangePercent":null,
//"postMarketPrice":null,
//"postMarketTime":null,
//"preMarketChange":null,
//"preMarketChangePercent":null,
//"preMarketPrice":null,
//"preMarketTime":null,
//"priceHint":2,
//"priceToBook":33.65051,
//"openInterest":null,
//"quoteSourceName":"Nasdaq Real Time Price",
//"quoteType":"EQUITY",
//"regularMarketChange":2.244995,
//"regularMarketChangePercent":1.6354594,
//"regularMarketDayHigh":139.81,
//"regularMarketDayLow":137.745,
//"regularMarketOpen":137.9,
//"regularMarketPreviousClose":137.27,
//"regularMarketPrice":139.515,
//"regularMarketTime":{"date":"2021-07-02 19:02:06.000000",
//"timezone_type":1,
//"timezone":"+00:00"},
//"regularMarketVolume":55450469,
//"sharesOutstanding":16687599616,
//"shortName":"Apple Inc.",
//"sourceInterval":15,
//"symbol":"AAPL",
//"tradeable":false,
//"trailingAnnualDividendRate":0.82,
//"trailingAnnualDividendYield":0.0059736283,
//"trailingPE":31.358732,
//"twoHundredDayAverage":129.1579,
//"twoHundredDayAverageChange":10.357101,
//"twoHundredDayAverageChangePercent":0.08018945}

//{"ask":null,
//"askSize":null,
//"averageDailyVolume10Day":3393258342,
//"averageDailyVolume3Month":9480010784,
//"bid":null,
//"bidSize":null,
//"bookValue":null,
//"currency":"USD",
//"dividendDate":null,
//"earningsTimestamp":null,
//"earningsTimestampStart":null,
//"earningsTimestampEnd":null,
//"epsForward":null,
//"epsTrailingTwelveMonths":null,
//"exchange":"CCC",
//"exchangeDataDelayedBy":0,
//"exchangeTimezoneName":"Europe\/London",
//"exchangeTimezoneShortName":"BST",
//"fiftyDayAverage":0.3357463,
//"fiftyDayAverageChange":-0.09334016,
//"fiftyDayAverageChangePercent":-0.278008,
//"fiftyTwoWeekHigh":0.737567,
//"fiftyTwoWeekHighChange":-0.49516088,
//"fiftyTwoWeekHighChangePercent":-0.67134356,
//"fiftyTwoWeekLow":0.002277,
//"fiftyTwoWeekLowChange":0.24012913,
//"fiftyTwoWeekLowChangePercent":105.45855,
//"financialCurrency":null,
//"forwardPE":null,
//"fullExchangeName":"CCC",
//"gmtOffSetMilliseconds":3600000,
//"language":"en-US",
//"longName":null,
//"market":"ccc_market",
//"marketCap":31576995840,
//"marketState":"REGULAR",
//"messageBoardId":"finmb_DOGE_CCC",
//"postMarketChange":null,
//"postMarketChangePercent":null,
//"postMarketPrice":null,
//"postMarketTime":null,
//"preMarketChange":null,
//"preMarketChangePercent":null,
//"preMarketPrice":null,
//"preMarketTime":null,
//"priceHint":6,
//"priceToBook":null,
//"openInterest":null,
//"quoteSourceName":"CoinMarketCap",
//"quoteType":"CRYPTOCURRENCY",
//"regularMarketChange":-0.004746914,
//"regularMarketChangePercent":-1.9206324,
//"regularMarketDayHigh":0.24660233,
//"regularMarketDayLow":0.23885891,
//"regularMarketOpen":0.24316283,
//"regularMarketPreviousClose":0.24316283,
//"regularMarketPrice":0.24240613,
//"regularMarketTime":{"date":"2021-07-02 19:03:03.000000",
//"timezone_type":1,
//"timezone":"+00:00"},
//"regularMarketVolume":1426314496,
//"sharesOutstanding":null,
//"shortName":"Dogecoin USD",
//"sourceInterval":15,
//"symbol":"DOGE-USD",
//"tradeable":false,
//"trailingAnnualDividendRate":null,
//"trailingAnnualDividendYield":null,
//"trailingPE":null,
//"twoHundredDayAverage":0.16204466,
//"twoHundredDayAverageChange":0.08036147,
//"twoHundredDayAverageChangePercent":0.49592176}
