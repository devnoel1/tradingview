@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Email</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Email</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">User</dt>
                <dd class="col-sm-8">{{$email->user->email}}</dd>
                <dt class="col-sm-4">CC</dt>
                <dd class="col-sm-8">{{$email->cc_address}}</dd>
                <dt class="col-sm-4">BCC</dt>
                <dd class="col-sm-8">{{$email->bcc_address}}</dd>
                <dt class="col-sm-4">Subject</dt>
                <dd class="col-sm-8">{{$email->subject}}</dd>
                <dt class="col-sm-4">Message</dt>
                <dd class="col-sm-8">{{$email->message}}</dd>
                <dt class="col-sm-4">Created</dt>
                <dd class="col-sm-8">{{$email->created_at}}</dd>
            </dl>
        </div>
        <div class="card-footer">

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
