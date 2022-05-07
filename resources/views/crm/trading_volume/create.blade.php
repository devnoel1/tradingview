@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Trading Volume</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a Trading Volume</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.trading_volume.store')}}">
            @csrf
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
                    <label for="inputWallet" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" required>
                                <option value="open"> Credit </option>
                                <option value="closed"> Insurance </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRequired" class="col-sm-2 col-form-label">Initial Turnover</label>
                    <div class="col-sm-10">
                        <input type="number" name="required" class="form-control" id="inputRequired" placeholder="0" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputApproved" class="col-sm-2 col-form-label">Completed Turnover</label>
                    <div class="col-sm-10">
                        <input type="number" name="approved" class="form-control" id="inputApproved" placeholder="0" step="0.01" min="0" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPending" class="col-sm-2 col-form-label">Pending 24H turnover</label>
                    <div class="col-sm-10">
                        <input type="number" name="pending" class="form-control" id="inputPending" placeholder="0" step="0.01" min="0" required>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.account.show', ['account' => $user->id])}}" class="btn btn-default float-right">Cancel</a>
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
