<?php

namespace App\Http\Livewire;

use App\Mail\IdentificationDocsUploaded;
use App\Mail\VerificationDocsUploaded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class KycAml extends Component
{
    use WithFileUploads;

    public $passport;
    public $proof_of_address;
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
            'passport' => 'required|image|max:2048', // 1MB Max
            'proof_of_address' => 'required|image|max:2048', // 1MB Max
        ]);

        $user = Auth::user();
        Mail::to($user->email)->send(new IdentificationDocsUploaded($user));
        Mail::to($user->email)->send(new VerificationDocsUploaded($user));

        $this->profile->id_front_path = $this->passport->store('identification');
        $this->profile->proof_of_address_path = $this->proof_of_address->store('identification');
        $this->profile->save();


        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.kyc-aml');
    }
}
