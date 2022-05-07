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
            <table class="table table-bordered" id="lead_table">
                <thead>
               <tr>
                        <th>User ID</th>
                        <th>Affliate Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>IP Address</th>
                        <th>Phone</th>
                        <th>External ID</th>
                        <th>Lead status</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

                <tbody>


                @foreach ($leads as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->affiliateuser->name}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->country}}</td>
                    <td> {{$user->email }} </td>
                    <td> {{$user->ip_address }} </td>
                    <td>{{ $user->phone }}</td>
                   <td>{{ $user->external_id }}</td>
                   <td>{{ $user->lead_status }}</td>
{{--                     <td>
                        <div class="btn-group">
                            <a type="button" class="btn btn-info" href="{{route('employee.create',$user->id)}}"><i class="fas fa-pen"></i>+User</a>

                            {{-- <form action="{{ route('crm.symbol.destroy', ['symbol' => $symbol->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form> --}}
{{--                            <button type="button" class="btn btn-info">--}}
{{--                                <i class="fas fa-pen"></i>--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-danger">--}}
{{--                                <i class="fas fa-trash"></i>--}}
{{--                            </button>--}}
                        {{-- </div> --}}
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
            {{-- {{ $leads->links() }} --}}
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
    $("#lead_table").DataTable({
         "scrollX": false,
        "ScrollY": false

    });
</script>

@stop
