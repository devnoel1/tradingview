<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cc_address',
        'bcc_address',
        'subject',
        'message',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
