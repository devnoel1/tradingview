@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Group</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{$account->name}}</h3>

                    <p class="text-muted text-center">{{$account->userProfile->level->name}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Wallets</b> <a class="float-right">{{sizeof($account->wallets)}}</a>
                            @foreach($account->wallets as $wallet)
                                <p>{{$wallet->name }} - {{$wallet->getWalletValue()}}</p>
                            @endforeach
                        </li>
                        <li class="list-group-item">
                            <b>Orders</b> <a class="float-right">{{$orders_count}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Assets</b> <a class="float-right">{{sizeof($wallet_symbol)}}</a>
                        </li>
                    </ul>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Info</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Name</strong>

                    <p class="text-muted">
                        {{$account->name}}<br/>
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address </strong>

                    <p class="text-muted">{{$account->userProfile->address_line_1}}<br/>
                        @if($account->userProfile->address_line_2)
                            {{$account->userProfile->address_line_2}}<br/>
                        @endif
                        {{$account->userProfile->city}}<br/>
                        {{$account->userProfile->zipcode}}<br/>
                        {{$account->userProfile->country}}<br/></p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Contact</strong>

                    <p class="text-muted">
                        {{$account->email}}
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">
                        @if($account->userProfile->identified)
                            User identified<br/>
                        @else
                            User not identified<br/>
                        @endif
                        Terms approved on:{{$account->userProfile->terms_and_conditions}}<br/>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#orders" data-toggle="tab">Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="#assets" data-toggle="tab">Assets</a></li>
                        <li class="nav-item"><a class="nav-link" href="#transactions" data-toggle="tab">Transactions</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tradingvolumes" data-toggle="tab">Trading Volumes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comments" data-toggle="tab">Comments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tasks" data-toggle="tab">Tasks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#emails" data-toggle="tab">Emails</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="orders">
                            <table style="width: 100%">
                                <tr>
                                    <td></td>
                                    <td>EXCHANGE</td>
                                    <td>SYMBOL</td>
                                    <td>AMOUNT</td>
                                    <td>LIMIT</td>
                                    <td>STOP</td>
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
                                        <td>{{$order->limit_price}}</td>
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
                                    <td></td>
                                </tr>

                            @foreach($account->balanceTransactions as $balanceTransaction)
                                    <tr>
                                        <td>@if($balanceTransaction->wallet){{$balanceTransaction->wallet->name}}@endif</td>
                                        <td>{{$balanceTransaction->action}}</td>
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
                                    <td>required</td>
                                    <td>approved</td>
                                    <td>pending</td>
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
                            @foreach($account->comments as $comment)
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$comment->message}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$comment->created_at}}<br/>
                                        <form action="{{ route('crm.comment.destroy', ['comment' => $comment->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
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
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tasks">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2>Tasks ({{sizeof($account->tasks)}})</h2>
                                </div>
                            </div>
                            @foreach($account->tasks as $task)
                                <div class="row">
                                    <div class="col-md-6">
                                        {{$task->description}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$task->status}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$task->type}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$task->created_at}}<br/>
                                        <form action="{{ route('crm.task.destroy', ['task' => $task->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <a href="{{route('crm.task.edit', ['task' => $task->id ])}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                    </div>
                                </div>
                            @endforeach
                            <form class="form-horizontal" method="POST" action="{{route('crm.task.store')}}">
                                @csrf
                                <input type="hidden" name="user" value="{{$account->id}}"/>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">Assigned to</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="owner_user_id" required>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}" @if($user->id == auth()->user()->id) SELECTED="selected" @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label">Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status" required>
                                                <option value="new">New</option>
                                                <option value="progress">Progress</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">Due date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="due_date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="type" required>
                                                <option value="call">Call</option>
                                                <option value="meeting">Meeting</option>
                                                <option value="task">Task</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.tab-pane -->
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
