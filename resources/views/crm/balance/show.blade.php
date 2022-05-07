@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Balance</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Balance Transaction</h3>
        </div>
        <div class="card-body">
            <!--<dl class="row">
                <dt class="col-sm-4">Name</dt>
                <dd class="col-sm-8">{{$user->name}}</dd>
                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{$user->email}}</dd>
                <dt class="col-sm-4">Type</dt>
                <dd class="col-sm-8">{{$balance->action}}</dd>
                <dt class="col-sm-4">Wallet</dt>
                <dd class="col-sm-8">{{$balance->wallet->name}}</dd>
                <dt class="col-sm-4">Amount</dt>
                <dd class="col-sm-8">{{$balance->amount}}</dd>
                @if(isset($balance->note))
                    <dt class="col-sm-4">Note</dt>
                    <dd class="col-sm-8">{{$balance->note}}</dd>
                @endif
            </dl>
-->
          <dl class="row">
                <dt class="col-sm-4">Client ID</dt>
                <dd class="col-sm-8">{{$balance->user->id}}</dd>
                <dt class="col-sm-4">Account</dt>
            <dd class="col-sm-8"><b>{{$balance->user->name}}</b><br>
            {{$balance->user->email}}</dd>
                <dt class="col-sm-4">Verified</dt>
                @if($balance->approved == "0")
                <dd class="col-sm-8">Not</dd>
                @endif
                <dt class="col-sm-4">Agent</dt>
                <dd class="col-sm-8">{{$balance->user->name}}</dd>
                <dt class="col-sm-4">Amount</dt>
                <dd class="col-sm-8">{{$balance->amount}}</dd>
           		 <dt class="col-sm-4">Turnover Status</dt>
                <dd class="col-sm-8">no turnover</dd>
                <dt class="col-sm-4">Type</dt>
            @if($balance->action=="payout")
            
                <dd class="col-sm-8">Withdrawal</dd>
            @else
            <dd class="col-sm-8">Deposit</dd>
            @endif
                <dt class="col-sm-4">Wallet</dt>
                <dd class="col-sm-8">{{$balance->wallet->name}}</dd>
                @if(isset($balance->note))
                    <dt class="col-sm-4">Note</dt>
                    <dd class="col-sm-8">{{$balance->note}}</dd>
                @endif
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{route('crm.balance.approve', ['balance' => $balance->id])}}" class="btn btn-info float-right">Approve</a>
          <div class="btn-group float-right">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            Decline
                          </button>
                          <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="{{route('crm.balance.approve', ['balance' => $balance->id])}}">Not Verified </a>
                            <a class="dropdown-item" href="{{route('crm.balance.approve', ['balance' => $balance->id])}}">Turnover</a>
                             <a class="dropdown-item" href="{{route('crm.balance.approve', ['balance' => $balance->id])}}">Insufficient Fund</a>
                          </div>
                        </div>
        </div>
      
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
