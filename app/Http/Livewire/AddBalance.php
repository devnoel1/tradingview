<?php

namespace App\Http\Livewire;

use App\Models\BalanceTransaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddBalance extends Component
{
    public $amount;
    public $note;
    public $profile;
    public $user;
    public $active_wallet;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = Auth::user();
        $this->profile = $this->user->userProfile()->first();
        $this->active_wallet = Wallet::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();
        if($this->profile == null) {
            return redirect()->to(route('profile.show'));
        }
    }

    public function save()
    {
        $this->validate([
            'amount' => 'required|numeric',
        ]);


        $transation = BalanceTransaction::create([
            'user_id' => $this->user->id,
            'wallet_id' => $this->active_wallet->id,
            'amount' => $this->amount,
            'note' => $this->note,
            'action' => 'add'
            ]);
        $transation->save();

        return redirect()->to(route('dashboard'));
    }


    public function render()
    {
        return view('livewire.add-balance');
    }
}
