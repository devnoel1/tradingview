@section('title')
Wallet -
@endsection
@section('style')
<style>
    @media (min-width: 900px) {

        body {
            overflow: hidden !important;
        }
    }

    /* body{
            max-height: fit-content;
            padding-bottom:150px;
        } */
    #test {
        /* bottom: 0;
            top:0;
            left:0; */
        height: 82vh ;
        overflow-y: auto !important;
        /* padding-bottom:150px !important;  */

    }
    #mytest {
        /* bottom: 0;
            top:0;
            left:0; */
        height: calc(85vh - 46vh) !important;
        overflow-y: auto !important;
        background: #111d27;
        /* margin-bottom:200px !important;  */

    }


    #mytest::-webkit-scrollbar {
            width: 5px;
        /* background: #ffc62d !important; */
    }

    #mytest::-webkit-scrollbar-track {
        border-radius: 10px;
    background: grey;
    }

    #mytest::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #ffc62d;
    }
    .table_content{
        height: calc(85vh - 46vh) !important;
        overflow-y: auto !important;
        background: #111d27;
    }
    #test::-webkit-scrollbar {
        bottom: 0;
        top: 0;
        width: 5px;
        /* background: #ffc62d !important; */
    }

    #test::-webkit-scrollbar-track {
        border-radius: 10px;
        /* background: #ffc62d; */
        background: grey;
    }

    #test::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #ffc62d;
    }
    .wallet-item{
        padding-top: 15px !important;
        padding-bottom: 15px !important;
    }
    .wallet.default{
        padding-top: 15px !important;
        padding-bottom: 15px !important;
    }
    .grid-cl-none{
            grid-template-columns:none !important;
        }
    @media screen and (min-width: 1280px) {
        .wallet_sidebar{
            height: calc(100vh - 18vh) !important;
            margin-right: -136px !important;
        }
        .wallet_content{
            margin-left: 136px !important;
            padding-bottom: 0px !important;
        }
        .table_content{
            /* height: 360px !important; */
            overflow-y: auto !important;
        }
        .table_content{
            overflow-y: auto !important;
        }

        .wallet--intro{
            /* width: 500px !important; */
        }
        .amount_flex{
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-around !important;
        }
        /* #mytest{
            overflow-y: hidden !important;
        }
        #mytest:hover {
            overflow-y: auto !important;
        } */
    }
    @media screen and (max-width: 1279px) {
        #mytest{
            margin-bottom:30px !important;
        }
        #newtest{
            margin-bottom:30px !important;
        }
        .wallet_sidebar{
            height: 50vh !important;
        }
        .wallet_content{
            height: auto !important;
        }
    }
    .amount_flex{
        display: flex !important;
        align-items: center;
    }

    .table_content::-webkit-scrollbar {
        bottom: 0;
        top: 0;
        width: 5px;
        /* background: #ffc62d !important; */
    }

    .table_content::-webkit-scrollbar-track {
        border-radius: 10px;
        /* background: #ffc62d; */
        background: grey;
    }

    .table_content::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #ffc62d;
    }
    .customized_height_deposit{
            height: 429px !important;
    }
    .customized_height_withdraw{
            height: 179px !important;
    }
    .customized_height_transfer{
            height: 156px !important;
    }
    @media screen and (max-width: 767px) {
        .custom_menu_mobile{
            justify-content: space-between !important;
        }
        .wallet_sidebar{
            height: 35vh !important;
        }
        .grid-cl-none{
            grid-template-columns:none !important;
        }
        .customized_height_deposit{
            height: 541px !important;
        }
        .customized_height_withdraw{
            height: 204px !important;
        }
    }
    @media screen and (min-width: 769px) and (max-width: 1279px) {
        .wallet_sidebar{
            height: 25vh !important;
        }
    }
    .footer-stats::before{
        content: none !important;
    }
    @media screen and (max-width: 1279px){
        .footer{
            display: grid !important;
        }
    }
    @media screen and (min-width: 350px) and (max-width: 500px){
        .footer{
            display: flex !important;
        }
    }
    .card-js .expiry-wrapper .expiry{
        padding-top: 8px !important;
        padding-bottom: 8px !important;
        height: auto;
        margin-top: 0.25rem;
    }
    .card-js .icon{
        top: 12px !important;
    }
    .card-number-wrapper .icon, .name-wrapper .icon{
        padding-top: 5px;
    }
    .card-js .card-number-wrapper .card-type-icon{
        top: 14px !important;
    }
    .focus\:ring-opacity-50:focus {
        --tw-ring-opacity: 0.5 !important;
    }

    .focus\:ring-indigo-200:focus {
        --tw-ring-opacity: 1 !important;
        --tw-ring-color: rgba(199, 210, 254, var(--tw-ring-opacity)) !important;
    }
    .focus\:ring:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color) !important;
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important;
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000) !important;
    }
    .focus\:border-indigo-300:focus {
        --tw-border-opacity: 1 !important;
        border-color: rgba(165, 180, 252, var(--tw-border-opacity)) !important;
    }
    input [type='tel']{
        border: 1px solid var(--softgrey) !important;
    }
    .card-js .expiry-wrapper .expiry:focus{
        --tw-ring-opacity: 0.5 !important;
        --tw-ring-color: rgba(199, 210, 254, var(--tw-ring-opacity)) !important;
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color) !important;
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important;
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000) !important;
        --tw-border-opacity: 1 !important;
        border-color: rgba(165, 180, 252, var(--tw-border-opacity)) !important;
    }
    .card-js input{
        background-color: #fff !important;
        border: 1px solid var(--softgrey) !important;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<link rel="stylesheet" href="{{ asset('card-js.min.css') }}">
@endsection
<div class="flex flex-col h-full" >
@livewire('navigation-menu')
    <!-- <main class="flex absolute w-full ">
        <div class="min-h-full bg-gray-900 flex  flex-col w-full"> -->

            <div class="flex flex-auto flex-col overflow-hidden flex-1">
                <div class="overflow-hidden flex flex-auto flex-col flex-1">
                    <div class="grid xl:grid-cols-6 2xl:grid-cols-7 gap-0 bg-gray-900 flex flex-col flex-1 b-t overflow-hidden">


                        <div class="grid col-start-1 col-end-2 2xl:col-end-1 xl:flex bg-gray-800 flex-col flex-1 wallet_sidebar" id="test">

                            <div class="wallet inner grid grid-cols-2 items-center justify-between flex ">
                                <div class="col-start-1 col-end-1">
                                    <em class="flex">All Wallets</em>
                                    <sub class="flex">&euro; {{round($total_value, 2)}}</sub>
                                </div>
                                <div class="col-start-2 col-end-2 text-right">
                                    @if(sizeof($wallets) < 5) <a class="grey--button open-modal" data-modal-id="modal-create" wire:click="$toggle('addingWallet')">Create</a>
                                        @endif
                                </div>
                            </div>

                            @foreach($wallets as $wallet)
                            <div class="">
                                <div class="wallet wallet-item @if($wallet->active)default @endif " wire:click="setView('{{$wallet->id}}')">
                                    <em wire:click="setActive('{{$wallet->id}}')">{{$wallet->name}} @if($wallet->active)<sup>active</sup>@endif
                                        @if($wallet->demo)
                                        <sup>demo</sup>
                                        @elseif($wallet->margin)
                                        <sup>margin</sup>
                                        @endif</em>
                                    <sub>&euro; @foreach($wallets_array as $wallet_object)@if($wallet_object['id'] == $wallet->id) {{round($wallet_object['total_value'], 2)}} @endif @endforeach</sub>
                                </div>
                            </div>
                            @endforeach


                        </div>

                        <div class="xl:col-start-2 xl:col-end-7 2xl:col-start-2 2xl:col-end-8 flex-1 flex-col flex xl:py-10 xl:px-10 2xl:py-20 2xl:px-10 wallet_content" id="test">
                            <div class=" flex flex-auto flex-col flex-1">
                                @foreach($wallets as $wallet)
                                @if($wallet->id == $view_wallet_id)
                                <div class="grid grid-cols-5 gap-0 bg-gray-900 flex flex-col flex-inital b-t grid-cl-none items-center px-4 xl:px-0 py-2 xl:py-0">
                                <div class="col-start-1 col-end-4 mb-5 xl:mb-0 xl:col-start-1 xl:col-end-4 text-left wallet--intro">
                                    <div class="flex-row">
                                        @if($wallet->active)
                                        <sup class="flex-auto">active</sup>
                                        @endif
                                        @if($wallet->margin)
                                        <sup class="flex-auto">margin</sup>
                                        @endif
                                        @if($wallet->demo)
                                        <sup class="flex-auto">demo</sup>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-start-4 col-end-6 text-right mb-5 xl:mb-0 xl:col-start-4 xl:col-end-6 text-left xl:text-right">
                                    @if(!$wallet->demo)
                                        <span wire:click="$toggle('depositingWallet')"><a wire:click="$emit('initCard')" class="grey--button-icon open-modal" data-modal-id="modal-deposit"><svg width="24" height="24" viewBox="0 0 24 24" class="StyledDepositIcon-sc-gefl58 dqxSGw">
                                                <g transform="translate(5 5)" fill="none" fill-rule="evenodd">
                                                    <path d="M10.945 7.11L7.68 10.6V3.941c0-.106-.08-.191-.179-.191-.099 0-.179.085-.179.19V10.6L4.055 7.111a.172.172 0 0 0-.126-.056.172.172 0 0 0-.127.056.2.2 0 0 0 0 .27l3.571 3.813a.179.179 0 0 0 .127.056.178.178 0 0 0 .126-.056l3.572-3.813a.2.2 0 0 0 0-.27.17.17 0 0 0-.253 0z" stroke="currentColor" stroke-width="0.5" fill-rule="nonzero"></path>
                                                    <circle stroke="currentColor" cx="7.5" cy="7.5" r="7.5"></circle>
                                                </g>
                                            </svg>Deposit</a>
                                        </span>
                                        @if($view_wallet_can_withdraw)
                                        <a wire:click="$toggle('withdrawingWallet')" class="grey--button-icon ml-2 open-modal" data-modal-id="modal-withdraw"><svg width="24" height="24" viewBox="0 0 24 24" class="StyledWithdrawIcon-sc-1hud4xo ePXDU">
                                                <g transform="translate(5 5)" fill="none" fill-rule="evenodd">
                                                    <path d="M4.055 7.89L7.32 4.4v6.658c0 .106.08.191.179.191.099 0 .179-.085.179-.19V4.4l3.266 3.488c.035.037.08.056.126.056a.172.172 0 0 0 .127-.056.2.2 0 0 0 0-.27L7.627 3.806A.179.179 0 0 0 7.5 3.75a.178.178 0 0 0-.126.056L3.802 7.62a.2.2 0 0 0 0 .27.17.17 0 0 0 .253 0z" stroke="currentColor" stroke-width="0.5" fill-rule="nonzero"></path>
                                                    <circle stroke="currentColor" cx="7.5" cy="7.5" r="7.5"></circle>
                                                </g>
                                            </svg>Withdraw</a>
                                        <a wire:click="$toggle('transferingWallet')" class="grey--button-icon ml-2 open-modal" data-modal-id="modal-withdraw"><svg width="24" height="24" viewBox="0 0 24 24" class="StyledWithdrawIcon-sc-1hud4xo ePXDU">
                                                <g transform="translate(5 5)" fill="none" fill-rule="evenodd">
                                                    <path d="M4.055 7.89L7.32 4.4v6.658c0 .106.08.191.179.191.099 0 .179-.085.179-.19V4.4l3.266 3.488c.035.037.08.056.126.056a.172.172 0 0 0 .127-.056.2.2 0 0 0 0-.27L7.627 3.806A.179.179 0 0 0 7.5 3.75a.178.178 0 0 0-.126.056L3.802 7.62a.2.2 0 0 0 0 .27.17.17 0 0 0 .253 0z" stroke="currentColor" stroke-width="0.5" fill-rule="nonzero"></path>
                                                    <circle stroke="currentColor" cx="7.5" cy="7.5" r="7.5"></circle>
                                                </g>
                                            </svg>Transfer</a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-start-1 col-end-6 xl:col-end-6 2xl:col-end-6">
                                        <div class="bg-grey-800 text-white flex flex-col flex-initial wallet--intro">

                                            <div class="grid grid-cols-4 md:grid-cols-6 gap-0 xl:flex-row xl:flex justify-between">
                                                <h2 wire:click="setActive('{{$wallet->id}}')" class="wallet-set-active flex-auto">{{$wallet->name}}</h2>
                                                <div class="text-2xl md:hidden flex-auto text-center">&euro; @foreach($wallets_array as $wallet_object)@if($wallet_object['id'] == $wallet->id) {{round($wallet_object['total_value'], 2)}} @endif @endforeach</div>
                                                <div class="text-center md:hidden flex-auto">
                                                    <span class="block text-gray-600 text-xs">Holds on orders</span>
                                                    <span>&euro; @foreach($wallets_array as $wallet_object)@if($wallet_object['id'] == $wallet->id) {{round(($wallet_object['total_value'] - $wallet->balance), 2)}} @endif @endforeach</span>
                                                </div>
                                                <div class="text-center md:hidden flex-auto">
                                                    <span class="block text-gray-600 text-xs">Available balance</span>
                                                    <span>&euro; {{round($wallet->balance, 2)}}</span>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-4 md:grid-cols-6 gap-0 bg-gray-900 flex flex-col flex-1 b-t  flex-items mt-2">
                                                <div class="text-2xl hidden md:inline flex-auto">&euro; @foreach($wallets_array as $wallet_object)@if($wallet_object['id'] == $wallet->id) {{round($wallet_object['total_value'], 2)}} @endif @endforeach</div>
                                                <div class="amount_flex col-end-7 xl:col-end-7 2xl:col-end-7 col-start-2 justify-between">
                                                    <div class="text-center hidden md:inline flex-auto">
                                                        <span class="block text-gray-600 text-xs">Holds on orders</span>
                                                        <span>&euro; @foreach($wallets_array as $wallet_object)@if($wallet_object['id'] == $wallet->id) {{round(($wallet_object['total_value'] - $wallet->balance), 2)}} @endif @endforeach</span>
                                                    </div>
                                                    <div class="text-center hidden md:inline flex-auto">
                                                        <span class="block text-gray-600 text-xs">Available balance</span>
                                                        <span>&euro; {{round($wallet->balance, 2)}}</span>
                                                    </div>
                                                    <div class="text-center flex-auto">
                                                        <span class="block text-gray-600 text-xs">Total remaining turnover</span>
                                                        <span>&euro; {{round($wallet_total_trading_volume, 2)}}</span>
                                                    </div>
                                                    <div class="text-center flex-auto">
                                                        <span class="block text-gray-600 text-xs">Total deposit</span>
                                                        <span>&euro; {{round($wallet_total_deposits, 2)}}</span>
                                                    </div>
                                                    <div class="text-center flex-auto">
                                                        <span class="block text-gray-600 text-xs">Total withdrawals</span>
                                                        <span>&euro; {{round($wallet_total_withdrawals, 2)}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab--system flex flex-row mt-4" style="overflow-x:auto">

                                    <a wire:click="setViewTab('trading_volumes')" class="@if($view_tab == 'trading_volumes')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                        <div class="flex flex-row items-center">
                                            <svg viewBox="0 0 30 30" width="15">
                                                <g fill="#8a939f" fill-rule="nonzero">
                                                    <path d="M15.0000124,2.00051437 C18.0256556,2.00293415 20.9550202,3.06429811 23.2800124,5.00051437 L21.0000124,5.00051437 C20.4477277,5.00051437 20.0000124,5.44822962 20.0000124,6.00051437 C20.0000124,6.55279912 20.4477277,7.00051437 21.0000124,7.00051437 L26.0000124,7.00051437 C26.5522972,7.00051437 27.0000124,6.55279912 27.0000124,6.00051437 L27.0000124,1.00051437 C27.0000124,0.448229623 26.5522972,0.000514372947 26.0000124,0.000514372947 C25.4477277,0.000514372947 25.0000124,0.448229623 25.0000124,1.00051437 L25.0000124,3.84351437 C20.5994944,-0.114986699 14.2808187,-1.11140464 8.87567765,1.30080172 C3.47053656,3.71300809 -0.00758830137,9.08154216 0,15.0005144 C0,15.5527991 0.447727682,16.0005144 1.00001243,16.0005144 C1.55229718,16.0005144 2.00001243,15.5527991 2.00001243,15.0005144 C2.00827845,7.82423931 7.82373737,2.00878039 15.0000124,2.00051437 Z" />
                                                    <path d="M29.0000124,14.0005144 C28.4477277,14.0005144 28.0000124,14.4482296 28.0000124,15.0005144 C28.0079747,20.0384334 25.1000666,24.6259197 20.5404928,26.7685765 C15.980919,28.9112334 10.5933485,28.2219983 6.72001243,25.0005144 L9.00001243,25.0005144 C9.55229718,25.0005144 10.0000124,24.5527991 10.0000124,24.0005144 C10.0000124,23.4482296 9.55229718,23.0005144 9.00001243,23.0005144 L4.00001243,23.0005144 C3.44772768,23.0005144 3.00001243,23.4482296 3.00001243,24.0005144 L3.00001243,29.0005144 C3.00001243,29.5527991 3.44772768,30.0005144 4.00001243,30.0005144 C4.55229718,30.0005144 5.00001243,29.5527991 5.00001243,29.0005144 L5.00001243,26.1575144 C9.40053047,30.1160154 15.7192061,31.1124334 21.1243472,28.700227 C26.5294883,26.2880207 30.0076132,20.9194866 30.0000249,15.0005144 C30.0000249,14.4482296 29.5522972,14.0005144 29.0000124,14.0005144 Z" />
                                                </g>
                                            </svg>
                                            <span class="text-white">Turnover</span>
                                        </div>
                                    </a>
                                    <a wire:click="setViewTab('deposits')" class="@if($view_tab == 'deposits')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                        <div class="flex flex-row items-center">
                                            <svg width="24" height="24" viewBox="0 0 24 24">
                                                <g transform="translate(5 5)" fill="none" fill-rule="evenodd">
                                                    <path d="M10.945 7.11L7.68 10.6V3.941c0-.106-.08-.191-.179-.191-.099 0-.179.085-.179.19V10.6L4.055 7.111a.172.172 0 0 0-.126-.056.172.172 0 0 0-.127.056.2.2 0 0 0 0 .27l3.571 3.813a.179.179 0 0 0 .127.056.178.178 0 0 0 .126-.056l3.572-3.813a.2.2 0 0 0 0-.27.17.17 0 0 0-.253 0z" stroke="#8a939f" stroke-width="0.5" fill-rule="nonzero"></path>
                                                    <circle stroke="#8a939f" cx="7.5" cy="7.5" r="7.5"></circle>
                                                </g>
                                            </svg>
                                            <span class="text-white">Deposits</span>
                                        </div>
                                    </a>
                                    <a wire:click="setViewTab('withdrawals')" class="@if($view_tab == 'withdrawals')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                        <div class="flex flex-row items-center">
                                            <svg width="24" height="24" viewBox="0 0 24 24">
                                                <g transform="translate(5 5)" fill="none" fill-rule="evenodd">
                                                    <path d="M4.055 7.89L7.32 4.4v6.658c0 .106.08.191.179.191.099 0 .179-.085.179-.19V4.4l3.266 3.488c.035.037.08.056.126.056a.172.172 0 0 0 .127-.056.2.2 0 0 0 0-.27L7.627 3.806A.179.179 0 0 0 7.5 3.75a.178.178 0 0 0-.126.056L3.802 7.62a.2.2 0 0 0 0 .27.17.17 0 0 0 .253 0z" stroke="#8a939f" stroke-width="0.5" fill-rule="nonzero"></path>
                                                    <circle stroke="#8a939f" cx="7.5" cy="7.5" r="7.5"></circle>
                                                </g>
                                            </svg>
                                            <span class="text-white">Withdrawals</span>
                                        </div>
                                    </a>
                                </div>


                                @if($view_tab == 'trading_volumes')
                                <div class="text-white flex flex-col flex-1 mt-5 xl:mt-0">
                                    <div class="px-4 py-2 grid grid-cols-6 gap-2 bg-gray-800 trade-history-header text-gray-400 uppercase">
                                        <div>Date</div>
                                        <div>Type</div>
                                        <div>Amount</div>
                                        <div>Initial turnover</div>
                                        <div>Turnover amount</div>
                                        <div>Remaining turnover</div>
                                    </div>

                                    @if(!$wallet->tradingVolumes->isEmpty())
                                    <div class="custom-scroll flex-auto table_content">
                                        <div class="wrapper flex flex-1 flex-col">
                                            @foreach($wallet->tradingVolumes as $trading_volume)
                                            <div class="px-4 py-3 grid grid-cols-6 gap-2 bg-gray-800 mt-0 text-white tab--system-row items-center" style="border-top: 1px solid #070f15;">
                                                <div class="text-white text-xs">{{\Carbon\Carbon::now()->format('d/m/Y')}}</div>
                                                <div class="text-green text-xs">Credit</div>
                                                <div class="text-white text-xs">{{round($trading_volume->approved_volume, 2)}}</div>
                                                <div class="text-white text-xs">{{round($trading_volume->required_volume, 2)}}</div>
                                                <div class="text-green text-xs">{{round(($trading_volume->required_volume - $trading_volume->approved_volume), 2)}}</div>
                                                <div class="text-grey-700 text-xs">
                                                    <span>{{ round((($trading_volume->approved_volume + $trading_volume->pending_volume) / ($trading_volume->required_volume/100)),2)}}%</span>
                                                    <div class="progress--bar--mini">
                                                        <span style="width:{{ ($trading_volume->approved_volume + $trading_volume->pending_volume) / ($trading_volume->required_volume/100)}}%;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <div class="custom-scroll flex-auto" style="background: #111d27;height: calc(85vh - 46vh) !important">
                                        <div class="wrapper flex flex-1 flex-col">
                                            <div class="px-2 md:px-8 py-3 grid gap-2 text-center tab--system-row items-center">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif

                                @if($view_tab == 'deposits')
                                <div class="text-white flex flex-col flex-1 mt-5 xl:mt-0">
                                    <div class="px-2 md:px-4 py-2 grid grid-cols-5 gap-2 bg-gray-800 trade-history-header text-gray-400 uppercase">
                                        <div>Date</div>
                                        <div>Asset</div>
                                        <div>Amount</div>
                                        <div>Note</div>
                                        <div>Status</div>
                                    </div>

                                    @if(!$wallet->balanceTransactions->isEmpty() && $wallet->balanceTransactions[0]->action == 'add')
                                    <div class="custom-scroll flex-auto table_content">
                                        <div class="wrapper flex flex-1 flex-col">

                                            @foreach($wallet->balanceTransactions as $transaction)
                                            @if($transaction->action == 'add')
                                            <div class="px-2 md:px-4 py-3 grid grid-cols-5 gap-2 bg-gray-800 mt-0 text-white tab--system-row items-center" style="border-top: 1px solid #070f15;">
                                                <div class="text-white text-xs">{{\Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y')}}</div>
                                                <div class="flex flex-row items-center">
                                                    <svg viewBox="0 0 24 24" height="24" fill="#fff">
                                                        <path d="M13 20c-3.21 0-5-1.89-5.52-5.54H5.83v-1.61h1.48v-.83-.85H5.79V9.56h1.69C8.06 5.88 10.06 4 13.06 4a4.86 4.86 0 0 1 5.15 4.9H15c-.1-1.3-.67-2.29-1.89-2.29s-2 .79-2.28 3h3.52v1.61h-3.64V12.9h3.69v1.61h-3.57c.32 2.1 1.07 2.94 2.25 2.94s1.84-.88 2-2.21h3.11A4.78 4.78 0 0 1 13 20z"></path>
                                                    </svg>
                                                    <span class="text-white text-xs">Euro</span>
                                                </div>
                                                <div class="text-white text-xs">{{round($transaction->amount, 2)}}</div>
                                                <div class="text-green text-xs">{{$transaction->note}} </div>
                                                <div class="text-xs">
                                                    @if($transaction->approved)
                                                    <span class="bg-green text-white px-3 py-1 rounded-sm">Approved</span>
                                                    @else
                                                    <span class="bg-yellow text-white px-3 py-1 rounded-sm">Pending</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <div class="custom-scroll flex-auto" style="background: #111d27;height: calc(85vh - 46vh) !important;">
                                        <div class="wrapper flex flex-1 flex-col">
                                            <div class="px-2 md:px-4 py-3 grid gap-2 text-center tab--system-row items-center">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                @if($view_tab == 'withdrawals')
                                <div class="text-white flex flex-col flex-1  mt-5 xl:mt-0">
                                    <div class="px-2 md:px-4 py-2 grid grid-cols-5 gap-2 bg-gray-800 trade-history-header text-gray-400 uppercase">
                                        <div>Date</div>
                                        <div>Asset</div>
                                        <div>Amount</div>
                                        <div>Note</div>
                                        <div>Status</div>
                                    </div>

                                    @if(!$wallet->balanceTransactions->isEmpty() && $wallet->balanceTransactions[0]->action == 'payout')
                                    <div class="custom-scroll flex-auto table_content">
                                        <div class="wrapper flex flex-1 flex-col">
                                            @foreach($wallet->balanceTransactions as $transaction)
                                            @if($transaction->action == 'payout')
                                            <div class="px-2 md:px-4 py-3 grid grid-cols-5 gap-2 bg-gray-800 mt-0 text-white tab--system-row items-center" style="border-top: 1px solid #070f15;">
                                                <div class="text-white text-xs">{{\Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y')}}</div>
                                                <div class="flex flex-row items-center">
                                                    <svg viewBox="0 0 24 24" height="24" fill="#fff">
                                                        <path d="M13 20c-3.21 0-5-1.89-5.52-5.54H5.83v-1.61h1.48v-.83-.85H5.79V9.56h1.69C8.06 5.88 10.06 4 13.06 4a4.86 4.86 0 0 1 5.15 4.9H15c-.1-1.3-.67-2.29-1.89-2.29s-2 .79-2.28 3h3.52v1.61h-3.64V12.9h3.69v1.61h-3.57c.32 2.1 1.07 2.94 2.25 2.94s1.84-.88 2-2.21h3.11A4.78 4.78 0 0 1 13 20z"></path>
                                                    </svg>
                                                    <span class="text-white text-xs">Euro</span>
                                                </div>
                                                <div class="text-white text-xs">{{round($transaction->amount, 2)}}</div>
                                                <div class="text-green text-xs">{{$transaction->note}} </div>
                                                <div class="text-xs">
                                                    @if($transaction->approved)
                                                    <span class="bg-green text-white px-3 py-1 rounded-sm">Approved</span>
                                                    @else
                                                    <span class="bg-yellow text-white px-3 py-1 rounded-sm">Pending</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <div class="custom-scroll flex-auto" style="background: #111d27;height: calc(85vh - 46vh) !important;">
                                        <div class="wrapper flex flex-1 flex-col">
                                            <div class="px-2 md:px-8 py-3 grid gap-2 text-center tab--system-row items-center">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Mobile Submenu -->
        {{--<div class="flex flex-row xl:hidden footer--submenu">
                <a href="/dashboard" class="flex flex-row flex-auto text-center text-white">Dashboard</a>
                <a href="/trade" class="xl:flex flex-row flex-auto text-center text-white">Trade</a>
                <a href="/wallet" class="active xl:flex flex-row flex-auto text-center text-white">Wallet</a>
                <a href="/orders" class="xl:flex flex-row flex-auto text-center text-white">Orders</a>
            </div>--}}

            <!-- Footer -->
        {{--<div class="footer px-3 py-2 border-t border-gray-600" style="border-left:none; border-right:none; border-bottom:none;">
                <div class="text-white system-status maintenance">
                    @if($system_status == 'starting')
                    Systems starting
                    @elseif($system_status == 'operational')
                    Systems operational
                    @elseif($system_status == 'maintenance')
                    Scheduled maintenance
                    @elseif($system_status == 'error')
                    Systems error
                    @endif
                </div>
            </div>--}}

        <!-- </div>
    </main> -->
    <!-- Adding Wallet -->
    <x-jet-dialog-modal wire:model="addingWallet">
        <x-slot name="title">
            {{ __('Add new Wallet') }}
        </x-slot>

        <x-slot name="content">
            <!-- New Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="new_name" value="{{ __('Wallet Name') }}" />
                <x-jet-input id="new_name" type="text" class="mt-1 block w-full" wire:model="new_name" />
                <x-jet-input-error for="new_name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-input id="margin_wallet" type="checkbox" class="mt-1" wire:model="margin_wallet" style="float:left;" />
                <x-jet-label for="margin_wallet" value="{{ __('Margin Wallet') }}" />
                <x-jet-input-error for="margin_wallet" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addingWallet')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addWallet" wire:loading.attr="disabled">
                {{ __('add Wallet') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Rename Wallet -->
    <x-jet-dialog-modal wire:model="renamingWallet">
        <x-slot name="title">
            {{ __('Renaming Wallet') }}
        </x-slot>

        <x-slot name="content">
            <!-- New Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="rename_name" value="{{ __('Wallet Name') }}" />
                <x-jet-input id="rename_name" type="text" class="mt-1 block w-full" wire:model="rename_name" />
                <x-jet-input-error for="rename_name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('renamingWallet')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="renameWallet" wire:loading.attr="disabled">
                {{ __('Rename Wallet') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Deposit Wallet -->
    <x-jet-dialog-modal wire:model="depositingWallet">
        <x-slot name="title">
            {{ __('Deposit to Wallet') }}
        </x-slot>

        <x-slot name="content">

            <div class="flex justify-center items-center customized_height_deposit" wire:loading.flex wire:target="depositWallet">
                <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-gray-900"></div>
            </div>
            <div wire:loading.remove wire:target="depositWallet" class="@if (session()->has('DepositMessage')) hidden @endif depositPopupClose">

                <div class="col-span-6 sm:col-span-4 mb-4">
                    {{ __('At Sigi & Co we are always searching to provide our Clients with the  widest  range of Global transfer solutions as is currently available. Should you need to discuss what providers are available, please do not hesitate to contact your Financial Representative at any time.') }}
                </div>

                <div class="col-span-6 sm:col-span-4 relative">
                    <x-jet-input id="card_number" type="tel" class="mt-2 block w-full"
                    wire:model.defer="card_number"
                    x-autocompletetype="cc-number" autocomplete="cc-number"
                    autocorrect="off" spellcheck="off" autocapitalize="off" maxlength="17" placeholder='Card Number' />
                    <img class="hidden" id="visa_icon" src="{{ asset('icons8-visa-50.png') }}" style="position: absolute;top: 3px;right: 1%;width: 35px;"/>
                    <img class="hidden" id="mastercard_icon" src="{{ asset('icons8-mastercard-50.png') }}" style="position: absolute;top: 3px;right: 1%;width: 35px;"/>
                    <img class="hidden" id="americanexpress_icon" src="{{ asset('icons8-american-express-50.png') }}" style="position: absolute;top: 3px;right: 1%;width: 35px;"/>
                    <x-jet-input-error for="card_number" class="mt-1" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-input id="card_name" name="ccname" type="text" class="mt-2 block w-full mr-2"
                    wire:model.defer="card_name"
                    autocomplete="cc-name"
                    autocorrect="off" spellcheck="off" autocapitalize="off" placeholder='Full Name' />
                    <x-jet-input-error for="card_name" class="mt-1" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-input id="expiration_date" type="tel" class="mt-2 block w-full"
                    wire:model.defer="expiration_date" value=""
                    x-autocompletetype="cc-exp" autocomplete="cc-exp"
                    autocorrect="off" spellcheck="off" autocapitalize="off" maxlength="7" placeholder='MM - YY' />

                    <x-jet-input-error for="expiration_date" class="mt-1" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-input id="cvc" name="cvc" type="tel" class="mt-2 block w-full"
                    wire:model.defer="cvc"
                    autocomplete="cc-csc"
                    autocorrect="off" spellcheck="off" autocapitalize="off" maxlength="4" placeholder='CVV/CVC' />

                    <x-jet-input-error for="cvc" class="mt-1" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <select id="currency" name="currency" class="border-gray-300 text-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2 block w-full"
                    wire:model.defer="currency">
                        <option value="0">Select Currency</option>
                        <option value="1">USD</option>
                        <option value="2">EUR</option>
                        <option value="3">GBP</option>
                        <option value="4">CHF</option>
                        <option value="5">CAD</option>
                        <option value="6">AUD</option>
                    </select>
                    <x-jet-input-error for="currency" class="mt-2" />
                    @if($currency_error) <p class="text-red-700 text-xs mt-2">Please Select Currency.</p> @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-input id="deposit_amount" type="number" class="mt-2 block w-full" wire:model.defer="deposit_amount" step='1.00' placeholder='Deposit Amount' />
                    <x-jet-input-error for="deposit_amount" class="mt-2" />
                </div>

                <!-- Note -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-input id="deposit_note" type="text" class="mt-2 block w-full" wire:model.defer="deposit_note" placeholder="Deposit Note"/>
                    <x-jet-input-error for="deposit_note" class="mt-2" />
                </div>

            </div>
            @if (session()->has('DepositMessage') || $successPopup == true)
            <div class="bg-white flex items-center justify-center mx-auto p-5 relative w-96 customized_height_deposit">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg
                            class="h-6 w-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                    </div>
                    <h3 class="text-lg mt leading-6 font-medium text-green-800 mt-8 mb-2 font-mono">{{ session('DepositMessage') ?? 'Deposit Pending.' }}</h3>
                </div>
            </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <div class="grid grid-cols-2 items-center">
                <div>
                    <div class="flex">
                        <img src="{{ asset('icons8-visa-50.png') }}"/>
                        <img src="{{ asset('icons8-mastercard-50.png') }}"/>
                        <img src="{{ asset('icons8-american-express-50.png') }}"/>
                    </div>

                    <p class="mt-1 text-left" style="font-size: 10px;">We do not store your credit card information and your details are protected with SSL.</p>
                </div>


                <div class="@if (session()->has('DepositMessage')) hidden @endif depositPopupClose">
                    <x-jet-secondary-button wire:click="$toggle('depositingWallet')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-button class="ml-2 btn_deposit_icon" wire:click="depositWallet" wire:loading.attr="disabled">
                        <img src="https://img.icons8.com/ios-glyphs/16/000000/lock--v1.png" style="margin-right: 8px ; padding-top: 2px;"/>{{ __('Deposit') }}
                    </x-jet-button>
                </div>


                @if (session()->has('DepositMessage') || $successPopup == true)
                <div>
                    <x-jet-button class="ml-2 btn_deposit_icon" wire:click="successPopupClose">
                        <img src="https://img.icons8.com/ios-glyphs/16/000000/lock--v1.png" style="margin-right: 8px ; padding-top: 2px;"/>OK
                    </x-jet-button>
                </div>
                @endif
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Withdraw Wallet -->
    <x-jet-dialog-modal wire:model="withdrawingWallet">
        <x-slot name="title">
            {{ __('Withdraw from Wallet') }}
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-center items-center customized_height_withdraw" wire:loading.flex wire:target="withdrawWallet">
                <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-gray-900"></div>
            </div>

            <div wire:loading.remove wire:target="withdrawWallet" class="@if (session()->has('WithdrawMessage')) hidden @endif depositPopupClose">
                <div class="col-span-6 sm:col-span-4">
                    {{ __('By using this form you can withdraw Balance from your Wallet. Fill in the Amount you want to withdraw from your wallet. The agent will contact you to help you with the payout.') }}
                </div>
                @if($withdraw_error)
                <div class="col-span-6 sm:col-span-4" style="color:red">
                    {{ __('Balance lower than withdraw amount!') }}
                </div>
                @endif

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="withdraw_amount" value="{{ __('Amount') }}" />
                    <x-jet-input id="withdraw_amount" type="number" class="mt-1 block w-full" wire:model.defer="withdraw_amount" step='1.00' value='0.00' placeholder='0.00' />
                    <x-jet-input-error for="withdraw_amount" class="mt-2" />
                </div>

                <!-- Note -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="withdraw_note" value="{{ __('Note') }}" />
                    <x-jet-input id="withdraw_note" type="text" class="mt-1 block w-full" wire:model.defer="withdraw_note" />
                    <x-jet-input-error for="withdraw_note" class="mt-2" />
                </div>
            </div>

            @if (session()->has('WithdrawMessage') || $successPopup == true)
            <div class="bg-white flex items-center justify-center mx-auto p-5 relative w-96 customized_height_withdraw">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg
                            class="h-6 w-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                    </div>
                    <h3 class="text-lg mt leading-6 font-medium text-green-800 mt-8 mb-2 font-mono">{{ session('WithdrawMessage') ?? 'Withdraw Pending.' }}</h3>
                </div>
            </div>
            @endif

        </x-slot>

        <x-slot name="footer">
            <div class="@if (session()->has('WithdrawMessage')) hidden @endif depositPopupClose">
                <x-jet-secondary-button wire:click="$toggle('withdrawingWallet')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="withdrawWallet" wire:loading.attr="disabled">
                    {{ __('Withdraw') }}
                </x-jet-button>
            </div>
            @if (session()->has('WithdrawMessage') || $successPopup == true)
                <div>
                    <x-jet-button class="ml-2" wire:click="successWPopupClose">
                        OK
                    </x-jet-button>
                </div>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Transfer Wallet -->
    <x-jet-dialog-modal wire:model="transferingWallet">
        <x-slot name="title">
            {{ __('Transfer from one Wallet to another Wallet') }}
        </x-slot>

        <x-slot name="content">


            <div class="flex justify-center items-center customized_height_transfer" wire:loading.flex wire:target="transferWallet">
                <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-gray-900"></div>
            </div>

            <div wire:loading.remove wire:target="transferWallet" class="@if (session()->has('TransferMessage')) hidden @endif depositPopupClose">
                <div class="col-span-6 sm:col-span-4">
                    {{ __('By using this form you can transfer Balance between your Wallets') }}
                </div>
                @if($transfer_error_amount)
                <div class="col-span-6 sm:col-span-4" style="color:red">
                    {{ __('Balance lower than transfer amount!') }}
                </div>
                @endif
                @if($transfer_error_wallet)
                <div class="col-span-6 sm:col-span-4" style="color:red">
                    {{ __('Please select a wallet') }}
                </div>
                @endif

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="transfer_amount" value="{{ __('Amount') }}" />
                    <x-jet-input id="transfer_amount" type="number" class="mt-1 block w-full" wire:model.defer="transfer_amount" step='1.00' value='0.00' placeholder='0.00' />
                    <x-jet-input-error for="transfer_amount" class="mt-2" />
                </div>


                <!-- Note -->
                <div class="col-span-6 sm:col-span-4">
                    <label class="block font-medium text-sm text-gray-700" for="withdraw_amount">
                        Wallet
                    </label>
                    <select id="transfer_to_wallet_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model="transfer_to_wallet_id" required>
                        <option value="0">Select a Wallet</option>
                        @foreach($wallets as $wallet)
                        @if(!$wallet->demo and $wallet->id != $this->view_wallet_id)
                        <option value="{{$wallet->id}}">{{$wallet->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            @if (session()->has('TransferMessage') || $successPopup == true)
            <div class="bg-white flex items-center justify-center mx-auto p-5 relative w-96 customized_height_transfer">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg
                            class="h-6 w-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                    </div>
                    <h3 class="text-lg mt leading-6 font-medium text-green-800 mt-8 mb-2 font-mono">{{ session('TransferMessage') ?? 'Transfer Pending.' }}</h3>
                </div>
            </div>
            @endif

        </x-slot>

        <x-slot name="footer">
            <div class="@if (session()->has('TransferMessage')) hidden @endif depositPopupClose">
                <x-jet-secondary-button wire:click="$toggle('transferingWallet')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="transferWallet" wire:loading.attr="disabled">
                    {{ __('Transfer') }}
                </x-jet-button>
            </div>
            @if (session()->has('TransferMessage') || $successPopup == true)
                <div>
                    <x-jet-button class="ml-2" wire:click="successTPopupClose">
                        OK
                    </x-jet-button>
                </div>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Footer -->
    <!-- Dont change class in footer otherwise it will break the view -->
    <!-- Footer -->
    <div class="footer grid grid-cols-6 2xl:grid-cols-7 px-3 py-2 border-t border-gray-600" style="border-left:none; border-right:none; border-bottom:none;">
        <div class="col-start-1 col-end-1 text-white system-status maintenance">
            @if($system_status == 'starting')
            Systems starting
            @elseif($system_status == 'operational')
            Systems operational
            @elseif($system_status == 'maintenance')
            Scheduled maintenance
            @elseif($system_status == 'error')
            Systems error
            @endif

        </div>
        <div class="col-start-2 col-end-7 2xl:col-start-2 2xl:col-end-8">
            <div class="grid grid-cols-4">
                <div class="col-start-1 col-end-7 xl:col-start-1 xl:col-end-4">
                <div class="text-white text-left system-status maintenance footer-stats">
                    Total balance: <b class="mr-2 text-gray-400">&euro; {{$user->getTotalBalance()}}</b>
                    Equity <b class="mr-2 text-gray-400">&euro; {{$user->getTotalEquity()}}</b>
                    Margin <b class="mr-2 text-gray-400">&euro; {{$user->getTotalMargin()}}</b>
                    Level: <b style="color:var(--green);">{{$user->userProfile->level->name}}</b></div>
                </div>
                <div class="col-start-1 col-end-7 xl:col-start-4 xl:col-end-5">

                </div>
            </div>
        </div>

    </div>



<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    // $(".card-js").each(function(i, obj) {
    //     $(obj).CardJs()
    // })
    if (document.body.clientHeight > 900)
    {
        document.body.style.zoom = "100%";
        // var scale = 'scale(1)';
        // document.body.style.webkitTransform =  scale;    // Chrome, Opera, Safari
        //  document.body.style.msTransform =   scale;       // IE 9
        // document.body.style.transform = scale;
    }
</script>
<script>

    document.addEventListener('livewire:load', function () {

            Livewire.on('initCard', function () {

                $('#expiration_date').mask('00-00');

                $(document).on('keyup', '#card_number' ,function(){
                    var cardT = cardTypeFromNumber($(this).val());

                    if(cardT == "AMEX"){
                        if($('#americanexpress_icon').hasClass('hidden')){
                            $('#americanexpress_icon').removeClass('hidden');
                            $('#visa_icon').addClass('hidden');
                            $('#mastercard_icon').addClass('hidden');
                        }

                    }
                    else if(cardT == "Visa"){
                        if($('#visa_icon').hasClass('hidden')){
                            $('#visa_icon').removeClass('hidden');
                            $('#americanexpress_icon').addClass('hidden');
                            $('#mastercard_icon').addClass('hidden');
                        }

                    }
                    else if(cardT == "Mastercard"){
                        if($('#mastercard_icon').hasClass('hidden')){
                            $('#mastercard_icon').removeClass('hidden');
                            $('#americanexpress_icon').addClass('hidden');
                            $('#visa_icon').addClass('hidden');
                        }
                    }
                    else{
                        $('#americanexpress_icon').addClass('hidden');
                        $('#visa_icon').addClass('hidden');
                        $('#mastercard_icon').addClass('hidden');
                    }
                });

                cardTypeFromNumber = function(number) {

                    // AMEX
                    re = new RegExp("^3[47]");
                    if (number.match(re) != null)
                    return "AMEX";

                    // Visa
                    var re = new RegExp("^4");
                    if (number.match(re) != null)
                    return "Visa";

                    // Mastercard
                    re = new RegExp("^5[1-5]");
                    if (number.match(re) != null)
                    return "Mastercard";

                    return "";
                };

            })

            Livewire.on('successPopupClosed', function()
            {
                var list = document.querySelectorAll('.depositPopupClose');

                for (var i = 0; i < list.length; ++i) {
                    list[i].classList.add('hidden');
                }

                Livewire.emit('makesuccessfalse');
            })
        })
</script>

</div>
