<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSymbol extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'symbol_id',
        'favorite',
        'active',
    ];

    protected $with = ['symbol'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }
}
