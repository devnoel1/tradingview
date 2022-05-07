@extends('adminlte::page')

@section('title', $account->userProfile->first_name.' '.$account->userProfile->last_name.' '.$account->userProfile->id )

@section('content_header')
<h1>CRM - Account</h1>
@stop

@section('content')
<div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">Orders</a></li>
                            <li class="nav-item"><a class="nav-link" href="#assets" data-toggle="tab">Assets</a></li>
                            <li class="nav-item"><a class="nav-link" href="#transactions" data-toggle="tab">Transaction</a></li>
                           
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="profile">
                                <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                        <td>Trading volumes</td>
                                        <td>Comments</td>
                                        <td>Emails</td>
                                      
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            trading volumes
                                        </td>
                                        <td>comments</td>
                                        <td>emails</td>
                                      
                                     
                                    </tr>
                                  
                                </table>
              
                            </div>
                            <!-- /.tab-pane -->
                          <div class="active tab-pane" id="orders">
                                <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                        <td>EXCHANGE</td>
                                        <td>SYMBOL</td>
                                        <td>AMOUNT</td>
                                        <td>P/L</td>
                                        <td>CREATED</td>
                                        <td>STATUS</td>
                                        <td></td>
                                    </tr>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            @if($order->type == 'buy')
                                            +
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>{{$order->symbol->exchange->name}}</td>
                                        <td>{{$order->symbol->description}}</td>
                                        <td>{{$order->amount}} <span>{{round(((1 - $order->symbol_price / $order->symbol->last_value) * 100),2)}}%</span></td>
                                        
                                        <td>{{$order->stop_price}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>@if($order->status == 'waiting_sell')waiting @else {{$order->status}} @endif</td>
                                        <td>
                                            <a href="{{route('crm.order.show', ['order' => $order->id ])}}" class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" style="background-color:gray;padding:5px;">Show</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                <a href="{{route('crm.order.show.user', ['account' => $account->id])}}" class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" style="background-color:blue;padding:5px;">All orders</a>
                            </div>
                            <!-- /.tab-pane -->
                              
                          <div class="tab-pane" id="assets">
                                <table style="width: 100%">
                                    <tr>
                                        <td>Wallet</td>
                                        <td>Asset</td>
                                        <td>Amount</td>
                                        <td>Value</td>
                                      <td>P/L</td>
                                        <td>Spread</td>
                                        <td></td>
                                    </tr>
                                    @foreach($account->wallets as $wallet)
                                    @foreach($wallet->walletSymbols as $walletSymbol)
                                    <tr>
                                     <td>{{$walletSymbol->wallet->name}}</td>
                                     <td>{{$walletSymbol->symbol->description}}</td>
                                     <td>{{$walletSymbol->amount}}</td>
                                     <td>{{round_up($walletSymbol->amount * $walletSymbol->symbol->last_value, 2)}}</td>
                                      <td></td>
                                     <td>{{$walletSymbol->spread}}</td>
                                     <td><a href="{{route('crm.wallet_symbol.edit', ['wallet_symbol' => $walletSymbol->id])}}" class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" style="background-color:gray;padding:5px;">Edit</a></td>
                                 </tr>
                                 @endforeach
                                 @endforeach
                             </table>
                             <a href="{{route('crm.wallet_symbol.create', ['user' => $account->id ])}}" class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" style="background-color:blue;padding:5px;">Add</a>
                         </div>
                         <!-- /.tab-pane -->

                         <div class="tab-pane" id="transactions">
                            <table style="width: 100%">
                                <tr>
                                    <td>Wallet</td>
                                    <td>Asset</td>
                                    <td>Amount</td>
                                    <td>Value</td>
                                    <td>Status</td>
                                  <td>Type</td>
                                  <td>Action Required</td>
                                 
                                </tr>

                                @foreach($account->balanceTransactions as $balanceTransaction)
                                <tr>
                                    <td>@if($balanceTransaction->wallet){{$balanceTransaction->wallet->name}}@endif</td>
                                  @if($balanceTransaction->action=="payout")
                                    <td>Withdrawal</td>
                                  @else
                                  <td>Deposit</td>
                                  @endif
                                    <td>{{$balanceTransaction->amount}}</td>
                                    <td>{{$balanceTransaction->amount}}</td>
                                    <td>@if($balanceTransaction->approved) Yes @else No @endif</td>
                                    <td>{{$balanceTransaction->note}}</td>
                                    <td>{{$balanceTransaction->created}}</td>
                                    <td>@if(!$balanceTransaction->approved)<a href="{{route('crm.balance.show', ['balance' => $balanceTransaction->id])}}" class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" style="background-color:gray;padding:5px;">Show</a>@endif</td>
                                </tr>
                                @endforeach
                            </table>
                            <a href="{{route('crm.balance.create', ['user' => $account->id ])}}" class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" style="background-color:blue;padding:5px;">Add</a>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tradingvolumes">
                            <table style="width: 100%">
                                <tr>
                                    <td>Wallet</td>
                                    <td>status</td>
                                    <td>Initial Turnover</td>
                                    <td>Completed Turnover</td>
                                    <td>Pending 24H turnover</td>
                                    <td></td>
                                </tr>

                                @foreach($account->wallets as $wallet)
                                @foreach($wallet->tradingVolumes as $tradingVolume)
                                <tr>
                                    <td>{{$tradingVolume->wallet->name}}</td>
                                    <td>{{$tradingVolume->status}}</td>
                                    <td>{{$tradingVolume->required_volume}}</td>
                                    <td>{{$tradingVolume->approved_volume}}</td>
                                    <td>{{$tradingVolume->pending_volume}}</td>
                                    <td><a href="{{route('crm.trading_volume.edit', ['trading_volume' => $tradingVolume->id])}}" class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" style="background-color:gray;padding:5px;">Edit</a></td>
                                </tr>
                                @endforeach
                                @endforeach
                            </table>
                            <a href="{{route('crm.trading_volume.create', ['user' => $account->id ])}}" class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" style="background-color:blue;padding:5px;">Add</a>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="comments">
                            <div class="row">
                              
                                <div class="col-md-10">
                                    <h2>Comments ({{sizeof($account->comments)}})</h2>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" class="btn btn-info" href="{{route('crm.comment.destroy.all', ['user' => $account->id])}}">Delete All</a>
                                </div>
                            </div>
                           <div class="tab-pane" id="tradingvolumes">
                            <table style="width: 100%">
                                <tr>
                                    <td>Comment </td>
                                    <td>Agent</td>
                                    <td>Client ID</td>
                                    <td>Client Name</td>
                                    <td>Date</td>
                                    <td>Action</td>
                                </tr>
                             
                            @foreach($account->comments as $comment)
                               <?php
                                  $c=$comment->created_at;
                                  $date=date_create($c);
  									$date=date_format($date,"h/i/s a-d/m/Y");
                                  ?>
                          <tr>
                                    <td>{{$comment->message}} </td>
                                    <td>Agent</td>
                                    <td>{{$comment->user_id}}</td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{$date}}</td>
                                    <td><form action="{{ route('crm.comment.destroy', ['comment' => $comment->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form></td>
                                </tr>
                            
                          
                            @endforeach
                              </table>
                          </div>
                            <form class="form-horizontal" method="POST" action="{{route('crm.comment.store')}}">
                                @csrf
                                <input type="hidden" name="user" value="{{$account->id}}"/>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label">New Comment</label>
                                        <textarea name="message" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <div class="tab-pane" id="emails">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2>Emails ({{sizeof($account->emails)}})</h2>
                                </div>
                            </div>
                            @foreach($account->emails as $email)
                            <div class="row">
                                <div class="col-md-8">
                                    {{$email->subject}}
                                </div>
                                <div class="col-md-2">
                                    {{$email->created_at}}
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('crm.email.show', ['email' => $email->id ])}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                            @endforeach
                            <form class="form-horizontal" method="POST" action="{{route('crm.email.store')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$account->id}}"/>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">CC</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="cc_address"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">BCC</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="bcc_address"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">Subject</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="subject" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label">Message</label>
                                        <textarea name="message" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')

    @stop
