@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Task</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update a Task</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('crm.task.update', ['task' => $task->id])}}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Assigned to</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="owner_user_id" required>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if($user->id == $task->owner_user_id) SELECTED="selected" @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label">Description</label>
                    <textarea name="description" class="form-control">{{$task->description}}</textarea>
                </div>
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" required>
                            <option value="new" @if($task->status == 'new') SELECTED="selected" @endif>New</option>
                            <option value="progress" @if($task->status == 'progress') SELECTED="selected" @endif>Progress</option>
                            <option value="completed" @if($task->status == 'completed') SELECTED="selected" @endif>Completed</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Due date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="due_date" value="{{$task->due_date}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="type" required>
                            <option value="call" @if($task->type == 'call') SELECTED="selected" @endif>Call</option>
                            <option value="meeting" @if($task->type == 'meeting') SELECTED="selected" @endif>Meeting</option>
                            <option value="task" @if($task->type == 'task') SELECTED="selected" @endif>Task</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{route('crm.level.index')}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
