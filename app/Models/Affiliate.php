<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    public function affiliateuser()
    {
    	return $this->hasOne(User::class,'id','user_id');
    }

    public function affiliate_created_user()
    {
        return $this->hasOne(User::class,'id','affiliate_user_id');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'ip_address',
        'phone',
        'user_id',
        'affiliate_user_id',
        'group_id',
        'external_id',
        'lead_status',
    ];
}
