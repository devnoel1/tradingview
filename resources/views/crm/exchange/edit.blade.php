@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Exchange</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit an Exchange</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.exchange.update', ['exchange' => $exchange->id])}}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{$exchange->name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCode" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="code" class="form-control" id="inputCode" placeholder="Code" value="{{$exchange->code}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCurrency" class="col-sm-2 col-form-label">Currency</label>
                    <div class="col-sm-10">
                        <input type="text" name="currency" class="form-control" id="inputCurrency" placeholder="Currency" value="{{$exchange->currency}}" required>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{route('crm.exchange.index')}}" class="btn btn-default float-right">Cancel</a>
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
