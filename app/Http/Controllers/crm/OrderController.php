<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('checkrole')->except('show')->except('index');
    }
    public function index()
    {

          if(Auth::user()->can('admin'))
        {
        $orders = Order::paginate(15);
        return view('crm.order.index', ['orders' => $orders]);
        }else if(Auth::user()->can('employee')){
        $orders=User::where('created_user_id',Auth::user()->id)->with('wallets.orders')->paginate(15);
        return view('crm.order.index', ['orders' => $orders]);

        }else{
           abort(401,'Unauthorized');
        }
    }

    public function indexForUser($account)
    {
          if(Auth::user()->can('admin'))
        {
         $account = User::find($account);
        $wallets = [];
        foreach($account->wallets as $wallet){
            array_push($wallets, $wallet->id);
        }
        $orders = Order::whereIn('wallet_id', $wallets)->paginate(15);
        return view('crm.order.index', ['orders' => $orders]);
        }else if(Auth::user()->can('employee')){
        $orders = User::where('id',$account)->with('wallets.orders')->paginate(15);
        return view('crm.order.index', ['orders' => $orders]);

        }else{
            abort(401,'Unauthorized');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('crm.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $order = Order::create([
//            'name' => $request->get('name'),
//            'code' => strtoupper($request->get('code')),
//            'currency' => strtoupper($request->get('currency')),
//        ]);
//        $order->save();
//        return redirect()->to(route('crm.order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('crm.order.show', ['order' => $order]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('crm.order.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
//        $order->name = $request->get('name');
//        $order->code = strtoupper($request->get('code'));
//        $order->currency = strtoupper($request->get('currency'));
//        $order->save();
//        return redirect()->to(route('crm.order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
//        $order->delete();
//        return redirect()->to(route('crm.order.index'));
    }

    public function storeSpread(Request $request, Order $order)
    {
        if(Auth::user()->can('admin') || Auth::user()->can('employee'))
        {
            $spread_value = $request->get('spread');
            if($spread_value == 0){
                $spread_value = null;
            }
            $order->spread = $spread_value;
            $order->save();
        }
        return view('crm.order.show', ['order' => $order]);

    }
}
