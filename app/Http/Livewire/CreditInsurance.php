<?php

namespace App\Http\Livewire;

use App\Mail\CreditTradeUploaded;
use App\Mail\InsuranceTradeUploaded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreditInsurance extends Component
{
    use WithFileUploads;

    public $credit;
    public $insurance;
    public $profile;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->profile = Auth::user()->userProfile()->first();
        if($this->profile == null) {
            return redirect()->to(route('profile.show'));
        }
    }

    public function save()
    {
        $this->validate([
            'credit' => 'required|image|max:2048', // 1MB Max
            'insurance' => 'required|image|max:2048', // 1MB Max
        ]);

        $user = Auth::user();
        Mail::to($user->email)->send(new CreditTradeUploaded($user));
        Mail::to($user->email)->send(new InsuranceTradeUploaded($user));
        $this->profile->credit_path = $this->credit->store('identification');
        $this->profile->insurance_path = $this->insurance->store('identification');
        $this->profile->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.credit-insurance');
    }
}
