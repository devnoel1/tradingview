<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UserProfile;

class UpdateUserProfile extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $profile = Auth::user()->userProfile()->first();
        if($profile != null) {
            $this->state = $profile->toArray();

            if($profile->terms_and_conditions == null){
                $this->state['terms_and_conditions'] = false;
            }else{
                $this->state['terms_and_conditions'] = true;
            }

        }
    }

    public function update()
    {
        $this->validate([
            'state.first_name' => 'required|min:1',
            'state.last_name' => 'required|min:1',
            'state.address_line_1' => 'required|min:1',
            'state.city' => 'required|min:1',
            'state.state' => 'required|min:1',
            'state.zipcode' => 'required|min:1',
            'state.country' => 'required|min:1',
            'state.nationality' => 'required|min:2',
            'state.phone_number' => 'required|min:2',
            'state.terms_and_conditions' => 'accepted'
        ]);
        $user = Auth::user();
        $profile = $user->userProfile()->first();
        if($profile != null) {
            $profile->update([
                'first_name' => $this->state['first_name'],
                'last_name' => $this->state['last_name'],
                'address_line_1' => $this->state['address_line_1'],
                'address_line_2' => $this->state['address_line_2'],
                'city' => $this->state['city'],
                'state' => $this->state['state'],
                'zipcode' => $this->state['zipcode'],
                'country' => $this->state['country'],
                'nationality' => $this->state['nationality'],
                'phone_number' => $this->state['phone_number'],
            ]);
            if($profile->terms_and_conditions == null){
                $profile->terms_and_conditions = now();
            }
            $profile->save();
        }else {
            $profile = UserProfile::create([
                'user_id' => $user->id,
                'first_name' => $this->state['first_name'],
                'last_name' => $this->state['last_name'],
                'address_line_1' => $this->state['address_line_1'],
                'address_line_2' => array_key_exists('address_line_2', $this->state) ? $this->state['address_line_2'] : null,
                'city' => $this->state['city'],
                'state' => $this->state['state'],
                'zipcode' => $this->state['zipcode'],
                'country' => $this->state['country'],
                'nationality' => $this->state['nationality'],
                'phone_number' => $this->state['phone_number'],
                'terms_and_conditions' => now(),
            ]);
            $profile->save();
        }
        $this->emit('saved');
    }

    public function render()
    {
        return view('profile.update-user-profile');
    }
}
