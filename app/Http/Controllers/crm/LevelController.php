<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $levels = Level::paginate(15);
        return view('crm.level.index', ['levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = Level::create([
            'name' => $request->get('name'),
            'forex_order_fee' => $request->get('forex_order_fee'),
            'commodities_order_fee' => $request->get('commodities_order_fee'),
            'indices_order_fee' => $request->get('indices_order_fee'),
            'stock_order_fee' => $request->get('stock_order_fee'),
            'crypto_order_fee' => $request->get('crypto_order_fee'),
            'inital_margin_perc' => $request->get('inital_margin_perc'),
            'maintenance_margin_perc' => $request->get('maintenance_margin_perc'),
            'inactive_account_fee' => $request->get('inactive_account_fee'),
            'custody_fee' => $request->get('custody_fee'),
            'withdrawal_under_1000_fee' => $request->get('withdrawal_under_1000_fee'),
            'withdrawal_above_1000_fee' => $request->get('withdrawal_above_1000_fee'),
            'managed_account_fee' => $request->get('managed_account_fee'),
        ]);
        $level->save();
        return redirect()->to(route('crm.level.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        $exchanges = Exchange::all();
        return view('crm.level.edit', ['level' => $level, 'exchanges' => $exchanges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $level->name = $request->get('name');
        $level->forex_order_fee = $request->get('forex_order_fee');
        $level->commodities_order_fee = $request->get('commodities_order_fee');
        $level->indices_order_fee = strtoupper($request->get('indices_order_fee'));
        $level->stock_order_fee = strtoupper($request->get('stock_order_fee'));
        $level->crypto_order_fee = $request->get('crypto_order_fee');
        $level->inital_margin_perc = $request->get('inital_margin_perc');
        $level->maintenance_margin_perc = $request->get('maintenance_margin_perc');
        $level->inactive_account_fee = $request->get('inactive_account_fee');
        $level->custody_fee = $request->get('custody_fee');
        $level->withdrawal_under_1000_fee = $request->get('withdrawal_under_1000_fee');
        $level->withdrawal_above_1000_fee = $request->get('withdrawal_above_1000_fee');
        $level->managed_account_fee = $request->get('managed_account_fee');
        $level->save();
        return redirect()->to(route('crm.level.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->to(route('crm.level.index'));
    }
}
