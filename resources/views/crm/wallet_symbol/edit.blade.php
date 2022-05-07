@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Wallet Symbol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update a Wallet Symbol</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.wallet_symbol.update', ['wallet_symbol' => $walletSymbol->id])}}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputSymbol" class="col-sm-2 col-form-label">Symbol</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="symbol" value="{{$walletSymbol->symbol_id}}"/>
                        <select class="form-control" name="symbol" required disabled>
                            @foreach ($symbols as $symbol)
                                <option value="{{ $symbol->id }}" {{ ( $symbol->id == $walletSymbol->symbol_id) ? 'selected' : '' }}> {{ $symbol->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWallet" class="col-sm-2 col-form-label">Wallet</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="wallet" value="{{$walletSymbol->wallet_id}}"/>
                        <select class="form-control" name="wallet" required disabled>
                            @foreach ($wallets as $wallet)
                                <option value="{{ $wallet->id }}" {{ ( $wallet->id == $walletSymbol->wallet_id) ? 'selected' : '' }}> {{ $wallet->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="number" name="amount" class="form-control" id="inputAmount" placeholder="0" step="0.01" min="0" value="{{$walletSymbol->amount}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSpread" class="col-sm-2 col-form-label">Spread</label>
                    <div class="col-sm-10">
                        <input type="number" name="spread" class="form-control" id="inputSpread" placeholder="0" step="0.01" value="{{$walletSymbol->spread}}">
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.account.show', ['account' => $walletSymbol->wallet->user->id])}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
