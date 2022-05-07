<?php

namespace App\Actions\Fortify;

use App\Mail\UserCreated;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => ['required', 'accepted'],
//            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $name = $input['first_name'] . " " . $input['last_name'];

        $password = $input['password'];
        $email = $input['email'];
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $profile = UserProfile::create([
            'user_id' => $user->id,
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'address_line_1' => null,
            'address_line_2' => null,
            'city' => null,
            'state' => null,
            'zipcode' => null,
            'country' => $input['country'],
            'nationality' => null,
            'phone_number' => $input['phone_number'],
            'terms_and_conditions' => now(),
        ]);
        $profile->save();

        $main_wallet = Wallet::create([
            'user_id' => $user->id,
            'name' => 'Main Wallet',
            'currency' => 'EUR',
            'balance' => 0,
            'margin_balance' => 0,
            'active' => 1,
            'demo' => 0,
            'margin' => 0,
            ]);
        $main_wallet->save();

        Mail::to($user->email)->send(new UserCreated($user, $password));

        return $user;
    }
}
