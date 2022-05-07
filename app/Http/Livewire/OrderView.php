<?php

namespace App\Http\Livewire;

use App\Models\Symbol;
use App\Models\UserSymbol;
use App\Models\Wallet;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderView extends Component
{

    public $active_wallet;
    public $active_exchange;
    public $active_symbol;
    public $active_symbol_id;
    public $active_code;
    public $user;
    public $userSymbols;

    public $market_time;
    public $market_open;
    public $symbol_price;
    public $currentSymbol;
    public $time;
    public $selectedView;
    public $countOpens;
    public $countFills;

    protected function getListeners()
    {
        return ['orderPlaced' => 'updateOpenOrderBook'];
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->active_wallet = Wallet::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();

        $this->countOpens = Order::where('wallet_id', '=', $this->active_wallet->id)->where('symbol_id', '=', $this->active_symbol_id)->whereIn('status' , ['open','pending','waiting','waiting_sell'])->count();
        
        $this->countFills = Order::with('symbol')->where('wallet_id', '=', $this->active_wallet->id)->where('symbol_id', '=', $this->active_symbol_id)->whereIn('status' , ['close','cancelled'])->count();

        $this->selectedView = 'open';

        $userSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();
        $this->userSymbols = $userSymbol;
        if ($userSymbol !== null) {
            $this->active_exchange = $userSymbol->symbol->exchange->code;
            $this->active_symbol_id = $userSymbol->symbol->id;
            $this->currentSymbol = $userSymbol->symbol;
            if ($userSymbol->symbol->type == 'crypto') {
                $this->active_symbol = $userSymbol->symbol->code . $userSymbol->symbol->currency;
            } else {
                $this->active_symbol = $userSymbol->symbol->code;
            }
            $this->active_code = $this->active_exchange . ":" . $this->active_symbol;
        } else {
            $this->active_code = "NASDAQ:AAPL";
        }
    }

    public function sellOrder($order_id){
        foreach($this->active_wallet->orders as $order){
            if($order->id == $order_id){
                $this->updateSymbolPrice();
                if($this->market_open){
                    $total = $order->order_total;
                    $in_wallet = $this->isSymbolInWallet($this->active_wallet, $this->currentSymbol);
                    if($in_wallet !== null && $in_wallet->amount >= $order->amount){
                        $order->executeOrderStatusUpdate('sell');
                        $order->processOrderBalanceSymbolTradingVolume();
                    }else{
                        $order->status = 'cancelled';
                        $order->save();
                    }
                }else{
                    $order->status = 'waiting_sell';
                    $order->type = 'sell';
                    $order->save();
                }

            }
        }
    }

    public function cancelOrder($order_id){
        foreach($this->active_wallet->orders as $order){
            if($order->id == $order_id){
                if($order->status == 'waiting_sell'){
                    $order->status = 'open';
                }else {
                    $order->status = 'cancelled';
                }
                $order->save();
            }
        }
    }

    public function updateOpenOrderBook(){
        $this->active_wallet = Wallet::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();
    }

    public function render()
    {
        return view('livewire.order-view');
    }

    private function updateSymbolPrice(): void
    {
        $this->currentSymbol->updateSymbolPrice();
        $this->symbol_price = $this->currentSymbol->last_value;
        $this->market_open = $this->currentSymbol->updateSymbolPriceWithOpenMarket();
    }

    public function isSymbolInWallet(Wallet $wallet, Symbol $symbol){
        $in_wallet = null;
        foreach ($wallet->walletSymbols as $wallet_symbol) {
            if ($wallet_symbol->symbol_id == $symbol->id) {
                $in_wallet = $wallet_symbol;
            }
        }
        return $in_wallet;
    }

    public function setView($view){

        $this->countOpens = Order::where('wallet_id', '=', $this->active_wallet->id)->whereIn('status' , ['open','pending','waiting','waiting_sell'])->count();
        
        $this->countFills = Order::where('wallet_id', '=', $this->active_wallet->id)->whereIn('status' , ['close','cancelled'])->count();
        
        $this->selectedView = $view;
    }
}
