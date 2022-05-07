<?php

namespace App\Http\Controllers\AffiliateUser;

use App\Http\Controllers\Controller;
use App\Models\BalanceTransaction;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Affiliate;
use Auth;

class AffiliateController extends Controller
{

    public function index()
    {
        return view('affiliate.index');
    }

    public function leads()
    {
      $leads=Affiliate::where('affiliate_user_id',Auth::user()->id)->where('user_status',0)->latest()->get();

     return view('affiliate.leads',compact('leads'));
    }
    public function users()
    {
         $users=User::where('affiliate_user_id',Auth::user()->id)->latest()->get();
        return view('affiliate.users',compact('users'));
    }
    public function deposits()
    { $deposits=User::where('affiliate_user_id',Auth::user()->id)->with('deposituser')->latest()->get();
    //  dd($deposits);
        return view('affiliate.deposits',compact('deposits'));
    }
}
