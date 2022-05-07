@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Account</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Account</h3>
        </div>
        <div class="card-body">
            {{$user->name}}<br/>
            {{$account->country}}<br/>
            {{$account->type_id}}<br/>
            <h2>Front</h2>
            <img src="{{route('crm.account.identification.idfront', ['account' => $account->id])}}"/>
            <h2>Back</h2>
            <img src="{{route('crm.account.identification.idback', ['account' => $account->id])}}"/>
        </div>
        <div class="card-footer">
            <a href="{{route('crm.account.identification.approve', ['account' => $account->id])}}" class="btn btn-info float-right">Approve</a>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
