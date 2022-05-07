<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingVolume extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'status',
        'required_volume',
        'approved_volume',
        'pending_volume',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
