@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Symbol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update a Symbol</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.symbol.update', ['symbol' => $symbol->id])}}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputExchange" class="col-sm-2 col-form-label">Exchange</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="exchange" required>
                            @foreach ($exchanges as $exchange)
                                <option value="{{ $exchange->id }}" {{ ( $exchange->id == $symbol->exchange_id) ? 'selected' : '' }}> {{ $exchange->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" required value="{{$symbol->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id="inputDescription" placeholder="Description" required value="{{$symbol->description}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCode" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="code" class="form-control" id="inputCode" placeholder="Code" required value="{{$symbol->code}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCurrency" class="col-sm-2 col-form-label">Currency</label>
                    <div class="col-sm-10">
                        <input type="text" name="currency" class="form-control" id="inputCurrency" placeholder="Currency" required value="{{$symbol->currency}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="type" required>
                            <option value="stock" {{ ( $symbol->type == 'stock') ? 'selected' : '' }}>Stock</option>
                            <option value="crypto" {{ ( $symbol->type == 'crypto') ? 'selected' : '' }}>Crypto</option>
                            <option value="forex" {{ ( $symbol->type == 'forex') ? 'selected' : '' }}>Forex</option>
                            <option value="indices" {{ ( $symbol->type == 'indices') ? 'selected' : '' }}>Indices</option>
                            <option value="commodities" {{ ( $symbol->type == 'commodities') ? 'selected' : '' }}>Commodities</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.symbol.index')}}" class="btn btn-default float-right">Cancel</a>
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
