@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Order</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">User</dt>
                <dd class="col-sm-8">{{$order->wallet->user->name}}</dd>
                <dt class="col-sm-4">Wallet</dt>
                <dd class="col-sm-8">{{$order->wallet->name}}.</dd>
                <dt class="col-sm-4">Symbol</dt>
                <dd class="col-sm-8">{{$order->symbol->name}} ( {{$order->symbol->exchange->name}} )</dd>
                <dt class="col-sm-4">Date</dt>
                <dd class="col-sm-8">{{$order->created_at}} </dd>
                <dt class="col-sm-4">Amount</dt>
                <dd class="col-sm-8">{{$order->amount}} </dd>
                <dt class="col-sm-4">Type</dt>
                <dd class="col-sm-8">{{$order->type}} </dd>
                <dt class="col-sm-4">Status</dt>
                <dd class="col-sm-8">{{$order->status}} </dd>
                <dt class="col-sm-4">Symbol price</dt>
                <dd class="col-sm-8">{{$order->symbol_price}} </dd>
                <dt class="col-sm-4">Wallet price</dt>
                <dd class="col-sm-8">{{$order->wallet_price}} </dd>
                <dt class="col-sm-4">Price</dt>
                <dd class="col-sm-8">{{$order->price}} </dd>
                <dt class="col-sm-4">Sell Price</dt>
                <dd class="col-sm-8">{{$order->sell_price}} </dd>
                <dt class="col-sm-4">Sell Symbol Price</dt>
                <dd class="col-sm-8">{{$order->sell_symbol_price}} </dd>
                <dt class="col-sm-4">Sell Wallet Symbol Price</dt>
                <dd class="col-sm-8">{{$order->sell_wallet_symbol_price}} </dd>
                <dt class="col-sm-4">Sell Fee</dt>
                <dd class="col-sm-8">{{$order->sell_fee}} </dd>
                <dt class="col-sm-4">Sell Order total</dt>
                <dd class="col-sm-8">{{$order->sell_order_total}} </dd>
                <dt class="col-sm-4">Fee</dt>
                <dd class="col-sm-8">{{$order->fee}} </dd>
                <dt class="col-sm-4">Order total</dt>
                <dd class="col-sm-8">{{$order->order_total}} </dd>
                <dt class="col-sm-4">Inital margin</dt>
                <dd class="col-sm-8">{{$order->initial_margin}} </dd>
                <dt class="col-sm-4">Leverage</dt>
                <dd class="col-sm-8">{{$order->leverage}} </dd>
              <dt class="col-sm-4">P/L</dt>
                <dd class="col-sm-8"> </dd>
                <dt class="col-sm-4">Spread</dt>
                <dd class="col-sm-8"> <form class="form-horizontal" method="POST" action="{{route('crm.order.store.spread' , ['order' => $order->id])}}">@csrf <input type="number" name="spread" class="form-control" id="inputSpread" placeholder="0" step="0.01" value="{{$order->spread}}" required><button type="submit" class="btn btn-info">Update</button></form>
                    </dd>
            </dl>
            @if($order->status == 'close')
            <a href="{{route('crm.order.show', ['order' => $order->id ])}}" class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" style="background-color:gray;padding:5px;">Reopen</a>
            @else
            <a href="{{route('crm.order.show', ['order' => $order->id ])}}" class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" style="background-color:gray;padding:5px;">Close</a>
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
