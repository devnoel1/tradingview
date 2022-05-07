@extends('layouts.mmain')
@section('headerfile')

@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>CRM-Accounts
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                        Inbox
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                        Book
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                        Picture
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                        File Disabled
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 card">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                Profile
            </div>

        </div>
        <div class="card-body no-gutters row">
            <div class="col-md-1">
                <div class="font-icon-wrapper">
                    <a href="{{ url()->previous() }}">
                        <i class="pe-7s-back-2"> </i>
                        <p>Back</p>
                    </a>
                </div>
            </div>
            <div class="col-md-1">
                <p>{{$account->name}}</p>
                <p>{{$account->id}}</p>
            </div>
            <div class="col-md-1">
                <p>Opened P/L</p>
                <p>12</p>
            </div>
            <div class="col-md-1">
                <p>Closed P/L</p>
                <p>300</p>
            </div>
            <div class="col-md-1">
                <p>Totla Deposit</p>
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <p>Total Withdrawl</p>
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <p>Withdrawal Requested</p>
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <p>Net Deposit</p>
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <p>Total Remaining Turnover</p>
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <p>Login To Webtrade</p>
                <p>ID</p>
            </div>
            <div class="col-md-1">
                <div class="font-icon-wrapper">
                    <i class="pe-7s-prev"> </i>
                    <p>Previous</p>
                </div>

            </div>
            <div class="col-md-1">
                <div class="font-icon-wrapper">
                    <i class="pe-7s-next"> </i>
                    <p>Next</p>
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-9">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        Profile
                    </div>

                </div>
                <div class="card-body no-gutters row">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>First Name:</b> {{$account->userProfile->first_name}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Last Name:</b> {{$account->userProfile->last_name}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Total Balance:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Account Type:</b> Gold</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Email:</b> {{$account->email}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>FTD Amount:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Currency:</b> EUR</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Phone:</b> {{$account->userProfile->phone_number}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Total Credit:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Verification:</b> Some Text</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Mobile:</b> Some Text</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Total Insurance:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Time Zone:</b>
                                @if($account->userProfile->time_zone)
                                @php
                                $today = new DateTime("now", new DateTimeZone($account->userProfile->time_zone));

                                @endphp
                                {{$today->format('H:i:s a')}}
                                @else
                                None
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Address:</b> {{$account->userProfile->address_line_1}}
                                {{$account->userProfile->address_line_2}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Total Orders:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Status:</b> Some Text</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Zip Code:</b> {{$account->userProfile->zipcode}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Total Assets:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Campaign:</b> @if($account->groupuser->name)
                                {{$account->groupuser->name}}
                                @else
                                no group
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>City:</b> {{$account->userProfile->city}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Active Wallets:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Agent :</b> Some Text</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Country:</b> {{$account->userProfile->country}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Demo Wallets:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Desk:</b> Some Text</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Password:</b> Some Text</p>
                        </div>
                        <div class="col-md-4">
                            <p class="form-control"><b>Margin Wallet:</b> Some Text</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Registration IP:</b> Some Text</p>
                        </div>
                        <div class="col-md-8">
                            <p class="form-control"><b>First Agent:</b> Some Text</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="form-control"><b>Last Login:</b> {{ $account->last_login }}</p>
                        </div>
                        <div class="col-md-8">
                            <p class="form-control"><b>Previous Agent:</b> Some Text</p>
                        </div>

                    </div>

                </div>
            </div>
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        Notes:
                    </div>

                </div>
                <div class=" card-body no-gutters row">
                    <div class="scrollbar-container ps--active-y ps">
                        <div class="chat-box-wrapper">
                            <div class="col-md-12">
                                <textarea class="form-control">@if($account->userProfile->identified)User identified @else User not identified @endif Terms approved on:{{$account->userProfile->terms_and_conditions}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        Wallets: {{sizeof($account->wallets)}}
                    </div>

                </div>
                <div class=" card-body no-gutters row">


                    <div class="row">
                        @foreach($account->wallets as $wallet)
                        <div class="col-md-4">
                            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                                <h5 class="card-title">{{$wallet->name }}-</h5>
                                <p><b>Type:</b>Normal</p>
                                <p><b>Remaining Turnover:</b>Normal</p>
                                <div role="group" class="btn-group-sm btn-group btn-group-toggle">
                                    <button type="button" class="btn btn-success">View</button>
                                    <button type="button" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        Communication
                    </div>
                </div>

                <div class="card-body no-gutters row">
                    <div class="table-responsive">
                        <div class="chat-wrapper">
                            <div class="scroll-area-lg">
                                <div class="scrollbar-container ps--active-y ps">
                                    <div class="chat-box-wrapper">
                                        <div>
                                            <div class="avatar-icon-wrapper mr-1">
                                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg">
                                                </div>
                                                <div class="avatar-icon avatar-icon-lg rounded">
                                                    <img src="assets/images/avatars/2.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="chat-box">Mistaken idea of denouncing pleasure and praising pain was
                                                born and I will give you
                                            </div>
                                            <small class="opacity-6">
                                                <i class="fa fa-calendar-alt mr-1"></i>
                                                11:01 AM | Yesterday
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="app-inner-layout__bottom-pane d-block text-center">
                            <div class="mb-0 position-relative row form-group">
                                <div class="col-sm-12">
                                    <input placeholder="Write here and hit enter to send..." type="text"
                                        class="form-control-lg form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Orders: {{$orders_count}}</h5>
            <div class="scroll-area-lg">
                <div class="scrollbar-container ps--active-y ps">
                    <table style="width: 100%">
                        <tr>
                            <th></th>
                            <th>EXCHANGE</th>
                            <th>SYMBOL</th>
                            <th>AMOUNT</th>
                            <th>LIMIT</th>
                            <th>STOP</th>
                            <th>CREATED</th>
                            <th>STATUS</th>
                            <th></th>
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
                            <td>{{$order->amount}} <span>{{round(((1 - $order->symbol_price /
                                    $order->symbol->last_value) * 100),2)}}%</span></td>
                            <td>{{$order->limit_price}}</td>
                            <td>{{$order->stop_price}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>@if($order->status == 'waiting_sell')waiting @else {{$order->status}} @endif</td>
                            <td>
                                <a href="{{route('crm.order.show', ['order' => $order->id ])}}"
                                    class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    style="background-color:gray;padding:5px;">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="{{route('crm.order.show.user', ['account' => $account->id])}}"
                        class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition"
                        style="background-color:blue;padding:5px;">All orders</a>

                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                        </div>
                    </div>

                    <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 244px;">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Assets: {{sizeof($wallet_symbol)}} </h5>
            <div class="scroll-area-lg">
                <div class="scrollbar-container ps--active-y ps">

                    <table style="width: 100%">
                        <tr>
                            <th>Wallet</th>
                            <th>Asset</th>
                            <th>Amount</th>
                            <th>Value</th>
                            <th>Spread</th>
                            <th></th>
                        </tr>
                        @foreach($account->wallets as $wallet)
                        @foreach($wallet->walletSymbols as $walletSymbol)
                        <tr>
                            <td>{{$walletSymbol->wallet->name}}</td>
                            <td>{{$walletSymbol->symbol->description}}</td>
                            <td>{{$walletSymbol->amount}}</td>
                            <td>{{round_up($walletSymbol->amount * $walletSymbol->symbol->last_value, 2)}}</td>
                            <td>{{$walletSymbol->spread}}</td>
                            <td><a href="{{route('crm.wallet_symbol.edit', ['wallet_symbol' => $walletSymbol->id])}}"
                                    class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    style="background-color:gray;padding:5px;">Edit</a></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </table>
                    <a href="{{route('crm.wallet_symbol.create', ['user' => $account->id ])}}"
                        class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition"
                        style="background-color:blue;padding:5px;">Add</a>


                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                        </div>
                    </div>

                    <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 244px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Transactions</h5>
            <div class="scroll-area-lg">
                <div class="scrollbar-container ps--active-y ps">
                    <table style="width: 100%">
                        <tr>
                            <th>Wallet</th>
                            <th>Asset</th>
                            <th>Amount</th>
                            <th>Value</th>
                            <th></th>
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
                            <td>@if(!$balanceTransaction->approved)<a
                                    href="{{route('crm.balance.show', ['balance' => $balanceTransaction->id])}}"
                                    class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    style="background-color:gray;padding:5px;">Show</a>@endif</td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="{{route('crm.balance.create', ['user' => $account->id ])}}"
                        class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition"
                        style="background-color:blue;padding:5px;">Add</a>

                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                        </div>
                    </div>

                    <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 244px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Trading Volume</h5>
            <div class="scroll-area-lg">
                <div class="scrollbar-container ps--active-y ps">
                    <table style="width: 100%">
                        <tr>
                            <th>Wallet</th>
                            <th>status</th>
                            <th>required</th>
                            <th>approved</th>
                            <th>pending</th>
                            <th></th>
                        </tr>

                        @foreach($account->wallets as $wallet)
                        @foreach($wallet->tradingVolumes as $tradingVolume)
                        <tr>
                            <td>{{$tradingVolume->wallet->name}}</td>
                            <td>{{$tradingVolume->status}}</td>
                            <td>{{$tradingVolume->required_volume}}</td>
                            <td>{{$tradingVolume->approved_volume}}</td>
                            <td>{{$tradingVolume->pending_volume}}</td>
                            <td><a href="{{route('crm.trading_volume.edit', ['trading_volume' => $tradingVolume->id])}}"
                                    class="inline-flex btn items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    style="background-color:gray;padding:5px;">Edit</a></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </table>
                    <a href="{{route('crm.trading_volume.create', ['user' => $account->id ])}}"
                        class="inline-flex btn items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition"
                        style="background-color:blue;padding:5px;">Add</a>

                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                        </div>
                    </div>

                    <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 244px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
@endsection

@section('footerfile')
<script type="text/javascript">

</script>

@endsection