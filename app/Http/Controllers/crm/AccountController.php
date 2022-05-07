<?php


namespace App\Http\Controllers\crm;


use App\Http\Controllers\Controller;
use App\Imports\AffiliateImport;
use App\Mail\CreditTradeUploaded;
use App\Mail\IdentificationVerified;
use App\Mail\UserCreated;
use App\Mail\VerificationRequest;
use App\Models\Level;
use App\Models\Order;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserSymbol;
use App\Models\WalletSymbol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Group;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkrole')->only('edit');
    }
    public function index() //Request $request)
    {
        if (Auth::user()->type == 'admin') {
            $users = User::all();
            $user = "[";
            $user .= '"Not Assigned",';
            $r = count($users);
            $i = 1;

            foreach ($users as $u) {
                if ($i == $r) {
                    $user .= '"' . $u->id . '"';
                } else {
                    $user .= '"' . $u->id . '",';
                }
                $i++;
            }
            $user .= "]";
            // start of user code
            $groups = Group::all();

            $group = "[";
            $r = count($groups);
            $i = 1;

            foreach ($groups as $g) {
                if ($i == $r) {
                    $group .= '"' . $g->name . '"';
                } else {
                    $group .= '"' . $g->name . '",';
                }
                $i++;
            }
            $group .= "]";
            // end of user code 

            return view('crm.account.index', ['users' => $users, 'groups' => $group, 'ulist' => $user]);
        } else if (Auth::user()->type == 'employee') {
            $users = User::where('created_user_id', Auth::user()->id)->latest()->get();
            return view('crm.account.index', ['users' => $users]);
        } else {
            abort(401, 'Unauthorized');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        if (Auth::user()->type == 'admin') {
            $account_id = $request->account;
            $account = User::find($account_id);
            $accounts = User::all();
            $users = User::whereIn('type', ['admin', 'employee'])->get();
            $wallets = [];
            foreach ($account->wallets as $wallet) {
                array_push($wallets, $wallet->id);
            }
            $orders_count = Order::whereIn('wallet_id', $wallets)->count();
            $orders = Order::whereIn('wallet_id', $wallets)->orderBy('created_at', 'asc')
                ->take(10)->get();
            $wallet_symbol = WalletSymbol::whereIn('wallet_id', $wallets)->get();
            return view('crm.account.show', [
                'account' => $account,
                'orders' => $orders,
                'orders_count' => $orders_count,
                'wallet_symbol' => $wallet_symbol,
                'users' => $users,
                'accounts' => $accounts
            ]);
        } else if (Auth::user()->type == 'employee') {
            $account_id = $request->account;
            $account = User::where('id', $account_id)->where('created_user_id', Auth::user()->id)->first();
            $accounts = User::all();
            $users = User::whereIn('type', ['customer'])->get();
            $wallets = [];
            foreach ($account->wallets as $wallet) {
                array_push($wallets, $wallet->id);
            }
            $orders_count = Order::whereIn('wallet_id', $wallets)->count();
            $orders = Order::whereIn('wallet_id', $wallets)->orderBy('created_at', 'asc')
                ->take(10)->get();
            $wallet_symbol = WalletSymbol::whereIn('wallet_id', $wallets)->get();
            return view('crm.account.show', [
                'account' => $account,
                'orders' => $orders,
                'orders_count' => $orders_count,
                'wallet_symbol' => $wallet_symbol,
                'users' => $users,
                'accounts' => $accounts
            ]);
        } else {
            abort(401, 'Unauthorized');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function identificationShow(Request $request)
    {
        $account_id = $request->account;
        $account = UserProfile::find($account_id);
        $user = User::find($account->user_id);
        return view('crm.account.identification', ['account' => $account, 'user' => $user]);;
    }

    public function getIdFrontImage(Request $request)
    {
        $account_id = $request->account;
        $account = UserProfile::find($account_id);
        return Storage::response($account->id_front_path);
    }
    public function getIdBackImage(Request $request)
    {
        $account_id = $request->account;
        $account = UserProfile::find($account_id);
        return Storage::response($account->id_back_path);
    }
    public function approveIdentification(Request $request)
    {
        $account_id = $request->account;
        $account = UserProfile::find($account_id);
        $account->identified = 1;
        $account->save();

        Mail::to($account->user->email)->send(new IdentificationVerified($account->user));
        return redirect(route('crm.dashboard.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $levels = Level::all();
        $groups = Group::all();
        $affiliates = Affiliate::all();
        return view('crm.account.create', ['levels' => $levels, 'groups' => $groups, 'affiliates' => $affiliates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request->all());
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|min:5',
            'address_line_1' => 'required|min:5',
            'city' => 'required|min:5',
            'state' => 'required|min:5',
            'zipcode' => 'required|min:4',
            'country' => 'required',
            'time_zone' => 'required',
        ]);
        //        dd('hi');
        $password = Str::random(10);
        $input = $request->all();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'group_id' => $input['group_id'],
            'created_user_id' => Auth::user()->id,
            'password' => Hash::make($password)
        ]);
        $user->save();

        $profile = UserProfile::create([
            'user_id' => $user->id,
            'address_line_1' => $input['address_line_1'],
            'address_line_2' => array_key_exists('address_line_2', $input) ? $input['address_line_2'] : null,
            'city' => $input['city'],
            'state' => $input['state'],
            'zipcode' => $input['zipcode'],
            'country' => $input['country'],
            //'balance' => 0,
            'level_id' => $input['level'],
            'time_zone' => $input['time_zone'],
            'date_of_birth' => $input['date_of_birth'],
            'second_email' => $input['second_email']
        ]);
        $profile->save();

        Mail::to($user->email)->send(new UserCreated($user, $password));
        Mail::to($user->email)->send(new VerificationRequest($user));

        return redirect()->route('crm.account.show', ['account' => $user->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $account_id = $request->account;
        $account = User::find($account_id);
        $levels = Level::all();
        $groups = Group::with('usergroup')->get();
        $affiliates = Affiliate::all();
        // dd($groups);
        return view('crm.account.edit', ['account' => $account, 'levels' => $levels, 'groups' => $groups, 'affiliates' => $affiliates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /*
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|min:5',
            'address_line_1' => 'required|min:5',
            'city' => 'required|min:5',
            'state' => 'required|min:5',
            'zipcode' => 'required|min:4',
            'country' => 'required|min:2',
            'time_zone' => 'required',
        ]);
        */
        $account_id = $request->account;
        $account = User::find($account_id);
        $input = $request->all();

        if (!empty($input['password'])) {

            $account->password = Hash::make($input['password']);
        }

        $account->name = $input['name'];

        $account->email = $input['email'];
        $account->group_id = $input['group_id'];
        $account->created_user_id = Auth::user()->id;
        $account->save();

        $profile = $account->userProfile;
        $profile->address_line_1 = $input['address_line_1'];
        $profile->address_line_2 = array_key_exists('address_line_2', $input) ? $input['address_line_2'] : null;
        $profile->phone_number = $input['phone'];
        $profile->city = $input['city'];
        $profile->state = $input['state'];
        $profile->zipcode = $input['zipcode'];
        $profile->country = $input['country'];
        $profile->level_id = $input['level'];
        $profile->second_email = $input['second_email'];
        $profile->time_zone = $input['time_zone'];
        $profile->save();

        #return redirect()->route('crm.account.show', ['account' => $user->id]);
        return redirect()->route('crm.account.index');
    }

    public function destroy($account)
    {

        $account = User::find($account);
        $profile = $account->userProfile;
        $account->delete();
        $profile->delete();

        return redirect()->route('crm.account.index');
    }

    public function destroyleads($account)
    {

        $account = User::find($account);
        $profile = $account->userProfile;
        $account->delete();
        $profile->delete();

        return redirect()->route('crm.leads.index');
    }

    public function leads()
    {
        if (Auth::user()->type == 'admin') {
            $users = User::all();
            $user = "[";
            $user .= '"Not Assigned",';
            $r = count($users);
            $i = 1;

            foreach ($users as $u) {
                if ($i == $r) {
                    $user .= '"' . $u->id . '"';
                } else {
                    $user .= '"' . $u->id . '",';
                }
                $i++;
            }
            $user .= "]";
            // start of user code
            $groups = Group::all();

            $group = "[";
            $r = count($groups);
            $i = 1;

            foreach ($groups as $g) {
                if ($i == $r) {
                    $group .= '"' . $g->name . '"';
                } else {
                    $group .= '"' . $g->name . '",';
                }
                $i++;
            }
            $group .= "]";
            // end of user code 

            $affiliateleads = Affiliate::where('user_status', 0)->latest()->get();
            return view('crm.leads.leads', compact('affiliateleads', 'group', 'user'));
        } else if (Auth::user()->type == 'employee') {
            $leads = Affiliate::whereHas('affiliateuser', function ($q) {
                $q->where('group_id', Auth::user()->group_id)->whereNotNull('group_id');
            })->where('user_status', 0)->latest()->get();

            return view('employee.leads', compact('leads', 'group', 'user'));
        } else {
            abort(401, 'Unauthorized');
        }
    }

    public function leadsCreate()
    {
        $users = User::whereIn('type', ['affiliate'])->get();
        $groups = Group::all();
        $levels = Level::all();
        if (Auth::user()->type == 'admin' || Auth::user()->type == 'employee') {
            return view('crm.leads.create', compact('users', 'groups', 'levels'));
        } else {
            abort(401, 'Unauthorized');
        }
    }

    public function leadsEdit($lead)
    {
        $users = User::whereIn('type', ['affiliate'])->get();
        $affiliateleads = Affiliate::where('id', $lead)->latest()->get();
        $groups = Group::all();
        $levels = Level::all();
        if (Auth::user()->type == 'admin' || Auth::user()->type == 'employee') {
            return view('crm.leads.edit', compact('affiliateleads', 'users', 'groups', 'levels'));
        } else {
            abort(401, 'Unauthorized');
        }
    }

    public function leadsUpload()
    {
        if (Auth::user()->type == 'admin' || Auth::user()->type == 'employee') {
            Excel::import(new AffiliateImport, request()->file('xlsx_file'));
            return redirect()->route('crm.leads.index');
        } else {
            abort(401, 'Unauthorized');
        }
    }

    public function leadsStore(Request $request)
    {
        if (Auth::user()->type == 'admin' || Auth::user()->type == 'employee') {
            $affiliate = Affiliate::create([
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
                'email' => $request->get('email'),
                'country' => $request->get('country'),
                'ip_address' => $request->get('ip_address'),
                'phone' => $request->get('phone'),
                'affiliate_user_id' => $request->get('owner_id'),
                'group_id' => $request->get('group_id'),
                'external_id' => $request->get('external_id'),
            ]);
            $affiliate->save();
            return redirect()->route('crm.leads.index');
        } else {
            abort(401, 'Unauthorized');
        }
    }

    public function deposits()
    {
        if (Auth::user()->type == 'admin') {
            $deposits = User::where('id', '!=', Auth::user()->id)->with('deposituser')->latest()->get();
            return view('crm.deposits.deposits', compact('deposits'));
        } else if (Auth::user()->type == 'employee') {
            $deposits = User::where('created_user_id', Auth::user()->id)->with('deposituser')->latest()->get();
            return view('employee.deposits', compact('deposits'));
        } else {
            abort(401, 'Unauthorized');
        }
    }
}
