@section('title')
Trade -
@endsection
@section('style')
<style>
    @media (min-width: 900px) {

        body {
            overflow: hidden !important;
        }
        .hidden-desktop{
            display:none!important
        }
        .chart_div{
            height: 50% !important;
        }
        .min-h-84{
            min-height: 84vh !important;
        }
        .height-84{
            height: calc(85vh - 10vh) !important;
        }
        .custom-padding{
            padding-bottom:20px !important;
        }
    }
    @media screen and (max-width: 767px) {
            .custom_menu_mobile{
                justify-content: space-between !important;
            }

        }
    @media screen and (max-width: 900px) {
        .chart__view_section{
            padding-bottom: 60px !important;
            flex: 1 1 auto !important;
            min-height: 70vh !important;
        }
        #test {
            height: auto !important;
            overflow-y: auto !important;

        }
        .chart_view_inner{
            flex: 1 1 auto !important;
        }
    }

    .submenu{
        border:1px solid hsla(0, 0%, 100%, 0.2);
    }

    @media screen and (min-width: 1860px) {
        .height-84{
            height: 85vh !important;
        }
        #test{
            height: auto !important;
        }
    }
    @media screen and (min-width: 1360px) {
        .height-84{
            height: calc(85vh - 5vh) !important;
        }
    }
    @media screen and (min-width: 1400px) and (max-width: 1600px) {
        .height-84{
            height: calc(85vh - 8vh) !important;
        }
    }

    @media screen and (min-width: 1550px) and (max-width: 1750px) {
        .submenu{
            top: 126px !important;
        }
    }

    /* #trade_history_column{
        overflow-y: hidden !important;
    }

    #trade_history_column:hover{
        overflow-y: scroll !important;
    } */

    #trade_history_column::-webkit-scrollbar {
        bottom: 0;
        top: 0;
        width: 5px;
        /* background: #ffc62d !important; */
    }

    #trade_history_column::-webkit-scrollbar-track {
        border-radius: 10px;
        /* background: #ffc62d; */
        background: grey;
    }

    #trade_history_column::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #ffc62d;
    }

    #test {
        /* bottom: 0;
            top:0;
            left:0; */
        height: 85vh ;
        overflow-y: auto !important;
        /* padding-bottom:150px !important;  */

    }
    .order_fills_tab{
        overflow-y: hidden !important;
    }

    .order_fills_tab:hover{
        overflow-y: auto !important;
    }

    .order_fills_tab::-webkit-scrollbar {
        bottom: 0;
        top: 0;
        width: 5px;
        /* background: #ffc62d !important; */
    }

    .order_fills_tab::-webkit-scrollbar-track {
        border-radius: 10px;
        /* background: #ffc62d; */
        background: grey;
    }

    .order_fills_tab::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #ffc62d;
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
    .footer-stats::before{
        content: none !important;
    }
</style>
@endsection



<div class="flex flex-col h-full">
    @livewire('navigation-menu')
    <!-- Intro -->
    <div class="xs:flex xs:flex-col xl:flex xl:flex-col">
        <div class="grid xl:grid-cols-6 2xl:xl:grid-cols-6 2xl:grid-cols-7 gap-0 bg-gray-900">
            <div class="col-start-1 col-end-8 xl:col-start-1 xl:col-end-2 border-b border-gray-600 bg-gray-900">
                <div class="py-2 px-8 xl:px-3 xl:py-5 2xl:px-6 2xl:py-5">
                    <livewire:symbol-search :wire:active_code="$active_code" />
                </div>
            </div>
            <div class="col-start-1 col-end-8 xl:col-start-2 xl:col-end-10 xl:border-l bg-gray-900 border-gray-600 text-white text-white xl:px-8 items-center flex justify-center xl:justify-start">
                <div class="grid grid-cols-3 gap-12 text-center xl:text-left py-2 xl:py-3">
                    <dl class="text-semibold">
                        <dt>{{ $userSymbols->symbol->last_value }} {{ $userSymbols->symbol->currency }}</dt>
                        <dd>Last trade price</dd>
                    </dl>
                    <dl class="text-semibold">
                        <dt class="@if($userSymbols->symbol->change_percent >= 0) text-green @else text-red @endif">{{ round($userSymbols->symbol->change_percent, 4) }}%</dt>
                        <dd>24h price</dd>
                    </dl>
                    <dl class="text-semibold">
                        @if($userSymbols->symbol->market_volume != null and $userSymbols->symbol->market_volume != 0)
                        <dt class="@if(((1 - ($userSymbols->symbol->average_10_day_volume / $userSymbols->symbol->market_volume)) * 100) >= 0) text-green @else text-red @endif">{{round((1 - ($userSymbols->symbol->average_10_day_volume / $userSymbols->symbol->market_volume)) * 100, 2)}}%</dt>
                        <dd>24h volume</dd>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="flex flex-auto flex-col overflow-hidden flex-1">
        <div class="overflow-hidden flex flex-auto flex-col flex-1 min-h-full max-h-full">
            <div class="xl:grid xl:grid-cols-6 2xl:grid-cols-7 gap-0 bg-gray-900 trade-container flex flex-auto flex-col overflow-hidden flex-1">

                <div class="js-cols js-balance col-start-1 col-end-1 bg-gray-800 custom-scroll flex flex-col pb-3">
                    <div class="">
                        <livewire:symbol-buy />
                    </div>
                </div>

                <div class="xl:border-l border-gray-600 xl:col-start-2 xl:col-end-7 2xl:col-start-2 2xl:col-end-8 overflow-hidden flex-1 flex-col flex" style="border-bottom:0;">
                    <div class="grid grid-cols-4 overflow-hidden flex flex-auto">

                        <div class="col-start-1 col-end-7 xl:col-start-1 xl:col-end-4 flex flex-col flex-auto overflow-hidden">
                            <em class="js-cols js-price-charts grid grid-cols-1 px-8 py-4 bg-gray-800 text-white">Price Charts</em>

                            <div class="js-cols js-price-charts tradingview-widget-container flex flex-auto flex-col overflow-hidden">
                                <div id="tradingview_70276" class="h-full"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                <script type="text/javascript">
                                    new TradingView.widget({
                                        "autosize": true,
                                        "symbol": "{{ $active_code }}",
                                        "interval": "60",
                                        "timezone": "Etc/UTC",
                                        "theme": "dark",
                                        "style": "1",
                                        "locale": "en",
                                        "toolbar_bg": "#f1f3f6",
                                        "hide_side_toolbar": false,
                                        "enable_publishing": false,
                                        "allow_symbol_change": false,
                                        "save_image": true,
                                        "container_id": "tradingview_70276"
                                    });
                                </script>
                            </div>

                            <footer class="js-cols js-orders flex flex-1 flex-col overflow-hidden" style="border-bottom:none;">
                                <livewire:order-view />
                            </footer>
                        </div>

                        <?php
                        // Orders
                        ?>

                        <div class="js-cols js-history xl:border-l border-gray-600 col-start-1 col-end-7 xl:col-start-4 xl:col-end-5 overflow-hidden flex flex-col" style="border-bottom:none;">
                            <livewire:trade-history />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Submenu -->
    <div class="flex flex-row xl:hidden footer--submenu">
        <a href="#" data-target=".js-balance" class="js-toggle-divs flex flex-row flex-auto text-center text-white">Trade</a>
        <a href="#" data-target=".js-orders" class="js-toggle-divs flex flex-row flex-auto text-center text-white">Orders</a>
        <a href="#" data-target=".js-price-charts" class="active js-toggle-divs flex flex-row flex-auto text-center text-white">Charts</a>
        <a href="#" data-target=".js-history" class="js-toggle-divs flex flex-row flex-auto text-center text-white">History</a>
    </div>

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
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/viewport-units-buggyfill/0.6.2/viewport-units-buggyfill.js"></script> -->

<script type="text/javascript">
    $('.js-toggle-divs').on('click', function(){
        var e = $(this).attr('data-target');
        $('.js-cols').hide();
        $(e).show();

        $('.js-toggle-divs').removeClass('active');
        $(this).addClass('active');
    });

    function mobile() {
        if ($(window).width() <= '1279') {
            $('.js-cols').hide();
            $('.js-price-charts').show();
            $('.js-toggle-divs').find('[data-target=".js-price-charts"]').addClass('active');

        }
        if ($(window).width() >= '1280') {
            $('.js-cols').show();
        }
    }
    mobile();
    $(window).resize(mobile);


</script>

<script>
    if (document.body.clientHeight > 900) {
        document.body.style.zoom = "100%";
        // var scale = 'scale(1)';
        // document.body.style.webkitTransform =  scale;    // Chrome, Opera, Safari
        //  document.body.style.msTransform =   scale;       // IE 9
        // document.body.style.transform = scale;
    };
</script>
