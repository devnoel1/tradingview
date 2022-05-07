@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Levels</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Levels</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Forex</th>
                    <th>Commodities</th>
                    <th>Indices</th>
                    <th>Stock</th>
                    <th>Crypto</th>
                    <th style="width: 60px">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($levels as $level)
                <tr>
                    <td>{{$level->name}}</td>
                    <td>{{$level->forex_order_fee}}</td>
                    <td>{{$level->commodities_order_fee}}</td>
                    <td>{{$level->indices_order_fee}}</td>
                    <td>{{$level->stock_order_fee}}</td>
                    <td>{{$level->crypto_order_fee}}</td>
                    <td>
                        <div class="btn-group">
                            <a type="button" class="btn btn-info" href="{{route('crm.level.edit', ['level' => $level->id])}}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('crm.level.destroy', ['level' => $level->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
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
            {{ $levels->links() }}
        </div>
        <a type="button" class="btn btn-info" href="{{route('crm.level.create')}}">
            <i class="fas fa-plus"></i>
        </a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
