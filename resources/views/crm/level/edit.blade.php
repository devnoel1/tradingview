@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Level</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update a Level</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.level.update', ['level' => $level->id])}}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{$level->name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputForexOrderFee" class="col-sm-2 col-form-label">Forex</label>
                    <div class="col-sm-10">
                        <input type="number" name="forex_order_fee" class="form-control" id="inputForexOrderFee" step="0.0001" placeholder="0.0000" value="{{$level->forex_order_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCommoditiesOrderFee" class="col-sm-2 col-form-label">Commodities</label>
                    <div class="col-sm-10">
                        <input type="number" name="commodities_order_fee" class="form-control" id="inputCommoditiesOrderFee" step="0.0001" placeholder="0.0000" value="{{$level->commodities_order_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputIndicesOrderFee" class="col-sm-2 col-form-label">Indices</label>
                    <div class="col-sm-10">
                        <input type="number" name="indices_order_fee" class="form-control" id="inputIndicesOrderFee" step="0.0001" placeholder="0.0000" value="{{$level->indices_order_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputStockOrderFee" class="col-sm-2 col-form-label">Stocks</label>
                    <div class="col-sm-10">
                        <input type="number" name="stock_order_fee" class="form-control" id="inputStockOrderFee" step="0.0001" placeholder="0.0000" value="{{$level->stock_order_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCryptoOrderFee" class="col-sm-2 col-form-label">Crypto</label>
                    <div class="col-sm-10">
                        <input type="number" name="crypto_order_fee" class="form-control" id="inputCryptoOrderFee" step="0.0001" placeholder="0.0000" value="{{$level->crypto_order_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputInitalMarginPerc" class="col-sm-2 col-form-label">Inital Margin Percentage</label>
                    <div class="col-sm-10">
                        <input type="number" name="inital_margin_perc" class="form-control" id="inputInitalMarginPerc" step="0.01" placeholder="0.00" value="{{$level->inital_margin_perc}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputmaintenanceMarginPerc" class="col-sm-2 col-form-label">Maintenance Margin Percentage</label>
                    <div class="col-sm-10">
                        <input type="number" name="maintenance_margin_perc" class="form-control" id="inputmaintenanceMarginPerc" step="0.01" placeholder="0.00" value="{{$level->maintenance_margin_perc}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputInactiveAccountFee" class="col-sm-2 col-form-label">Inactive Account fee</label>
                    <div class="col-sm-10">
                        <input type="number" name="inactive_account_fee" class="form-control" id="inputInactiveAccountFee" step="0.01" placeholder="0.00" value="{{$level->inactive_account_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCustodyFee" class="col-sm-2 col-form-label">Custody fee</label>
                    <div class="col-sm-10">
                        <input type="number" name="custody_fee" class="form-control" id="inputCustodyFee" step="0.01" placeholder="0.00" value="{{$level->custody_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWithdrawlUnder1000Fee" class="col-sm-2 col-form-label">Withdraw under 1000</label>
                    <div class="col-sm-10">
                        <input type="number" name="withdrawal_under_1000_fee" class="form-control" id="inputWithdrawlUnder1000Fee" step="0.01" placeholder="0.00" value="{{$level->withdrawal_under_1000_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWithdrawlAbove1000Fee" class="col-sm-2 col-form-label">Withdraw above 1000</label>
                    <div class="col-sm-10">
                        <input type="number" name="withdrawal_above_1000_fee" class="form-control" id="inputWithdrawlUnder1000Fee" step="0.01" placeholder="0.00" value="{{$level->withdrawal_above_1000_fee}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputManagedAccountFee" class="col-sm-2 col-form-label">Managed Account Fee</label>
                    <div class="col-sm-10">
                        <input type="number" name="managed_account_fee" class="form-control" id="inputManagedAccountFee" step="0.01" placeholder="0.00" value="{{$level->managed_account_fee}}" required>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.level.index')}}" class="btn btn-default float-right">Cancel</a>
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
