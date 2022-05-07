<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\Symbol;
use Illuminate\Http\Request;

class SymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $symbols = Symbol::paginate(15);
        return view('crm.symbol.index', ['symbols' => $symbols]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exchanges = Exchange::all();
        return view('crm.symbol.create', ['exchanges' => $exchanges]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $symbol = Symbol::create([
            'exchange_id' => $request->get('exchange'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'code' => strtoupper($request->get('code')),
            'second_code' => strtoupper($request->get('second_code')),
            'currency' => strtoupper($request->get('currency')),
            'type' => $request->get('type'),
            'last_value' => 0,
        ]);
        $symbol->save();
        return redirect()->to(route('crm.symbol.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Symbol  $symbol
     * @return \Illuminate\Http\Response
     */
    public function show(Symbol $symbol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symbol  $symbol
     * @return \Illuminate\Http\Response
     */
    public function edit(Symbol $symbol)
    {
        $exchanges = Exchange::all();
        return view('crm.symbol.edit', ['symbol' => $symbol, 'exchanges' => $exchanges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symbol  $symbol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Symbol $symbol)
    {
        $symbol->exchange_id = $request->get('exchange');
        $symbol->name = $request->get('name');
        $symbol->description = $request->get('description');
        $symbol->code = strtoupper($request->get('code'));
        $symbol->second_code = strtoupper($request->get('second_code'));
        $symbol->currency = strtoupper($request->get('currency'));
        $symbol->type = $request->get('type');
        $symbol->save();
        return redirect()->to(route('crm.symbol.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symbol  $symbol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symbol $symbol)
    {
        $symbol->delete();
        return redirect()->to(route('crm.symbol.index'));
    }
}
