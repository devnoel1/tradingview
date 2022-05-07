<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use function GuzzleHttp\Promise\exception_for;

// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $with = ['userProfile'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
        'created_user_id',
        'affiliate_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getTotalBalance(){
        $balance = 0;
        foreach($this->wallets()->get() as $wallet){
            $balance += $wallet->getWalletValue();
        }
        return round_up($balance, 2);
    }

    public function getTotalMargin(){
        $margin = 0;
        foreach($this->wallets()->get() as $wallet){
            $margin += $wallet->margin_balance;
        }
        return round_up($margin, 2);
    }

    public function getTotalEquity(){
        $equity = 0;
        foreach($this->wallets()->get() as $wallet){
            $equity += $wallet->balance;
        }
        return round_up($equity, 2);
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    public function balanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
        public function groupuser()
    {
        return $this->belongsTo(Group::class,'group_id')->withDefault();
    }
    public function employeerelategroup()
    {
        return $this->belongsTo(Group::class,'group_id')->where('id',Auth::user()->group_id)->withDefault();
    }
     public function deposituser()
    {
        return $this->hasMany(BalanceTransaction::class,'user_id');
    }
    public function affiliateUser()
    {
        return $this->belongsTo(User::class,'affiliate_user_id');
    }
    public function createdUser()
    {
        return $this->belongsTo(User::class,'created_user_id');
    }
}
