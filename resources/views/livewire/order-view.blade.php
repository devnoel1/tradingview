



<div class="text-white open-orders flex flex-1 flex-col overflow-hidden bg-gray-800">
    <div class="grid grid-flow-col auto-cols-max justify-between flex items-center px-8 py-4 border-b border-gray-600 bg-gray-800">
        
        <div class="grid grid-cols-2 gap-0 symbolbuy-second-tab">
            <div class="col-start-1 col-end-1 symbolbuy-tab @if($selectedView == 'open') active @endif" wire:click="setView('open')">Open</div>
            <div class="col-start-2 col-end-2 symbolbuy-tab @if($selectedView == 'fills') active @endif" wire:click="setView('fills')">Fills</div>
        </div>
        <em class="text-white">@if($selectedView == 'open') Open Orders @else Fill Orders @endif</em>
    </div>

    @if($selectedView == 'open')
        <div class="px-4 py-2 grid grid-cols-8 gap-2 bg-gray-900 text-white order-header">
            <div>Side</div>
            <div>Size</div>
            <div>Open Rate</div>
            <div>Current Rate</div>
            <div>Price</div>
            <div>Fee</div>
            <div>Open Time</div>
            <div>Status</div>
        </div>
    @elseif($selectedView == 'fills')
        <div class="px-4 py-2 grid grid-cols-6 gap-2 bg-gray-900 text-white order-header">
            <div>Side</div>
            <div>Size</div>
            <div>Price</div>
            <div>Fee</div>
            <div>Open Time</div>
            <div>Profit</div>
        </div>
    @endif
    
    <div class="custom-scroll flex-auto @if(($selectedView == 'open' && $countOpens == 0) || ($selectedView == 'fills' && $countFills == 0)) bg-gray-900 @endif">
        <div class="wrapper min-h-full">
            @foreach($active_wallet->orders as $order)
            
                @if($order->symbol->id == $active_symbol_id)
                
                    @if($selectedView == 'open')
                        @if($order->status == 'open' || $order->status == 'pending' || $order->status == 'waiting' || $order->status == 'waiting_sell')

                          <div class="px-4 py-2 grid grid-cols-8 gap-2 bg-gray-900 text-white order-row">
                              @if($order->type == 'buy')
                                  <div class="text-green">
                                      CALL
                                  </div>
                              @else
                                  <div class="text-red">
                                      PUT
                                  </div>
                              @endif

                              <div>{{$order->amount}}<br/>
                                  {{$order->symbol->description}}
                              </div>
                              <div>{{$order->symbol->currency}} {{$order->symbol_price * $order->amount}}</div>
                              <div>
                                  <span class="@if(($order->symbol->last_value - $order->symbol_price)>0) text-green xl:border-l-2 border-green pl-2  @else text-red xl:border-l-2 border-red pl-2 @endif">
                                      {{$order->symbol->currency}} {{$order->symbol->last_value * $order->amount}}
                                  </span>
                              </div>
                              <div>{{$order->wallet->currency}} {{$order->wallet_symbol_price}}</div>
                              <div>{{$order->wallet->currency}} {{$order->fee}}</div>
                              <div>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y h:i')}}</div>

                              <div>@if($order->status == 'waiting_sell')waiting @else {{$order->status}} @endif

                                  @if($order->status == 'open')
                                      <button class="inline-flex items-center px-4 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition update-order-status-button" onclick="confirm('Are you sure you want to close this order?') || event.stopImmediatePropagation()" wire:click="sellOrder('{{$order->id}}')">
                                          Close
                                      </button>
                                  @elseif($order->status == 'pending')
                                      <button class="inline-flex items-center px-4 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition update-order-status-button" onclick="confirm('Are you sure you want to cancel this order?') || event.stopImmediatePropagation()" wire:click="cancelOrder('{{$order->id}}')">
                                          Cancel
                                      </button>
                                  @elseif($order->status == 'waiting')
                                      <button class="inline-flex items-center px-4 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition update-order-status-button" onclick="confirm('Are you sure you want to cancel this order?') || event.stopImmediatePropagation()" wire:click="cancelOrder('{{$order->id}}')">
                                          Cancel
                                      </button>
                                  @elseif($order->status == 'waiting_sell')
                                      <button class="inline-flex items-center px-4 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition update-order-status-button"  onclick="confirm('Are you sure you want to cancel this order?') || event.stopImmediatePropagation()" wire:click="cancelOrder('{{$order->id}}')">
                                          Cancel
                                      </button>
                                  @endif
                              </div>
                          </div>
                        @endif



                    @elseif($selectedView =='fills')
                        @if($order->status == 'close' || $order->status == 'cancelled')

                          <div class="px-4 py-2 grid grid-cols-6 gap-2 bg-gray-900 text-white order-row">
                              @if($order->type == 'buy')
                                  <div class="text-green">
                                      CALL
                                  </div>
                              @else
                                  <div class="text-red">
                                      PUT
                                  </div>
                              @endif

                              <div>{{$order->amount}}<br/>
                                  {{$order->symbol->description}}
                              </div>
                              <div>{{$order->symbol->currency}} {{$order->symbol_price * $order->amount}}</div>
                              <div>{{$order->wallet->currency}} {{$order->fee}}</div>
                              <div>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y h:i')}}</div>
                              <div>
                                  <span class="@if(($order->symbol->sell_symbol_price - $order->symbol_price)>0) text-green xl:border-l-2 border-green pl-2  @else text-red xl:border-l-2 border-red pl-2 @endif">
                                      {{$order->symbol->currency}} {{$order->sell_symbol_price * $order->amount}}
                                  </span>
                              </div>


                          </div>
                          
                        @endif
                    @endif
                @endif
            @endforeach
            @if($selectedView == 'open' && $countOpens == 0)
                <div class="px-8 py-2 grid gap-2 bg-gray-900 text-white order-row flex justify-items-center items-center">
                    <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                </div>
            @endif
            
            @if($selectedView =='fills' && $countFills == 0)
                <div class="px-8 py-2 grid gap-2 bg-gray-900 text-white order-row flex justify-items-center items-center">
                    <div class="font-bold" style="color:rgb(55, 65, 81);font-size: larger;">No orders to show</div>
                </div>
            @endif
        </div>
    </div>


</div>

