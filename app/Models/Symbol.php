<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Symbol extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchange_id',
        'name',
        'description',
        'code',
        'second_code',
        'currency',
        'type',
        'last_value',
    ];

    protected $with = ['exchange'];

    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    private function updatePrice()
    {
        $quoteSymbol = $this->code;
        if($this->second_code != null && $this->second_code != ""){
            $quoteSymbol = $this->second_code;
        }else {
            if ($this->type == 'crypto') {
                $quoteSymbol = $quoteSymbol . "-" . $this->currency;
            } elseif ($this->type == 'forex') {
                $quoteSymbol = $quoteSymbol . "=X";
            } elseif ($this->type == 'indices') {
                if ($quoteSymbol == 'AEX') {
                    $quoteSymbol = "ˆ" . $quoteSymbol;
                }
            } elseif ($this->type == 'commodities') {
                $quoteSymbol = str_replace("1!", "", $quoteSymbol);
                $quoteSymbol = $quoteSymbol . "=F";
            }
        }
        $values = getSymbolValueByQoute($quoteSymbol);

        $this->last_value = $values['price'];
        $this->change_percent = $values['changePercent'];
        $this->market_volume = $values['marketVolume'];
        $this->average_10_day_volume = $values['average10dayVolume'];
        $this->save();
        return $values;
    }

    public function updateSymbolPriceWithOpenMarket(){
        $market_open = false;
        $values = $this->updatePrice();
        $market_time = $values['marketTime'];
        $now = new DateTime();
        $diff = $now->diff($market_time);
        $hours = $diff->h;
        $hours = $hours + ($diff->days*24);
        if($hours == 0){
            $market_open = true;
        }
        return $market_open;
    }

    public function updateSymbolPrice()
    {
        $this->updatePrice();
    }

    public function getOrderFee(Order $order)
    {
        if ($this->type == 'stock') {
            $symbol_order_fee = $order->wallet->user->userProfile->level->stock_order_fee;
        } elseif ($this->type == 'crypto') {
            $symbol_order_fee = $order->wallet->user->userProfile->level->crypto_order_fee;
        } elseif ($this->type == 'forex') {
            $symbol_order_fee = $order->wallet->user->userProfile->level->forex_order_fee;
        } elseif ($this->type == 'indices') {
            $symbol_order_fee = $order->wallet->user->userProfile->level->indices_order_fee;
        } elseif ($this->type == 'commodities') {
            $symbol_order_fee = $order->wallet->user->userProfile->level->commodities_order_fee;
        }
        return $symbol_order_fee;
    }
}
