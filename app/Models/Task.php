<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_user_id',
        'owner_user_id',
        'due_date',
        'description',
        'status',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
        public function ownuser()
    {
        return $this->belongsTo(User::class,'owner_user_id');
    }
}
