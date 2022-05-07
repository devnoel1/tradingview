<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
     if(Auth::user()->can('admin'))
        {
         $tasks=Task::with(['user','ownuser'])->latest()->paginate(20);
        return view('crm.task.index',compact('tasks'));
        }else if(Auth::user()->can('employee')){
        $tasks=Task::whereHas('user',function($q){$q->where('created_user_id',Auth::user()->id);})->with(['user','ownuser'])->latest()->paginate(20);
        //dd($tasks);
        return view('crm.task.index',compact('tasks'));           
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $task = Task::create([
            'user_id' => $input['user'],
            'created_user_id' => auth()->user()->id,
            'owner_user_id' => $input['owner_user_id'],
            'due_date' => $input['due_date'],
            'description' => $input['description'],
            'status' => $input['status'],
            'type' => $input['type']
        ]);
        $task->save();
        return redirect(route('crm.account.show', ['account' => $task->user_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if(Auth::user()->can('admin'))
        {
        $users = User::whereIn('type', ['admin','employee'])->get();
        return view('crm.task.edit', ['task' => $task, 'users' => $users]);
        }else if(Auth::user()->can('employee') && $task->created_user_id==Auth::user()->id){
        $users = User::where('created_user_id',Auth::user()->id)->whereIn('type', ['customer'])->get();
        return view('crm.task.edit', ['task' => $task, 'users' => $users]);          
        }else{
            abort(401,'Unauthorized');
        }              
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->owner_user_id = $request->get('owner_user_id');
        $task->due_date = $request->get('due_date');
        $task->description = $request->get('description');
        $task->status = $request->get('status');
        $task->type = $request->get('type');
        $task->save();
        return redirect(route('crm.account.show', ['account' => $task->user_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    { //dd('hi');
        $user_id = $task->user_id;
        $task->delete();
        return redirect(route('crm.account.show', ['account' => $user_id]));
    }
}
