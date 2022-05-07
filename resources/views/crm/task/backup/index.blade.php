@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>CRM - AGENTS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tasks</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>User Name</th> --}}
                    <th>Created User</th>
                    <th>Owner User</th>
                    <th>Due Date</th>
                    <th style="width: 40px">Description</th>
                    <th style="width: 40px">Status</th>
                    <th style="width: 40px">Type</th>
                    <th style="width: 40px">Created at</th>
                    <th style="width: 60px">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tasks as $task)
                <tr>
                    <td><b>{{$task->user->name}}</b><br/>
                        {{$task->user->email}}
                    </td>
                    <td>{{$task->ownuser->name}}</td>
                    <td>{{$task->due_date}}</td>
                    <td>
                        {{$task->description}}
                    </td>
                    <td>
                        {{$task->status}}
                    </td>
                    <td>
                        {{$task->type}}
                    </td>
                    <td>
                       {{$task->created_at}}
                       <td>
                        <div class="btn-group">

                            <a type="button" class="btn btn-info" href="{{route('crm.task.edit',['task' => $task->id])}}"><i class="fas fa-pen"></i></a>
                            <form action="{{route('crm.task.destroy',['task' => $task->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>                            
                            {{--                            <button type="button" class="btn btn-info">--}}
                                {{--                                <i class="fas fa-pen"></i>--}}
                            {{--                            </button>--}}
                            {{--                            <button type="button" class="btn btn-danger">--}}
                                {{--                                <i class="fas fa-trash"></i>--}}
                            {{--                            </button>--}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{--            <ul class="pagination pagination-sm m-0 float-right">--}}
            {{--                <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
        {{--            </ul>--}}
        {{ $tasks->links() }}
    </div>

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
