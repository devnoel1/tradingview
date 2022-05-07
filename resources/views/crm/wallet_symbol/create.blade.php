@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Wallet Symbol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a Wallet Symbol</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.wallet_symbol.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputSymbol" class="col-sm-2 col-form-label">Symbol</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="symbol" required>
                            @foreach ($symbols as $symbol)
                                <option value="{{ $symbol->id }}"> {{ $symbol->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWallet" class="col-sm-2 col-form-label">Wallet</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="wallet" required>
                            @foreach ($wallets as $wallet)
                                <option value="{{ $wallet->id }}"> {{ $wallet->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="number" name="amount" class="form-control" id="inputAmount" placeholder="0" step="0.01" min="0" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSpread" class="col-sm-2 col-form-label">Spread</label>
                    <div class="col-sm-10">
                        <input type="number" name="spread" class="form-control" id="inputSpread" placeholder="0" step="0.01">
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.account.show', ['account' => $user->id])}}" class="btn btn-default">Cancel</a>
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
