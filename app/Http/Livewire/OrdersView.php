<?php

namespace App\Http\Livewire;

use App\Models\Wallet;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersView extends Component
{
    public $user;
    public $wallets;
    public $active_wallet_id;
    public $wallets_array = [];

    public $view_wallet;
    public $view_wallet_id;
    public $view_tab = 'balances';
    public $total_value = 0;
    public $total_profits = 0;
    public $total_fees = 0;

    public $addingWallet = false;
    public $new_name;
    public $margin_wallet = 0;

    public $renamingWallet = false;
    public $rename_name;
    public $system_status;
    public $countOpens;
    public $countFills;


    public function mount()
    {
        $this->user = Auth::user();
        $this->system_status = 'operational';
        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $this->countOpens = Order::where('wallet_id', '=', $this->active_wallet_id)->whereIn('status' , ['open','pending','waiting'])->count();
        
        $this->countFills = Order::with('symbol')->where('wallet_id', '=', $this->active_wallet_id)->whereIn('status' , ['close','cancelled'])->count();

        $this->updateFields();
    }

    public function setActive($wallet_id){
        $this->active_wallet_id = $wallet_id;
        foreach($this->wallets as $wallet){
            if($wallet->id == $wallet_id){
                $wallet->active = true;
            }else{
                $wallet->active = false;
            }
            $wallet->save();
        }
    }

    public function addWallet()
    {
        $wallet = Wallet::create([
            'user_id' => $this->user->id,
            'name' => $this->new_name,
            'currency' => "EUR",
            'balance' => 0,
            'margin' => $this->margin_wallet
        ]);
        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $this->updateFields();
        $this->addingWallet = false;
    }

    public function renameWallet(){
        $this->view_wallet->name = $this->rename_name;
        $this->view_wallet->save();
        $this->renamingWallet = false;
    }

    public function setView($wallet_id){
        $this->view_wallet_id = $wallet_id;
        $this->view_tab = 'balances';
        $this->setTotalOrderValues($wallet_id);
        foreach ($this->wallets as $wallet) {
            if($wallet->id == $wallet_id){
                $this->rename_name = $wallet->name;
                $this->view_wallet = $wallet;
            }
        }
    }

    public function setTotalOrderValues($wallet_id){
        $this->total_profits = 0;
        $this->total_fees = 0;
        foreach ($this->wallets as $wallet) {
            if ($wallet->id == $wallet_id) {
                foreach($wallet->orders as $order){
                    if($order->fee != null){
                        $this->total_fees += $order->fee;
                    }
                    if($order->sell_fee != null){
                        $this->total_fees += $order->sell_fee;
                    }
                    $this->total_profits += $wallet->getTotalOrderValues()['total_pl'];
                }
            }
        }
    }

    public function setViewTab($tab){
        $this->view_tab = $tab;
    }

    public function render()
    {
        $this->system_status = 'operational';
        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $this->setTotalOrderValues($this->view_wallet_id);
        return view('livewire.orders-view');
    }

    private function updateFields(): void
    {
        $this->total_value = 0;
        $this->wallets_array = [];
        foreach ($this->wallets as $wallet) {
            $this->total_value += $wallet->balance;
            $wallet_value = $wallet->balance;
            if($wallet->active){
                $this->view_wallet_id = $wallet->id;
                $this->view_wallet = $wallet;
                $this->rename_name = $wallet->name;
                $this->active_wallet_id = $wallet->id;
            }
            $wallet_symbols_array = [];
            foreach($wallet->walletSymbols as $walletSymbol){
                $symbol = $walletSymbol->symbol;
                $symbol_price = round_up($walletSymbol->getSymbolPrice(), 2);
                $symbol_total = round_up(($symbol_price * $walletSymbol->amount), 2);
                $this->total_value += $symbol_total;
                $wallet_value += $symbol_total;
                $symbol_object = [
                    'id' => $symbol->id,
                    'name' => $symbol->name,
                    'description' => $symbol->description,
                    'code' => $symbol->code,
                    'amount' => $walletSymbol->amount,
                    'price' => $symbol_price,
                    'total' => $symbol_total,
                ];
                $wallet_symbols_array[] = $symbol_object;
            }
            $wallet_total_values = $wallet->getTotalOrderValues();
            $this->wallets_array[] = [
                'name' => $wallet->name,
                'id' => $wallet->id,
                'symbols' => $wallet_symbols_array,
                'total_value' => $wallet_total_values['total_value'],
                'total_buy_value' => $wallet_total_values['total_buy_value'],
                'total_sell_value' => $wallet_total_values['total_sell_value'],
                'total_pl' => $wallet_total_values['total_pl'],
            ];
        }
    }
}
