@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Deposits</h1>
@stop
    <link   href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Deposits</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" id="deposit_table">
                <thead>
               <tr>
                        <th>User Name</th>
                        <th>Wellet ID</th>
                        <th>Amount</th>
                        <th>Action</th>
                        <th>Approved</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

                <tbody>


                @foreach ($deposits as $users)
                @foreach($users->deposituser as $user)
                <tr> <td>{{$users->name}}</td>
                    <!--<td>{{$user->id}}</td>-->
                    <td>{{$user->wallet_id}}</td>
                    <td>{{$user->amount}}</td>
                    <td>{{$user->action}}</td>
                    <td> {{$user->approved }} </td>
                    <td>{{ $user->created_at }}</td>
                   <td>{{ $user->updated_at }}</td>
                </tr>
                @endforeach

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
            {{-- {{ $deposits->links() }} --}}
        </div>
       {{--  <a type="button" class="btn btn-info" href="{{route('crm.symbol.create')}}">
            <i class="fas fa-plus"></i>
        </a> --}}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $("#deposit_table").DataTable({});
</script>

@stop