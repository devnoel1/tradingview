<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $with = ['orders'];

    protected $fillable = [
        'user_id',
        'name',
        'currency',
        'active',
        'demo',
        'balance',
        'margin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function walletSymbols()
    {
        return $this->hasMany(WalletSymbol::class);
    }

    public function tradingVolumes()
    {
        return $this->hasMany(TradingVolume::class);
    }

    public function balanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::class);
    }

    public function getWalletValue()
    {
        $wallet_value = $this->balance;

        foreach($this->walletSymbols as $walletSymbol){
            $symbol_price = round_up($walletSymbol->getSymbolPrice(), 2);
            $symbol_total = round_up(($symbol_price * $walletSymbol->amount), 2);
            $wallet_value += $symbol_total;
        }
        return round_up($wallet_value, 2);
    }

    public function getTotalOrderValues()
    {
        $total_buy_value = 0;
        $total_sell_value = 0;
        $wallet_value = $this->getWalletValue();
        foreach($this->orders as $order){
            if($order->status == 'open' || $order->status == 'closed'){
                if($order->type == 'buy'){
                    $total_buy_value += $order->order_total;
                }elseif($order->type == 'sell') {
                    if ($order->order_sell_total != null) {
                        $total_sell_value += $order->order_sell_total;
                    } else {
                        $total_sell_value += $order->order_total;
                    }
                    if($order->stop_price != null){
                        $total_buy_value += $order->order_total;
                    }
                }
            }elseif($order->status == 'waiting_sell'){
                $total_buy_value += $order->order_total;
            }
        }

        return [
            'total_value' => round_up($wallet_value, 2),
            'total_buy_value' => round_up($total_buy_value,2),
            'total_sell_value' => round_up($total_sell_value,2),
            'total_pl' => round_up(((($wallet_value - $this->balance) - $total_buy_value) + $total_sell_value ),2),
        ];
    }
}
