<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $with = ['symbol'];

    protected $fillable = [
        'wallet_id',
        'symbol_id',
        'type',
        'status',
        'amount',
        'symbol_price',
        'wallet_symbol_price',
        'price',
        'sell_price',
        'sell_symbol_price',
        'sell_symbol_wallet_price',
        'sell_fee',
        'sell_order_total',
        'limit_price',
        'stop_price',
        'fee',
        'order_total',
        'initial_margin',
        'leverage',
        'spread',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function processOrderBalanceSymbolTradingVolume(){
        if ($this->status == 'close' || $this->status == 'open') {
            if($this->wallet->margin){
                if ($this->type == 'buy') {
                    $this->wallet->balance -= $this->initial_margin;
                    $this->wallet->margin_balance += $this->initial_margin;
                }elseif($this->type =='sell'){
                    $this->wallet->balance += $this->initial_margin;
                    $this->wallet->margin_balance -= $this->initial_margin;
                }
            }else{
                if ($this->type == 'buy') {
                    $this->wallet->balance -= $this->order_total;
                }elseif($this->type =='sell'){
                    $this->wallet->balance += $this->order_total;
                }
            }
            $this->wallet->save();
            $this->updateSymbolInWallet();

            $tradingVolumes = TradingVolume::where('wallet_id', '=', $this->wallet->id)->where('status', '=', 'open')->get();
            foreach($tradingVolumes as $tradingVolume){
                $tradingVolume->pending_volume += ($this->order_price - $this->order_fee);
                $tradingVolume->save();
            }
        }
    }

    public function executeOrderStatusUpdate($type){
        foreach ($this->wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $this->symbol->id) {
                $wallet_symbol_price = $wallet_symbol->getSymbolPrice();
            }
        }
        $order_fee = $this->fee;
        $amount = $this->amount;
        $order_total = $this->order_total;
        $price = $this->price;
        $initial_margin = null;

        if($this->spread != null && $this->spread != "" && $this->spread != 0){
            $wallet_symbol_price += ($wallet_symbol_price * $this->spread);
        }

        if($type == 'buy') {
            if ($this->wallet->margin) {
                $margin_total = 1 / $this->wallet->user->userProfile->level->inital_margin_perc;
                $price = round_up($this->order_total / $wallet_symbol_price, 2);
                list($order_fee, $order_price, $initial_margin) = $this->getOrderPrice($price);
                $price = round_up(($order_price * $margin_total) - $order_fee, 2);
                list($order_fee, $order_price, $initial_margin) = $this->getOrderPrice($price);
            } else {
                $this->price = round_up($this->wallet->balance, 2);
                list($order_fee, $order_price, $initial_margin) = $this->getOrderPrice($price);
                $this->price = round_up($order_price - $order_fee, 2);
                list($order_fee, $order_price, $initial_margin) = $this->getOrderPrice($price);
            }
        }elseif($type =='sell'){
            if($this->leverage > 0){
                $leverage_symbol_price = $wallet_symbol_price * $this->leverage;
                $price = $amount * $leverage_symbol_price;
            }else{
                $price = $amount * $wallet_symbol_price;
            }

            $symbol_order_fee = $this->symbol->getOrderFee($this);
            $order_fee = round_up($price * $symbol_order_fee, 2);
            $order_price = $price + $order_fee;
        }
        $this->amount = $amount;
        if($this->stop_price != null && $type == 'sell'){
            $this->sell_price = $price;
            $this->sell_symbol_price = $this->symbol->last_value;
            $this->sell_wallet_symbol_price = $wallet_symbol_price;
            $this->sell_fee = $order_fee;
            $this->sell_order_total = $order_price;
        }else{
            $this->symbol_price = $this->symbol->last_value;
            $this->wallet_symbol_price = $wallet_symbol_price;
            $this->price = $price;
            $this->fee = $order_fee;
            $this->order_total = $order_price;
        }
        if($this->stop_price == null or $type == 'sell' ) {
            $this->status = 'close';
        }else{
            $this->status = 'open';
        }

        if ($this->wallet->margin && $type == 'buy') {
            $this->initial_margin = $initial_margin;
        }
        $this->save();
        return array($order_fee, $order_price, $initial_margin);
    }

    private function updateSymbolInWallet(): void
    {
        $in_wallet = false;
        foreach ($this->wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $this->symbol->id) {
                $in_wallet = true;
                $this->updateWalletSymbol($wallet_symbol);
            }
        }
        if ($in_wallet == false) {
            $wallet_symbol = WalletSymbol::create([
                'wallet_id' => $this->wallet->id,
                'symbol_id' => $this->symbol->id,
                'amount' => 0
            ]);
            $wallet_symbol->save();
            $this->updateWalletSymbol($wallet_symbol);
        }
    }

    /**
     * @param $wallet_symbol
     */
    private function updateWalletSymbol(WalletSymbol $wallet_symbol): void
    {
        if ($this->type == 'buy') {
            $wallet_symbol->amount += $this->amount;
        } elseif ($this->type == 'sell') {
            $wallet_symbol->amount -= $this->amount;
        }
        $wallet_symbol->save();
    }

    /**
     * @return array
     */
    private function getOrderPrice(string $price): array
    {
        $initial_margin = null;
        $symbol_order_fee = $this->symbol->getOrderFee($this);
        $order_fee = round_up($price * $symbol_order_fee, 2);
        $order_price = round_up($price + $order_fee, 2);
        if ($this->wallet->margin && $this->type == 'buy') {
            $initial_margin = round_up($order_price * $this->wallet->user->userProfile->level->inital_margin_perc,
                2);
        }
        return array($order_fee, $order_price, $initial_margin);
    }
}
