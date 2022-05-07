@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Symbols</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Symbols</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Exchange</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th style="width: 60px">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($symbols as $symbol)
                <tr>
                    <td>{{$symbol->exchange->name}}</td>
                    <td>{{$symbol->name}}</td>
                    <td>{{$symbol->description}}</td>
                    <td>{{$symbol->code}}</td>
                    <td>{{$symbol->type}}</td>
                    <td>
                        <div class="btn-group">
                            <a type="button" class="btn btn-info" href="{{route('crm.symbol.edit', ['symbol' => $symbol->id])}}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('crm.symbol.destroy', ['symbol' => $symbol->id]) }}" method="POST">
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
            {{ $symbols->links() }}
        </div>
        <a type="button" class="btn btn-info" href="{{route('crm.symbol.create')}}">
            <i class="fas fa-plus"></i>
        </a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
