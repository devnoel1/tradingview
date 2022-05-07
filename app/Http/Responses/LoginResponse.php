<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $route = route('dashboard');


        // store in db last login date
        $user = User::find(Auth::id());
        $user->last_login = date('Y-m-d');
        $user->save();
        // dd($user);

        if(Auth::user()->type == 'admin' || Auth::user()->type == 'employee' || Auth::user()->type == 'affiliate'){
            $route = route('crm.dashboard.index');
        }


        return redirect($route);
    }
}
