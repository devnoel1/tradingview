@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Symbol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a new Symbol</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.symbol.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputExchange" class="col-sm-2 col-form-label">Exchange</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="exchange" required>
                            @foreach ($exchanges as $exchange)
                                <option value="{{ $exchange->id }}" > {{ $exchange->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id="inputDescription" placeholder="Description" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCode" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="code" class="form-control" id="inputCode" placeholder="Code" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCurrency" class="col-sm-2 col-form-label">Currency</label>
                    <div class="col-sm-10">
                        <input type="text" name="currency" class="form-control" id="inputCurrency" placeholder="Currency" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="type" required>
                            <option value="stock">Stock</option>
                            <option value="crypto">Crypto</option>
                            <option value="forex">Forex</option>
                            <option value="indices">Indices</option>
                            <option value="commodities">Commodities</option>
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
