<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Symbol;
use App\Models\User;
use App\Models\WalletSymbol;
use Illuminate\Http\Request;
use Auth;

class WalletSymbolController extends Controller
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
    {$user_id = $request->user;
       if(Auth::user()->can('admin'))
        {
         
        $user = User::find($user_id);
        $wallets = $user->wallets;
        $symbols = Symbol::all();
        return view('crm.wallet_symbol.create', ['symbols' => $symbols, 'user' => $user, 'wallets' => $wallets]);
        }else if(Auth::user()->can('employee') && User::where('id',$user_id)->where('created_user_id',Auth::user()->id)->count()>0){
        $user = User::where('id',$user_id)->where('created_user_id',Auth::user()->id)->first();
        $wallets = $user->wallets;
        $symbols = Symbol::all();
        return view('crm.wallet_symbol.create', ['symbols' => $symbols, 'user' => $user, 'wallets' => $wallets]);           
                   
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
        $amount = 0;
        $spread = null;
        if($input['amount'] != null && $input['amount'] != "") {
            $amount = $input['amount'];
        }
        if($input['spread'] != null && $input['spread'] != "" && $input['spread'] != 0)  {
            $spread = $input['spread'];
        }
        $currentSymbol = WalletSymbol::where('wallet_id', '=', $input['wallet'])->where('symbol_id', '=', $input['symbol'])->first();
        if($currentSymbol){
            return redirect(route('crm.wallet_symbol.edit', ['wallet_symbol' => $currentSymbol->id]));
        }
        $walletSymbol = WalletSymbol::create([
            'wallet_id' => $input['wallet'],
            'symbol_id' => $input['symbol'],
            'amount' => $amount,
            'spread' => $spread
        ]);
        $walletSymbol->save();
        return redirect(route('crm.account.show', ['account' => $walletSymbol->wallet->user->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletSymbol  $walletSymbol
     * @return \Illuminate\Http\Response
     */
    public function show(WalletSymbol $walletSymbol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $wallet_symbol_id = $request->wallet_symbol;
        $walletSymbol = WalletSymbol::find($wallet_symbol_id);
        if(Auth::user()->can('admin'))
        {

            $user = $walletSymbol->wallet->user;
            $wallets = $user->wallets;
            $symbols = Symbol::all();
            return view('crm.wallet_symbol.edit', ['walletSymbol' => $walletSymbol, 'symbols' => $symbols, 'user' => $user, 'wallets' => $wallets]);

        }else if(Auth::user()->can('employee') && $walletSymbol->wallet->user->created_user_id==Auth::user()->id){

            $user = $walletSymbol->wallet->user;
            $wallets = $user->wallets;
            $symbols = Symbol::all();
            return view('crm.wallet_symbol.edit', ['walletSymbol' => $walletSymbol, 'symbols' => $symbols, 'user' => $user, 'wallets' => $wallets]);


        }else{
           abort(401,'Unauthorized');
       }                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $wallet_symbol_id = $request->wallet_symbol;
        $walletSymbol = WalletSymbol::find($wallet_symbol_id);
        $input = $request->all();
        $walletSymbol->wallet_id = $input['wallet'];
        $walletSymbol->symbol_id = $input['symbol'];
        if($input['amount'] != null && $input['amount'] != "") {
            $walletSymbol->amount = $input['amount'];
        }else{
            $walletSymbol->amount = 0;
        }
        if($input['spread'] != null && $input['spread'] != "") {
            $walletSymbol->spread = $input['spread'];
        }else{
            $walletSymbol->spread = null;
        }
        $walletSymbol->save();
        return redirect(route('crm.account.show', ['account' => $walletSymbol->wallet->user->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletSymbol  $walletSymbol
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletSymbol $walletSymbol)
    {
        //
    }
}
