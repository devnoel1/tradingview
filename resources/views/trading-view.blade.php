<div>
    <!-- Intro -->
    <div class="xs:flex xs:flex-auto xs:flex-col xl:flex xl:flex-auto xl:flex-col">
        <div class="grid xl:grid-cols-6 2xl:xl:grid-cols-6 2xl:grid-cols-7 gap-0 bg-gray-900">
            <div class="col-start-1 col-end-8 xl:col-start-1 xl:col-end-2 border-b border-gray-600 bg-gray-900">
                <div class="py-2 px-8 xl:px-3 xl:py-5 2xl:px-6 2xl:py-5">
                    <livewire:symbol-search :wire:active_code="$active_code"/>
                </div>
            </div>
            <div
                class="col-start-1 col-end-8 xl:col-start-2 xl:col-end-10 xl:border-l bg-gray-900 border-gray-600 text-white text-white xl:px-8 items-center flex justify-center xl:justify-start">
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
        <div class=" flex flex-col flex-1">
            <div
                class="xl:grid xl:grid-cols-6 2xl:grid-cols-7 gap-0 bg-gray-900 trade-container flex flex-auto flex-col overflow-hidden flex-1" style="max-height: calc(100vh - 10px)!important;">

                <div class="js-cols js-balance col-start-1 col-end-1 bg-gray-800 custom-scroll flex flex-col pb-3">
                    <div class="">
                        <livewire:symbol-buy/>
                    </div>
                </div>

                <div
                    class="xl:border-l border-gray-600 xl:col-start-2 xl:col-end-7 2xl:col-start-2 2xl:col-end-8 overflow-hidden flex-1 flex-col flex">
                    <div class="grid grid-cols-4 overflow-hidden flex">
                        <div
                            class="col-start-1 col-end-5 xl:col-start-1 xl:col-end-4 flex flex-col min-h-screen overflow-hidden">
                            <em class="js-cols js-price-charts grid grid-cols-1 px-8 py-4 bg-gray-800 text-white">Price
                                Charts</em>

                            <div class="js-cols js-price-charts tradingview-widget-container flex flex-auto flex-col overflow-hidden" style="height: 200px"
                            >
                                <div id="tradingview_70276" class="h-full"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                <script type="text/javascript">
                                    new TradingView.widget(
                                        {
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
                                        }
                                    );
                                </script>
                            </div>

                            <footer class="js-cols js-orders flex flex-1 flex-col overflow-hidden"
                                    style="border-bottom:none;">
                                <livewire:order-view/>
                            </footer>
                        </div>

                        <?php
                        // Orders
                        ?>

                        <div
                            class="js-cols js-history xl:border-l border-gray-600 col-start-1 col-end-7 xl:col-start-4 xl:col-end-5 overflow-hidden flex flex-col"
                            style="border-bottom:none;">
                            <livewire:trade-history/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Submenu -->
    <div class="flex flex-row  footer--submenu">
        <a href="#" data-target=".js-balance" class="js-toggle-divs flex flex-row flex-auto text-center text-white">Trade</a>
        <a href="#" data-target=".js-orders" class="js-toggle-divs flex flex-row flex-auto text-center text-white">Orders</a>
        <a href="#" data-target=".js-price-charts"
           class="active js-toggle-divs flex flex-row flex-auto text-center text-white">Charts</a>
        <a href="#" data-target=".js-history" class="js-toggle-divs flex flex-row flex-auto text-center text-white">History</a>
    </div>

    <!-- Footer -->
    <div class="footer bg-gray-900 px-3 py-2 border-t border-gray-600 fixed bottom-0 left-0 right-0 z-999"
         style="border-left:none; border-right:none; border-bottom:none;">
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
    </div>
</div>
<script>
    if (document.body.clientHeight < 1000) {
        document.body.style.zoom = "80%";
        // var scale = 'scale(1)';
        // document.body.style.webkitTransform =  scale;    // Chrome, Opera, Safari
        //  document.body.style.msTransform =   scale;       // IE 9
        // document.body.style.transform = scale;
    };
</script>
