<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use App\Models\WalletSymbol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WalletSymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mail::to("test@test.com")->send(new UserCreated(Auth::user(), '123abc!1'));
        return "TEST";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \App\Models\WalletSymbol  $walletSymbol
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletSymbol $walletSymbol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WalletSymbol  $walletSymbol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalletSymbol $walletSymbol)
    {
        //
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
