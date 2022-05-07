<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'forex_order_fee',
        'commodities_order_fee',
        'indices_order_fee',
        'stock_order_fee',
        'crypto_order_fee',
        'inital_margin_perc',
        'maintenance_margin_perc',
        'inactive_account_fee',
        'custody_fee',
        'withdrawal_under_1000_fee',
        'withdrawal_above_1000_fee',
        'managed_account_fee',
    ];
}
