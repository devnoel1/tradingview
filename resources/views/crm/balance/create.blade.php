@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM- Deposit/Withdrawal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a Balance Transaction</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.balance.store')}}">
            @csrf
            <input type="hidden" name="user" value="{{$user->id}}"/>
            <div class="card-body">
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
                    <label for="inputAction" class="col-sm-2 col-form-label">Action</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="action">
                                <option value="add">Deposit</option>
                                <option value="payout">Withdrawal</option>
                          		
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="number" name="amount" class="form-control" id="inputAmount" placeholder="0" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                    <div class="col-sm-10">
                        <input type="text" name="note" class="form-control" id="inputNote" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAccountNumber" class="col-sm-2 col-form-label">Account Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="account" class="form-control" id="inputAccountNumber" >
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.account.show', ['account' => $user->id])}}" class="btn btn-default ">Cancel</a>
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
