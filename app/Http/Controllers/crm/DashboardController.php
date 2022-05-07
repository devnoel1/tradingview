<?php

namespace App\Http\Controllers\crm;

use App\Models\BalanceTransaction;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//Request $request)
    { //dd('hi');
        $identifications = UserProfile::where('identified', 0)->whereNotNull('id_front_path')->with('user')->get();
        $balance = BalanceTransaction::where('approved', 0)->with('user')->get();
        return view('crm.dashboard.index', ['identifications' => $identifications,'balance' => $balance]);
    }
   public function dashboard()//Request $request)
    { //dd('hi');
        $identifications = UserProfile::where('identified', 0)->whereNotNull('id_front_path')->with('user')->get();
        $balance = BalanceTransaction::where('approved', 0)->with('user')->get();

        //balance
        $data['total_deposite'] = BalanceTransaction::where('action','add')->sum('amount');
        $data['total_deposite_today'] = BalanceTransaction::where('action','add')->whereDate('created_at', Carbon::today())->sum('amount');
        $data['total_deposite_this_month'] = BalanceTransaction::where('action','add')->whereMonth('created_at', Carbon::now()->month)->sum('amount');
        $data['total_deposite_this_year'] = BalanceTransaction::where('action','add')->whereYear('created_at', date('Y'))->sum('amount');
        $data['total_pending_deposites'] = BalanceTransaction::where('action','add')->where('approved', '0')->sum('amount');

        //accounts
        $data['total_assigned_account'] = 0;
        $data['total_assigned_leads'] = 0;
        $data['total_new_leads'] = 0;
        $data['total_new_accounts'] = 0 ;

        //trades
        $data['total_trade'] = 0;
        $data['total_trade_today'] = 0;
        $data['total_trade_this_month'] = 0;
        $data['total_trade_this_year'] = 0;

        //turnover
        $data['total_turnover'] = 0;
        $data['total_turnover_today'] = 0;
        $data['total_turnover_this_month'] = 0;
        $data['total_turnover_this_year'] = 0;

        //logins
        $data['total_online'] = 0;
        $data['total_online_today'] = 0;
        $data['total_online_this_month'] = 0;
        $data['total_online_this_year'] = 0;

        //comments 
         $data['total_comments'] = Comment::count();
         $data['total_comments_today'] = Comment::whereDate('created_at', Carbon::today())->count();
         $data['total_comments_this_month'] = Comment::whereDate('created_at', Carbon::now()->month)->count();
         $data['total_comments_this_year'] = Comment::whereDate('created_at', date('Y'))->count();

         //withdrawals
        $data['total_withdrawals'] = BalanceTransaction::where('action','payout')->sum('amount');
        $data['total_withdrawals_today'] = BalanceTransaction::where('action','payout')->whereDate('created_at', Carbon::today())->sum('amount');
        $data['total_withdrawals_this_month'] = BalanceTransaction::where('action','payout')->whereMonth('created_at', Carbon::now()->month)->sum('amount');
        $data['total_withdrawals_this_year'] = BalanceTransaction::where('action','payout')->whereYear('created_at', date('Y'))->sum('amount');
        $data['total_pending_withdrawals'] = BalanceTransaction::where('action','payout')->where('approved', '0')->sum('amount');

        return view('crm.dashboard.dashboard', ['identifications' => $identifications,'balance' => $balance, 'data'=>$data]);
    }
}
