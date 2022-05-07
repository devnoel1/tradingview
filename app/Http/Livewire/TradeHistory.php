<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TradeHistory extends Component
{
    public $user;
    public $orders;

    public function mount()
    {
        $this->user = Auth::user();

        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $wallet_ids= [];
        foreach ($this->wallets as $wallet) {
            array_push($wallet_ids, $wallet->id);
        }
        $this->orders = Order::whereIn('wallet_id', $wallet_ids)->whereNotIn('status', ['pending', 'cancelled'])->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.trade-history');
    }
}
