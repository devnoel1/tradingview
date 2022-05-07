<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role',
        'password',
        'ip_address',
        'status',
        'created_by',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
