@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Leads</h1>

    
@stop
    <link   href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Leads</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" id="affiliate_user_table">
                <thead>
                <tr>
                    	<th>User Id</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

                <tbody>


                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->userProfile->country}}</td>
                    <td> {{$user->email }} </td>
                    <td>{{ $user->userProfile->phone_number }}</td>
                             
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
           {{-- {{ $users->links() }} --}}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $("#affiliate_user_table").DataTable({});
</script>

@stop
