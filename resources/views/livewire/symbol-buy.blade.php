<div>
    <style>
        .placeorderbtnpad{
            padding-right: 10px;
        }
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
    <div class="px-3 py-4 2xl:px-6 2xl:py-4 border-b border-gray-600 bg-gray-800 box">
        <em class="text-white block">Wallet Balance</em>
    </div>
    <div class="border-b border-gray-600 wallet-balance-info box-content">
        <div
            class="grid grid-cols-2 gap-0 text-gray-300 border-b border-gray-600 wallet-balance-info-header px-3 py-3 2xl:px-6 2xl:py-2">
            <div class="col-start-1 col-end-1 text-xs">Asset</div>
            <div class="col-start-2 col-end-2 text-right text-xs">Amount</div>
        </div>

        <div class="px-3 pt-3 pb-3 2xl:px-6 2xl:pt-3 2xl:pb-3">
            <div class="grid grid-cols-2 gap-0 text-white wallet-balance-info-value">
                <div class="col-start-1 col-end-1 text-xs pt-1 pb-1">{{$active_wallet->currency}}</div>
                <div
                    class="col-start-2 col-end-2 walllet-balance-value-value text-right text-xs pt-1 pb-1 font-extrabold">{{round($active_wallet->balance, 2)}}</div>
            </div>
            <div class="grid grid-cols-2 gap-0 text-white wallet-balance-info-value">
                <div class="col-start-1 col-end-1 text-xs pt-1 pb-1">{{$active_symbol}}</div>
                <div
                    class="col-start-2 col-end-2 walllet-balance-value-value text-right text-xs pt-1 pb-1 font-extrabold">{{round($symbol_in_wallet, 4)}}</div>
            </div>
            @if($market_open != true)
                <div class="grid grid-cols-1 gap-0 text-white wallet-balance-info-value">
                    <div class="col-start-1 col-end-1 text-xs pt-1 pb-1"><b>Market closed</b></div>
                </div>
            @endif
        </div>
    </div>
    <div class="border-b border-gray-600 wallet-balance bg-gray-800 px-3 py-4 2xl:px-6 2xl:py-4">
        <em class="text-white block">Order Form</em>
    </div>
    <div class="col-span-2 text-white symbolbuy px-3 pt-4 2xl:px-6 2xl:pt-4">
        <div class="grid grid-cols-2 gap-0 symbolbuy-first-tab">
            <div
                class="col-start-1 col-end-1 symbolbuy-tab call--button text-center @if($selectedType == 'buy') bg-green @endif "
                wire:click="setType('buy')">Call
            </div>
            <div
                class="col-start-2 col-end-2 symbolbuy-tab put--button text-center @if($selectedType == 'sell') bg-red @endif "
                wire:click="setType('sell')">Put
            </div>
        </div>
        <div class="grid grid-cols-3 gap-0 symbolbuy-second-tab border-b border-gray-600 pt-6 text-center">
            <div class="col-start-1 col-end-1 symbolbuy-tab @if($selectedOrderType == 'market')active @endif"
                 wire:click="setOrderType('market')">Market
            </div>
            <div class="col-start-2 col-end-2 symbolbuy-tab @if($selectedOrderType == 'limit')active @endif"
                 wire:click="setOrderType('limit')">Limit
            </div>
            <div class="col-start-3 col-end-3 symbolbuy-tab @if($selectedOrderType == 'stop')active @endif"
                 wire:click="setOrderType('stop')">Stop
            </div>
        </div>

        @if($selectedOrderType == 'market')
            <div class="grid grid-cols-1 gap-0 order-formfield pt-4">
                <div class="col-start-1 col-end-1">
                    @if($selectedType=='buy')
                        <label class="block font-medium text-sm text-gray-400">Amount</label>
                        <div class="pt-2">
                            <div class="amount--container flex items-center gap-0 bg-dark">
                                <span wire:click="setBuyMax()" class="max-button">max</span>
                                <input type="number" placeholder="0" step="0.01" min="0" class="form-input custom-input"
                                       wire:model="price" wire:keydown="updatePrices" wire:click="updatePrices"
                                       wire:keyup="updatePrices">
                                <div class="label">
                                    <sub>{{$active_wallet->currency}}</sub>
                                </div>
                            </div>
                        </div>
                    @elseif($selectedType='sell')
                        <label class="block font-medium text-sm text-gray-400">Amount</label>
                        <div class="pt-2">
                            <div class="amount--container flex items-center gap-0 bg-dark">
                                <span wire:click="setSellMax()" class="max-button">max</span>
                                <input type="number" placeholder="0" step="0.01" min="0" class="form-input custom-input"
                                       wire:model="amount" wire:keydown="updatePrices" wire:click="updatePrices"
                                       wire:keyup="updatePrices">
                                <div class="label">
                                    <sub>{{$active_symbol}}</sub>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        @if($selectedOrderType == 'stop')
            <div class="grid grid-cols-1 gap-0 order-formfield pt-4">
                <div class="col-start-1 col-end-1">
                    <label class="block font-medium text-sm text-gray-400">Stop Price</label>
                    <div class="pt-2">
                        <div class="amount--container flex items-center gap-0 bg-dark">
                            <input type="number" placeholder="0" step="0.01" min="0" class="form-input custom-input"
                                   wire:model="stop" wire:keydown="updatePrices" wire:click="updatePrices">
                            <div class="label">
                                <sub>{{$active_wallet->currency}}</sub>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($selectedOrderType == 'limit' || $selectedOrderType == 'stop')
            <div class="grid grid-cols-1 gap-0 order-formfield pt-4">
                <div class="col-start-1 col-end-1">
                    <label class="block font-medium text-sm text-gray-400">Amount</label>
                    <div class="pt-2">
                        <div class="amount--container flex items-center gap-0 bg-dark">
                            @if($selectedType=='buy')
                                <span wire:click="setBuyMax()" class="max-button">max</span>
                            @elseif($selectedType=='sell')
                                <span wire:click="setSellMax()" class="max-button">max</span>
                            @endif
                            <input type="number" placeholder="0" step="0.01" min="0" class="form-input custom-input"
                                   wire:model="amount" wire:keydown="updatePrices" wire:click="updatePrices">
                            <div class="label">
                                <sub>{{$active_symbol}}</sub>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-0 order-formfield pt-4">
                <div class="col-start-1 col-end-1">
                    <label class="block font-medium text-sm text-gray-400">Limit</label>
                    <div class="pt-2">
                        <div class="amount--container flex items-center gap-0 bg-dark">
                            <input type="number" placeholder="0" step="0.01" min="0" class="form-input custom-input"
                                   wire:model="limit" wire:keydown="updatePrices" wire:click="updatePrices">
                            <div class="label">
                                <sub>{{$active_wallet->currency}}</sub>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-0 border-t border-gray-600 leverage-field order-formfield pt-3">
            <div class="col-start-1 col-end-1">
                <label class="block font-medium text-sm text-gray-400">Leverage</label>
                <!-- <input type="range" min="0" max="100" wire:model="leverage" class="slider rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" id="myRange"> -->

                <div class="pt-2">
                    <div class="amount--container flex items-center gap-0 bg-dark">
                        <span wire:click="setBuyMax()" class="max-button">max</span>
                        <input type="number" placeholder="0" step="1" min="0" class="form-input custom-input"
                               wire:model="leverage">
                        <div class="label">
                            <sub class="text-lg">%</sub>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex border-t-2 order-total-top order-formfield order-total-field pt-4 mt-4">
            <div class="w-1/2 text-xs">Fee ≈</div>
            <div class="w-1/2 text-right text-xs font-extrabold">{{round($order_fee, 2)}} {{$active_wallet->currency}}</div>
        </div>
        <div class="flex order-formfield order-total-field py-2">
            <div class="w-1/2 text-xs">Amount ≈</div>
            <div class="w-1/2 text-right text-xs font-extrabold">{{round($amount, 4)}} {{$active_symbol}}</div>
        </div>
        <div class="flex order-formfield order-total-field">
            <div class="w-1/2 text-xs">Total ≈</div>
            <div class="w-1/2 text-right text-xs font-extrabold">{{round($order_price, 2)}} {{$active_wallet->currency}}</div>
        </div>
        @if($active_wallet->margin && $selectedType == 'buy')
            <div class="flex order-formfield order-total-field">
                <div class="w-1/2 text-xs">Initial margin ≈</div>
                <div
                    class="w-1/2 text-right text-xs font-extrabold">{{round($initial_margin,2 )}} {{$active_wallet->currency}}</div>
            </div>
        @endif
        <div class="grid grid-cols-1 gap-0 order-button mt-5 mb-10" style="padding-bottom:20px !important">
            @if($order_button_enabled)
                <div
                    class="col-start-1 col-end-1 @if($selectedType == 'buy') bg-green @endif @if($selectedType == 'sell') bg-red @endif place--button text-center"
                    wire:click="placeOrder()" >

                    @if($selectedType == 'buy')
                    <div class="flex justify-center items-center relative">
                        Place call order
                            <div
                                class="
                                absolute
                                animate-spin
                                rounded-full h-5 w-5 ml-4
                                border-t-2 border-b-2 border-purple-500
                                "
                                style="right: -20px;"
                                id="orderPlaceWaiting"
                                wire:loading.block="placeOrder"
                                wire:target="placeOrder"
                            ></div>
                            <svg class="absolute w-5 h-5 ml-4 text-white fill-current hidden" style="right: -20px;" id="orderPlacedSuccess" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
                            </svg>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-5 h-5 ml-4 text-red fill-current @if($error) @else hidden @endif" style="right: -20px;" id="orderPlacedError" viewBox="0 0 40 40">
                                <path d="M 16 3 C 8.832031 3 3 8.832031 3 16 C 3 23.167969 8.832031 29 16 29 C 23.167969 29 29 23.167969 29 16 C 29 8.832031 23.167969 3 16 3 Z M 16 5 C 22.085938 5 27 9.914063 27 16 C 27 22.085938 22.085938 27 16 27 C 9.914063 27 5 22.085938 5 16 C 5 9.914063 9.914063 5 16 5 Z M 12.21875 10.78125 L 10.78125 12.21875 L 14.5625 16 L 10.78125 19.78125 L 12.21875 21.21875 L 16 17.4375 L 19.78125 21.21875 L 21.21875 19.78125 L 17.4375 16 L 21.21875 12.21875 L 19.78125 10.78125 L 16 14.5625 Z"/>
                            </svg> -->
                            @if($error)
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-6 h-6 ml-4 text-white fill-current @if($error) @else hidden @endif" style="right: -20px;top:2px;" id="orderPlacedError" viewBox="0 0 40 40">
                                <path d="M 16 3 C 8.832031 3 3 8.832031 3 16 C 3 23.167969 8.832031 29 16 29 C 23.167969 29 29 23.167969 29 16 C 29 8.832031 23.167969 3 16 3 Z M 16 5 C 22.085938 5 27 9.914063 27 16 C 27 22.085938 22.085938 27 16 27 C 9.914063 27 5 22.085938 5 16 C 5 9.914063 9.914063 5 16 5 Z M 12.21875 10.78125 L 10.78125 12.21875 L 14.5625 16 L 10.78125 19.78125 L 12.21875 21.21875 L 16 17.4375 L 19.78125 21.21875 L 21.21875 19.78125 L 17.4375 16 L 21.21875 12.21875 L 19.78125 10.78125 L 16 14.5625 Z"/>
                            </svg>
                            @endif
                    </div>

                    @elseif($selectedType == 'sell')
                        Place putt order
                    @endif
                </div>
            @else
                <div class="col-start-1 col-end-1 place--button text-center" style="background-color:grey">
                    @if($selectedType == 'buy')
                        Place call order
                    @elseif($selectedType == 'sell')
                        Place put order
                    @endif
                </div>
            @endif
        </div>

    {{-- @if($message or $error)
            <div class="grid grid-cols-4 gap-0 @if($message) bg-green @elseif($error) bg-red @endif text-center" style="position:absolute !important;top:0 !important;float:left!important; margin-top:10px;width: 310px;height: 50px !important;"
                 wire:click="closeMessage()">
                <div class="col-start-1 col-end-3">
                    @if($message)
                        {{$message}}
                    @endif
                    @if($error)
                        {{$error}}
                    @endif
                </div>
                <div class="col-start-4 col-end-4">
                    X
                </div>
            </div>
        @endif --}}
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('orderPlaced', function() {
            document.getElementById('orderPlaceWaiting').classList.add('hidden');
            document.getElementById('orderPlacedSuccess').classList.remove('hidden');
            setTimeout(function() {
                document.getElementById('orderPlacedSuccess').classList.add('hidden');
            }, 2000);
        });
        Livewire.on('orderPlacingError', function() {
            setTimeout(function() {
                document.getElementById('orderPlacedError').classList.add('hidden');
            }, 2000);
        });

    })
</script>
