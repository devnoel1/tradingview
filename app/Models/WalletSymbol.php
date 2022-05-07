<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class WalletSymbol extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'symbol_id',
        'amount',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }

    public function getSymbolPrice(){
        $current_time = Carbon::now();
        if ($this->symbol->updated_at->addMinutes(5) < $current_time) {
            $this->symbol->updateSymbolPrice();
        }

        $wallet_symbol_price = $this->symbol->last_value;
        if ($this->symbol->currency != $this->wallet->currency) {
            if ($this->symbol->currency == 'USD') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'AUD') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'CHF') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'CNY') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'GBP') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'HKD') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'JPY') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'KRW') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            } elseif ($this->symbol->currency == 'CAD') {
                $forex_code = $this->wallet->currency . "" . $this->symbol->currency;
            }elseif ($this->wallet->currency == 'EUR') {
                $forex_code = $this->symbol->currency . "" . $this->wallet->currency;
            } else {
                throw Exception("CURRENCY NOT CONFIGURED");
            }
            $forex_symbol = Symbol::where('type', '=', 'forex')->where('code', '=', $forex_code)->first();

            if ($forex_symbol->updated_at->addMinutes(5) < $current_time) {
                $forex_price = getSymbolValueByQoute($forex_code . "=X");
                $forex_symbol->last_value = $forex_price['price'];
                $forex_symbol->save();
            }
            if ($this->symbol->currency == 'USD') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            }elseif ($this->symbol->currency == 'AUD') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'CHF') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'CNY') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'GBP') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'HKD') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'JPY') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'KRW') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            } elseif ($this->symbol->currency == 'CAD') {
                $wallet_symbol_price = $this->symbol->last_value / $forex_symbol->last_value;
            }elseif ($this->wallet->currency == 'USD') {
                $wallet_symbol_price = $this->symbol->last_value * $forex_symbol->last_value;
            }
        }
        if($this->spread != null && $this->spread != "" && $this->spread != 0){
            $wallet_symbol_price += ($wallet_symbol_price * $this->spread);
        }
        return round_up($wallet_symbol_price, 2);
    }
}
