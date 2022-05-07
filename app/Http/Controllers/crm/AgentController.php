<?php

namespace App\Http\Controllers\crm;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('admin')) {
            $agents = Agent::get();
            return view('crm.agent.index', compact('agents'));
        } else if (Auth::user()->can('employee')) {
            $agents = Agent::get();
            return view('crm.task.index', compact('agents'));
        } else {
            abort(401, 'Unauthorized');
        }
    }

    public function create(Request $request)
    {
        return view('crm.agent.create', ['levels' => '0']);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'role' => 'required',
            'password' => 'required',
            'ip' => 'required',

        ]);
        $input = $request->all();
        $agent = Agent::create([
            'name' => $input['name'] . " " . $input['lastname'],
            'role' => $input['role'],
            'ip_address' => $input['ip'],
            'status' => 'Active',
            'created_by' => Auth::user()->id,
            'password' => Hash::make($input['password'])
        ]);
        $agent->save();

        return redirect()->route('crm.agent.index');
    }
}
