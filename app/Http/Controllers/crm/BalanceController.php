<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\BalanceTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->user;  
       if(Auth::user()->can('admin'))
        {
        $user = User::find($user_id);
        $wallets = $user->wallets;
        return view('crm.balance.create', ['user' => $user, 'wallets' => $wallets]);
        }else if(Auth::user()->can('employee') && User::where('id',$user_id)->where('created_user_id',Auth::user()->id)->count()>0){
        $user = User::find($user_id);
        $wallets = $user->wallets;
        return view('crm.balance.create', ['user' => $user, 'wallets' => $wallets]);
                   
        }else{
             abort(401,'Unauthorized');
        }                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $balanceTransaction = BalanceTransaction::create([
            'user_id' => $input['user'],
            'wallet_id' => $input['wallet'],
            'amount' => $input['amount'],
            'action' => $input['action'],
            'account_number' => $input['account'],
            'note' => $input['note'],
        ]);
        $balanceTransaction->save();
        return redirect(route('crm.balance.show', ['balance' => $balanceTransaction->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $transaction_id = $request->balance;
        $user = Auth::user();
        $balanceTransaction = BalanceTransaction::find($transaction_id);

        return view('crm.balance.show', ['balance' => $balanceTransaction, 'user' => $user]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request)
    {
        $transaction_id = $request->balance;

        $balanceTransaction = BalanceTransaction::find($transaction_id);
        $wallet = $balanceTransaction->wallet;


        if($balanceTransaction->action == 'add') {
            $wallet->balance = $wallet->balance + $balanceTransaction->amount;
         }elseif($balanceTransaction->action == 'payout'){
            $wallet->balance = $wallet->balance - $balanceTransaction->amount;
        }

        $wallet->save();
        $balanceTransaction->approved = true;
        $balanceTransaction->save();

        return redirect()->route('crm.dashboard.index');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BalanceTransaction  $balanceTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request  $request, BalanceTransaction $balanceTransaction)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BalanceTransaction  $balanceTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BalanceTransaction $balanceTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceTransaction  $balanceTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceTransaction $balanceTransaction)
    {
        //
    }
}
