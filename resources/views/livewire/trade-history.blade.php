<em class="grid grid-cols-1 px-8 py-4 border-b border-gray-600 bg-gray-800 text-white">Trade History</em>

<div class="px-1 py-2 grid grid-cols-5 gap-1 pr-3 bg-gray-900 text-white trade-history-header">
  <div>Profit</div>
  <div>Symbol</div>
  <div>Price</div>
  <div>Time</div>
  <div>Side</div>
</div>
<div class="history--scroll" id="trade_history_column" style="overflow: auto;">
    <div class="wrapper flex flex-1 flex-col max-h-max pb-20 md:pb-0">

        @foreach($orders as $order)
          <div
              class="px-1 py-1 grid grid-cols-5 gap-1 bg-gray-900 text-white trade-history-row">
              <div
                  class="@if(($order->symbol->last_value - $order->symbol_price)>0) text-green  @else text-red @endif">{{round(($order->symbol->last_value - $order->symbol_price), 2)}}</div>
              <div class="">{{$order->symbol->description}}</div>
              <div class="">{{$order->wallet->currency}} {{round($order->order_total, 2)}}</div>
              <div
                  class="">{{\Carbon\Carbon::parse($order->created_at)->format('d/m h:i')}}</div>
              <div
                  class="@if($order->type =='buy')text-green @else text-red @endif">@if($order->type =='buy')
                      put @else call @endif</div>
          </div>
        @endforeach

    </div>
</div>
