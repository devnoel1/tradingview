<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\TradingVolume;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class TradingVolumeController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    $user_id = $request->user;
         if(Auth::user()->can('admin'))
        {
        $user = User::find($user_id);
        $wallets = $user->wallets;
        return view('crm.trading_volume.create', ['user' => $user, 'wallets' => $wallets]);
        }else if(Auth::user()->can('employee') && User::where('id',$user_id)->where('created_user_id',Auth::user()->id)->count()>0){
              
        $user = User::find($user_id);
        $wallets = $user->wallets;
        return view('crm.trading_volume.create', ['user' => $user, 'wallets' => $wallets]);
                   
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
        $tradingVolume = TradingVolume::create([
            'wallet_id' => $input['wallet'],
            'status' => $input['status'],
            'required_volume' => $input['required'],
            'approved_volume' => $input['approved'],
            'pending_volume' => $input['pending']
        ]);
        $tradingVolume->save();
        return redirect(route('crm.account.show', ['account' => $tradingVolume->wallet->user->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TradingVolume  $tradingVolume
     * @return \Illuminate\Http\Response
     */
    public function show(TradingVolume $tradingVolume)
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
       $trading_volume_id = $request->trading_volume;
       $trading_volume = TradingVolume::find($trading_volume_id);
        if(Auth::user()->can('admin'))
        {
        $user = $trading_volume->wallet->user;
        $wallets = $user->wallets;
        return view('crm.trading_volume.edit', ['tradingVolume' => $trading_volume,'wallets' => $wallets]);
        }else if(Auth::user()->can('employee') && $trading_volume->wallet->user->created_user_id==Auth::user()->id){  
        $user = $trading_volume->wallet->user;
        $wallets = $user->wallets;
        return view('crm.trading_volume.edit', ['tradingVolume' => $trading_volume,'wallets' => $wallets]);


        }else{
           abort(401,'Unauthorized');
       }                  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TradingVolume  $tradingVolume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TradingVolume $tradingVolume)
    {
        $input = $request->all();
        $tradingVolume->status = $input['status'];
        $tradingVolume->required_volume = $input['required'];
        $tradingVolume->approved_volume = $input['approved'];
        $tradingVolume->pending_volume = $input['pending'];
        $tradingVolume->save();
        return redirect(route('crm.account.show', ['account' => $tradingVolume->wallet->user->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TradingVolume  $tradingVolume
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradingVolume $tradingVolume)
    {
        //
    }
}
