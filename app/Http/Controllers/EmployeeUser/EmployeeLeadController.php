<?php

namespace App\Http\Controllers\EmployeeUser;

use App\Http\Controllers\Controller;
use App\Mail\VerificationRequest;
use App\Models\Comment;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\Affiliate;
use App\Models\Group;
use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\UserCreated;
use Auth;
use Illuminate\Support\Facades\Mail;
class EmployeeLeadController extends Controller
{
    public function save(Request $request)
    {
    	$request->validate([
            'first_name' => 'required|string|min:3',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:users',
            'country'=>'required|string|min:2',
            'ip_address'=>'required|string',
            'phone'=>'required|string',
            'external_id',
            'user_id',
            'affiliate_user_id',
            'group_id',
            'id',
        ]);
        $password = Str::random(10);
        $input = $request->all();
        print_r($input);
        $affiliate = Affiliate::where('id', '=', $input['id'])->first();

        $user = User::create([
            'name' => $input['first_name']." ".$input['last_name'],
            'email' => $input['email'],
            'created_user_id' =>Auth::user()->id,
            'affiliate_user_id'=>$input['affiliate_user_id'],
            'group_id'=>$input['group_id'],
            'password' => Hash::make($password)
        ]);
        $user->save();

        if($affiliate->comment){
            $comment = Comment::create([
                'user_id' => $user->id,
                'message' => $affiliate->comment,
            ]);
            $comment->save();
        }

        $profile = UserProfile::create([
            'user_id' => $user->id,
            'first_name'=>$input['first_name'],
            'last_name'=>$input['last_name'],
            'country' => $input['country'],
             'phone_number' => $input['phone']
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

        $affiliate->user_status = 1;
        $affiliate->user_id = $user->id;
        $affiliate->save();

        Mail::to($user)->send(new UserCreated($user,$password));
        Mail::to($user->email)->send(new VerificationRequest($user));

        return redirect()->route('employee.leads')->with('success','Lead converted to user');
    }
    public function leads()
    {
       $leads=Affiliate::whereHas('affiliateuser',function($q){
            $q->where('group_id',Auth::user()->group_id)->whereNotNull('group_id');
        })->where('user_status',0)->latest()->get();
     return view('employee.leads',compact('leads'));
    }
    public function users()
    {
         $users=User::where('created_user_id',Auth::user()->id)->latest()->get();
        return view('employee.users',compact('users'));
    }
    public function deposits()
    { $deposits=User::where('created_user_id',Auth::user()->id)->with('deposituser')->latest()->get();
        return view('employee.deposits',compact('deposits'));
    }
    public function create($userId)
    { $user=Affiliate::find($userId);
        return view('employee.userform',compact('user'));
    }
    public function show($leadId)
    { $lead=Affiliate::find($leadId);
        return view('employee.leadshow',compact('lead'));
    }
    public function updateStatus(Request $request, $leadId)
    {
        $lead=Affiliate::find($leadId);
        $input = $request->all();
        $lead->lead_status = $input['lead_status'];
        $lead->save();

        return view('employee.leadshow',compact('lead'));
    }
}
