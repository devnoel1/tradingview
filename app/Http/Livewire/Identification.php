<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Identification extends Component
{
    use WithFileUploads;

    public $type_of_id;
    public $front;
    public $back;
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
            'front' => 'required|image|max:2048', // 1MB Max
            'back' => 'required|image|max:2048', // 1MB Max
            'type_of_id' => 'required',
        ]);

        $this->profile->id_front_path = $this->front->store('identification');
        $this->profile->id_back_path = $this->back->store('identification');
        $this->profile->id_type = $this->type_of_id;
        $this->profile->save();

        return redirect()->to(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.identification');
    }
}
