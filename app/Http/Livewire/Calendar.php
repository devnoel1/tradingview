<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Calendar extends Component
{

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
        // $this->profile = Auth::user()->userProfile()->first();
        // if($this->profile == null) {
        //     return redirect()->to(route('profile.show'));
        // }
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
