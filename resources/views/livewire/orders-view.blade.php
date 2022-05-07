@section('title')
Orders -
@endsection
@section('style')
<style>
    @media (min-width: 900px) {
        body {
            overflow: hidden !important;
        }
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


    #test {
        /* bottom: 0;
            top:0;
            left:0; */
        height: 82vh ;
        overflow-y: auto ;
        /* padding-bottom:150px !important;  */

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
    #newtest {
        /* bottom: 0;
            top:0;
            left:0; */
        height: calc(85vh - 56vh) !important;
        overflow-y: auto !important;
        /* margin-bottom:200px !important;  */

    }
    #newtest::-webkit-scrollbar {
            width: 5px;
        /* background: #ffc62d !important; */
    }

    #newtest::-webkit-scrollbar-track {
        border-radius: 10px;
    background: grey;
    }

    #newtest::-webkit-scrollbar-thumb {
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
    .amount_flex{
        display: flex !important;
        align-items: center;
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
            overflow-y: auto !important;
        }
        #mytest{
            overflow-y: auto !important;
        }
        .wallet--intro{
            /* width: 500px !important; */
        }
        .amount_flex{
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
        }
    }
    @media screen and (max-width: 1279px) {
        #mytest{
            margin-bottom:30px !important;
        }
        #newtest{
            margin-bottom:30px !important;
        }
        .wallet_content{
            height: auto !important;
        }
    }
    @media screen and (min-width: 769px) and (max-width: 1279px) {
        .wallet_sidebar{
            height: 25vh !important;
        }
    }
    @media screen and (max-width: 768px){
        .wallet_sidebar{
            height: 35vh !important;
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
</style>
@endsection
<div class="flex flex-col h-full">
@livewire('navigation-menu')
    <!-- <main class="flex absolute w-full" >
        <div class="min-h-full bg-gray-900 flex flex-col w-full"> -->

            <div class="flex flex-auto flex-col overflow-hidden flex-1">
                <div class="overflow-hidden flex flex-auto flex-col flex-1 min-h-full max-h-full">
                    <div class="grid xl:grid-cols-6 2xl:grid-cols-7 gap-0 bg-gray-900 flex flex-col flex-1 b-t">


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
                            <div class="flex flex-auto flex-col  flex-1">
                                @foreach($wallets as $wallet)
                                @if($wallet->id == $view_wallet_id)
                                <div class="grid grid-cols-4 gap-0 bg-gray-900 flex flex-col flex-inital b-t  items-center px-4 xl:px-0 py-2 xl:py-0">
                                    <div class="col-start-1 col-end-5 xl:col-end-5 2xl:col-end-5">
                                        <div class="bg-grey-800 text-white flex flex-col flex-initial wallet--intro">
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
                                            <div class="grid grid-cols-4 md:grid-cols-6 gap-0 xl:flex-row xl:flex justify-between">
                                                <h2 wire:click="setActive('{{$wallet->id}}')" class="flex-auto">{{$wallet->name}}</h2>
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
                                                <div class="amount_flex col-end-7 col-start-3 md:col-start-2 justify-between">
                                                    <div class="text-center hidden md:inline flex-auto">
                                                        <span class="block text-gray-600 text-xs">Holds on orders</span>
                                                        <span>&euro; @foreach($wallets_array as $wallet_object)@if($wallet_object['id'] == $wallet->id) {{round(($wallet_object['total_value'] - $wallet->balance), 2)}} @endif @endforeach</span>
                                                    </div>
                                                    <div class="text-center hidden md:inline flex-auto">
                                                        <span class="block text-gray-600 text-xs">Available balance</span>
                                                        <span>&euro; {{round($wallet->balance, 2)}}</span>
                                                    </div>

                                                    <div class="text-center flex-auto">
                                                        <span class="block text-gray-600 text-xs">Total profits</span>
                                                        <span>&euro; {{round($total_profits, 2)}}</span>
                                                    </div>
                                                    <div class="text-center flex-auto">
                                                        <span class="block text-gray-600 text-xs">Total fee</span>
                                                        <span>&euro; {{round($total_fees, 2)}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab--system  flex flex-row mt-4">
                                  <a wire:click="setViewTab('balances')" class="@if($view_tab == 'balances')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                      <div class="flex flex-row items-center">
                                          <svg width="24" height="24" viewBox="0 0 24 24">
                                              <g stroke="#8a939f" fill="none" fill-rule="evenodd" stroke-linecap="round">
                                                  <path d="M6.667 14h10.666M6.667 10h10.666"></path>
                                              </g>
                                          </svg>
                                          <span class="text-white">Balances</span>
                                      </div>
                                  </a>
                                    <a wire:click="setViewTab('open')" class="@if($view_tab == 'open')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                        <div class="flex flex-row items-center">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-gZMcBi cRiKgN">
                                                <g transform="translate(5 5)" stroke="#8a939f" fill="none" fill-rule="evenodd">
                                                    <circle cx="7.5" cy="7.5" r="7.5"></circle>
                                                    <path d="M7.5 3.41V7.5l2.045 2.045"></path>
                                                </g>
                                            </svg>
                                            <span class="text-white">Open</span>
                                        </div>
                                    </a>
                                    <a wire:click="setViewTab('filled')" class="@if($view_tab == 'filled')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                        <div class="flex flex-row items-center">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-gqjmRU kKmEpw">
                                                <g transform="translate(5 5)" stroke="#8a939f" fill="none" fill-rule="evenodd">
                                                    <circle cx="7.5" cy="7.5" r="7.5"></circle>
                                                    <path d="M10.714 5.357L6.667 9.643 4.286 7.12"></path>
                                                </g>
                                            </svg>
                                            <span class="text-white">Filled</span>
                                        </div>
                                    </a>
                                    <a wire:click="setViewTab('fees')" class="@if($view_tab == 'fees')active @endif flex flex-col wallet-tab" style="width: 150px;">
                                        <div class="flex flex-row items-center">
                                            <div class="flex flex-row items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-VigVT dDjLRL">
                                                    <g fill="#8a939f" fill-rule="nonzero" stroke="#8a939f" stroke-width="0.5">
                                                        <path d="M14.902 12.902h-3.804V9.098A.098.098 0 0 0 11 9c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4a.098.098 0 0 0-.098-.098zM11 16.805A3.81 3.81 0 0 1 7.195 13a3.81 3.81 0 0 1 3.707-3.804V13c0 .054.044.098.098.098h3.804A3.81 3.81 0 0 1 11 16.805z"></path>
                                                        <path d="M13.095 7a.095.095 0 0 0-.095.095v3.81c0 .052.043.095.095.095h3.81a.095.095 0 0 0 .095-.095A3.91 3.91 0 0 0 13.095 7zm.095 3.81V7.192a3.72 3.72 0 0 1 3.618 3.618H13.19z"></path>
                                                    </g>
                                                </svg>
                                                <span class="text-white">Fees</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if($view_tab == 'balances')
                                <div class="text-white flex flex-col flex-1  mt-5 xl:mt-0">
                                    <div class="px-2 md:px-4 py-2 grid grid-cols-5 gap-2 bg-gray-800 text-gray-400 trade-history-header uppercase">
                                        <div>Date</div>
                                        <div>Asset</div>
                                        <div>Quantity</div>
                                        <div>Amount</div>
                                        <div>Status</div>
                                    </div>

                                    @if(!empty($wallets_array))
                                    <div class="flex-auto" id="mytest">
                                        <div class="wrapper flex flex-1 flex-col">
                                            @foreach($wallets_array as $wallet_object)
                                            @if($wallet_object['id'] == $wallet->id)
                                            @foreach($wallet_object['symbols'] as $symbol)
                                            <div class="px-4 md:px-4 py-3 grid grid-cols-5 gap-2 bg-gray-800 mt-0 text-white tab--system-row items-center" style="border-top: 1px solid #070f15;">
                                                <div class="text-white text-xs">{{\Carbon\Carbon::now()->format('d/m/Y')}}</div>
                                                <div class="flex flex-row items-center">
                                                    {{-- <svg viewBox="0 0 24 24" height="24" fill="#fff"><path d="M13 20c-3.21 0-5-1.89-5.52-5.54H5.83v-1.61h1.48v-.83-.85H5.79V9.56h1.69C8.06 5.88 10.06 4 13.06 4a4.86 4.86 0 0 1 5.15 4.9H15c-.1-1.3-.67-2.29-1.89-2.29s-2 .79-2.28 3h3.52v1.61h-3.64V12.9h3.69v1.61h-3.57c.32 2.1 1.07 2.94 2.25 2.94s1.84-.88 2-2.21h3.11A4.78 4.78 0 0 1 13 20z"></path></svg>--}}
                                                    <span class="text-white text-xs">{{$symbol['description']}}</span>
                                                </div>
                                                <div class="text-white text-xs">{{round($symbol['amount'], 2)}}</div>
                                                <div class="text-green text-xs">&euro; {{round($symbol['price'], 2)}} </div>
                                                <div class="text-xs">
                                                    <span class="bg-green text-white px-3 py-1 rounded-sm">Approved</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <div class="custom-scroll flex-auto" style="background: #111d27; height:calc(85vh - 46vh) !important;">
                                        <div class="wrapper flex flex-1 flex-col">
                                            <div class="px-2 md:px-4 py-3 grid gap-2 text-center tab--system-row items-center">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif

                                @if($view_tab == 'open')
                                <div class="text-white flex flex-col flex-1  mt-5 xl:mt-0">
                                    <div class="px-4 md:px-4 py-2 grid grid-cols-8 gap-2 bg-gray-800 text-white trade-history-header text-gray-700 uppercase semibold">
                                        <div>Side</div>
                                        <div>Market</div>
                                        <div>Size</div>
                                        <div>Filled</div>
                                        <div>Price</div>
                                        <div>Fee</div>
                                        <div>Time</div>
                                        <div>Status</div>
                                    </div>


                                @if(!empty($wallet->orders) && $countOpens > 0)
                                    <div class="flex-auto" id="mytest">
                                        <div class="wrapper flex flex-1 flex-col">
                                            @foreach($wallet->orders as $order)
                                            @if($order->status == 'open' || $order->status == 'pending' || $order->status = 'waiting')
                                            <div class="px-4 md:px-4 py-3 grid grid-cols-8 gap-2 bg-gray-800 mt-0 text-white tab--system-row items-center" style="border-top: 1px solid #070f15;">
                                                <div class="text-green text-xs">@if($order->type =='buy') Call @else Put @endif</div>
                                                <div class="flex flex-row items-center">
                                                    <span class="text-white text-xs">{{$order->symbol->description}}</span>
                                                </div>
                                                <div class="text-red text-xs">{{round($order->amount, 2)}}</div>
                                                <div class="text-red text-xs">&euro; {{round($order->symbol_price, 2)}}</div>
                                                <div class="text-red text-xs">&euro; {{round($order->order_total, 2)}}</div>
                                                <div class="text-red text-xs">&euro; {{round($order->fee, 2)}}</div>
                                                <div class="text-red text-xs">{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y h:i')}}</div>
                                                <div class="text-green text-xs">{{$order->status}}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="custom-scroll flex-auto" style="background: #111d27; height:calc(85vh - 46vh) !important;">
                                        <div class="wrapper flex flex-1 flex-col">
                                            <div class="px-2 md:px-4 py-3 grid gap-2 text-center tab--system-row items-center">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                </div>
                                @endif
                                @if($view_tab == 'filled')
                                <div class="text-white flex flex-col flex-1 mt-5 xl:mt-0">
                                    <div class="px-4 md:px-4 py-2 grid grid-cols-8 gap-2 bg-gray-800 text-white trade-history-header text-gray-700 uppercase semibold">
                                        <div>Side</div>
                                        <div>Market</div>
                                        <div>Size</div>
                                        <div>Filled</div>
                                        <div>Price</div>
                                        <div>Fee</div>
                                        <div>Time</div>
                                        <div>Status</div>
                                    </div>

                                    @if(!empty($wallet->orders) && $countFills > 0)
                                    <div class=" flex-auto" id="mytest">
                                        <div class="wrapper flex flex-1 flex-col">
                                            @foreach($wallet->orders as $order)
                                            @if($order->status == 'close' || $order->status == 'cancelled')
                                            <div class="px-4 md:px-4 py-3 grid grid-cols-8 gap-2 bg-gray-800 mt-0 text-white tab--system-row items-center" style="border-top: 1px solid #070f15;">
                                                <div class="text-green text-xs">@if($order->type =='buy') Call @else Put @endif</div>
                                                <div class="flex flex-row items-center">
                                                    <span class="text-white text-xs">{{$order->symbol->description}}</span>
                                                </div>
                                                <div class="text-red text-xs">{{round($order->amount, 2)}}</div>
                                                <div class="text-red text-xs">&euro; {{round($order->symbol_price, 2)}}</div>
                                                <div class="text-red text-xs">&euro; {{round($order->order_total, 2)}}</div>
                                                <div class="text-red text-xs">&euro; {{round($order->fee, 2)}}</div>
                                                <div class="text-red text-xs">{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y h:i')}}</div>
                                                <div class="text-green text-xs">{{$order->status}}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <div class="flex-auto" style="background: #111d27;height: calc(85vh - 46vh) !important;">
                                        <div class="wrapper flex flex-1 flex-col">
                                            <div class="px-2 md:px-8 py-3 grid gap-2 text-center tab--system-row items-center">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif

                                @if($view_tab == 'fees')
                                <div class="text-white flex flex-col flex-1 mt-4 md:mt-0">
                                    <div class="px-4 md:px-8 py-2 flex flex-row bg-gray-800 text-white text-xs text-gray-700">
                                        <div class="text-xl text-white pt-4 border-b border-gray-600 w-full pb-4 mb-4">
                                            Fees
                                        </div>
                                    </div>
                                    <div class="flex-auto" id="newtest" style="background-color: #111d27;">
                                        <div class="px-4 md:px-8 py-2 pb-5 flex h-full flex-col 2xl:flex-row bg-gray-800 text-white text-xs flex-1 text-gray-700">
                                            <div class="flex flex-1 flex-col" >
                                                <p class="text-white text-sm">See all our prices</p>
                                                <p class="text-white opacity-50 text-sm pt-2 pb-3"> We offer five levels of pricing depending on your account tier.</p>

                                                <div class="md:px-0 py-2 grid grid-cols-6 gap-2 text-white opacity-80 tab--system-row items-center text-sm md:mr-8" style="background:#263543;">
                                                    <div></div>
                                                    <div>BROKERAGE</div>
                                                    <div>CLASSIC</div>
                                                    <div>GOLD</div>
                                                    <div>PLATINUM</div>
                                                    <div>VIP</div>
                                                </div>
                                                <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600 md:mr-8">
                                                    <div>STOCKS</div>
                                                    <div>0.0016%</div>
                                                    <div>0.0008%</div>
                                                    <div>0.0006%</div>
                                                    <div>0.0004%</div>
                                                    <div>0.0002%</div>
                                                </div>

                                                <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600 md:mr-8">
                                                    <div>FOREX</div>
                                                    <div>0.0016%</div>
                                                    <div>0.0008%</div>
                                                    <div>0.0006%</div>
                                                    <div>0.0004%</div>
                                                    <div>0.0002%</div>
                                                </div>

                                                <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600 md:mr-8">
                                                    <div>INDICES</div>
                                                    <div>0.0016%</div>
                                                    <div>0.0008%</div>
                                                    <div>0.0006%</div>
                                                    <div>0.0004%</div>
                                                    <div>0.0002%</div>
                                                </div>

                                                <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600 md:mr-8">
                                                    <div>COMMODITIES</div>
                                                    <div>0.0016%</div>
                                                    <div>0.0008%</div>
                                                    <div>0.0006%</div>
                                                    <div>0.0004%</div>
                                                    <div>0.0002%</div>
                                                </div>

                                                <div class="md:px-0 py-1 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center md:mr-8 b-b border-gray-600">
                                                    <div>CRYPTO</div>
                                                    <div>0.0016%</div>
                                                    <div>0.0008%</div>
                                                    <div>0.0006%</div>
                                                    <div>0.0004%</div>
                                                    <div>0.0002%</div>
                                                </div>

                                            </div>
                                            <div class="2xl:px-8 py-2 flex flex-row bg-gray-800 text-white text-xs pt-10 2xl:pt-0 flex-1 text-gray-700 2xl:border-l border-gray-600" style="border-bottom:none;">
                                                <div class="flex flex-1 flex-col">
                                                    <p class="text-white text-sm">General Charges</p>

                                                    <p class="text-white opacity-50 text-sm pt-2 pb-3"> We’re fully transparent about our charges, so you’ll always know how much it costs to trade and invest with us.</p>

                                                    <div class="md:px-0 py-2 grid grid-cols-6 gap-2 text-white opacity-80 tab--system-row items-center text-sm" style="background:#263543;">
                                                        <div></div>
                                                        <div>BROKERAGE</div>
                                                        <div>CLASSIC</div>
                                                        <div>GOLD</div>
                                                        <div>PLATINUM</div>
                                                        <div>VIP</div>
                                                    </div>
                                                    <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600">
                                                        <div>Custody fees</div>
                                                        <div class="opacity-60">€5</div>
                                                        <div class="opacity-60">€5</div>
                                                        <div class="opacity-60">€5</div>
                                                        <div class="opacity-60">€5</div>
                                                        <div class="opacity-60">€5</div>
                                                    </div>
                                                    <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600">
                                                        <div>Withdrawal fees</div>
                                                        <div class="opacity-60">
                                                            €75 if &lt; €1,000
                                                            <br>
                                                            €150 if > €1000
                                                        </div>
                                                        <div class="opacity-60">
                                                            €75 if &lt; €1,000
                                                            <br>
                                                            €150 if &gt; €1000
                                                        </div>
                                                        <div class="opacity-60">
                                                            contact representative for special offerings
                                                        </div>
                                                        <div class="opacity-60">
                                                            contact representative for special offerings
                                                        </div>
                                                        <div class="opacity-60">
                                                            contact representative for special offerings
                                                        </div>
                                                    </div>
                                                    <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600">
                                                        <div>Commissions</div>
                                                        <div class="opacity-60">
                                                            6% per year
                                                            (fee will be settled in first week of December)
                                                        </div>
                                                        <div class="opacity-60">
                                                            6% per year
                                                            (fee will be settled in first week of December)
                                                        </div>
                                                        <div class="opacity-60">
                                                            6% per year
                                                            (fee will be settled in first week of December)
                                                        </div>
                                                        <div class="opacity-60">
                                                            contact representative for special offerings
                                                        </div>
                                                        <div class="opacity-60">
                                                            contact representative for special offerings
                                                        </div>
                                                    </div>
                                                    <div class="md:px-0 py-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600">
                                                        <div>Rollover fees</div>
                                                        <div class="opacity-60">
                                                            0.1% once a month
                                                        </div>
                                                        <div class="opacity-60">
                                                            0.1% once a month
                                                        </div>
                                                        <div class="opacity-60">
                                                            0.1% once a month
                                                        </div>
                                                        <div class="opacity-60">
                                                            0.1% once a month
                                                        </div>
                                                        <div class="opacity-60">
                                                            contact representative for special offerings
                                                        </div>
                                                    </div>
                                                    <div class="md:px-0 py-2 pb-2 grid grid-cols-6 gap-2 bg-gray-800 text-white tab--system-row items-center b-b border-gray-600">
                                                        <div>Inactive account</div>
                                                        <div class="opacity-60">
                                                            €89 after 90 days
                                                        </div>
                                                        <div class="opacity-60">
                                                            €89 after 90 days
                                                        </div>
                                                        <div class="opacity-60">
                                                            €89 after 90 days
                                                        </div>
                                                        <div class="opacity-60">
                                                            €89 after 90 days
                                                        </div>
                                                        <div class="opacity-60">
                                                            €89 after 90 days
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{--<div class="px-2 md:px-8 py-3 grid gap-2 text-center tab--system-row w-full" style="height:280px !important;">
                                                <div class="font-bold" style="color:rgb(55, 65, 81);font-size: 20px;">No orders to show</div>
                                            </div>--}}
                                        </div>
                                    </div>
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
                <a href="/wallet" class="xl:flex flex-row flex-auto text-center text-white">Wallet</a>
                <a href="/orders" class="active xl:flex flex-row flex-auto text-center text-white">Orders</a>
            </div>--}}


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
</div>
<script>
    if (document.body.clientHeight > 900) {
        document.body.style.zoom = "100%";
        // var scale = 'scale(1)';
        // document.body.style.webkitTransform =  scale;    // Chrome, Opera, Safari
        //  document.body.style.msTransform =   scale;       // IE 9
        // document.body.style.transform = scale;
    };
</script>
