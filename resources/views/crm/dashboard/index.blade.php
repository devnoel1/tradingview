@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <style>
   

@-ms-viewport {
  width: device-width;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

dfn {
  font-style: italic;
}

strong {
  font-weight: bolder;
}

caption {
  padding-top: 1rem;
  padding-bottom: 1rem;
  caption-side: bottom;
  text-align: left;
  color: #8898aa;
}

button {
  border-radius: 0;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}

input,
button {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
  margin: 0;
}

button,
input {
  overflow: visible;
}

button {
  text-transform: none;
}

button,
[type='reset'],
[type='submit'] {
  -webkit-appearance: button;
}

button::-moz-focus-inner,
[type='button']::-moz-focus-inner,
[type='reset']::-moz-focus-inner,
[type='submit']::-moz-focus-inner {
  padding: 0;
  border-style: none;
}

input[type='radio'],
input[type='checkbox'] {
  box-sizing: border-box;
  padding: 0;
}

input[type='date'],
input[type='time'],
input[type='datetime-local'],
input[type='month'] {
  -webkit-appearance: listbox;
}

[type='number']::-webkit-inner-spin-button,
[type='number']::-webkit-outer-spin-button {
  height: auto;
}

[type='search'] {
  outline-offset: -2px;
  -webkit-appearance: none;
}

[type='search']::-webkit-search-cancel-button,
[type='search']::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

[hidden] {
  display: none !important;
}
.bg-info {
  background-color: #11cdef !important;
}
.bg-warning {
  background-color: #fb6340 !important;
}
.bg-danger {
  background-color: #f5365c !important;
}

.bg-default {
  background-color: #172b4d !important;
}


.rounded-circle {
  border-radius: 50% !important;
}

.align-items-center {
  align-items: center !important;
}



.shadow {
  box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.mb-0 {
  margin-bottom: 0 !important;
}

.mr-2 {
  margin-right: .5rem !important;
}

.mt-3 {
  margin-top: 1rem !important;
}

.mb-4 {
  margin-bottom: 1.5rem !important;
}

.mb-5 {
  margin-bottom: 3rem !important;
}

.pt-5 {
  padding-top: 3rem !important;
}

.pb-8 {
  padding-bottom: 8rem !important;
}

.m-auto {
  margin: auto !important;
}


.text-nowrap {
  white-space: nowrap !important;
}

.text-center {
  text-align: center !important;
}

.text-uppercase {
  text-transform: uppercase !important;
}

.font-weight-bold {
  font-weight: 600 !important;
}

.text-white {
  color: #fff !important;
}

.text-success {
  color: #2dce89 !important;
}



.text-warning {
  color: #fb6340 !important;
}



.text-danger {
  color: #f5365c !important;
}



.text-white {
  color: #fff !important;
}



.text-muted {
  color: #8898aa !important;
}


  
  p,
  h2 {
    orphans: 3;
    widows: 3;
  }
  h2 {
    page-break-after: avoid;
  }
figcaption,
main {
  display: block;
}

main {
  overflow: hidden;
}

.bg-yellow {
  background-color: #ffd600 !important;
}


.bg-gradient-primary {
  background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}

.bg-gradient-primary {
  background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}


[class*='shadow'] {
  transition: all .15s ease;
}

.text-sm {
  font-size: .875rem !important;
}

.text-white {
  color: #fff !important;
}

[class*='btn-outline-'] {
  border-width: 1px;
}

.card-stats .card-body {
  padding: 1rem 1.5rem;
}

.main-content {
  position: relative;
}


.header {
  position: relative;
}

.icon {
  width: 3rem;
  height: 3rem;
}

.icon i {
  font-size: 2.25rem;
}

.icon-shape {
  display: inline-flex;
  padding: 12px;
  text-align: center;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
}

.icon-shape i {
  font-size: 1.25rem;
}


p {
  font-size: 1rem;
  font-weight: 300;
  line-height: 1.7;
}

  </style>
@if(Auth::user()->type == 'admin')
    <h1>CRM-Dashboard</h1> 
    @endif
@stop

@section('content')
@if(Auth::user()->type=='admin')
    <p>Open tasks</p>
@endif
@if(Auth::user()->type=='affiliate')

          <div class="row">
            <div class="col-md-3 col-xl-3 col-xs-12 col-sm-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Leads</h5>
                      @if(strlen(leads())<5)
                      <br>
                          @endif
                      <span class="h2 font-weight-bold mb-0">{{leads()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xl-3 col-xs-12 col-sm-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                      @if(strlen(users())<5)
                      <br>
                          @endif
                      <span class="h2 font-weight-bold mb-0">{{users()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
                        <div class="col-md-3 col-xl-3 col-xs-12 col-sm-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Deposits</h5>
                       @if(strlen(deposits())<5)
                      <br>
                          @endif
                      <span class="h2 font-weight-bold mb-0">{{deposits()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xl-3 col-xs-12 col-sm-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Conversion</h5>
                       @if(strlen(conversionrate())<5)
                      <br>
                          @endif
                      <span class="h2 font-weight-bold mb-0">{{conversionrate()}}%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            </div>
        @endif
    @if(count($identifications) > 0)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Identification recieved</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Account</th>
                    <th>Country</th>
                    <th style="width: 40px">Identified</th>
                    <th style="width: 60px">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($identifications as $identification)
                    <tr>
                        <td><b>{{$identification->user->name}}</b><br/>
                            {{$identification->user->email}}
                        </td>
                        <td>{{$identification->country}}</td>
                        <td>
                            @if ($identification->identified)
                                <span class="badge bg-green">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-info" href="{{route('crm.account.identification.show', ['account' => $identification->id])}}">
                                    <i class="fas fa-eye"></i>
                                </a>
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

        </div>
    </div>
    @endif
    @if(count($balance) > 0)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Open Balance Transactions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th>Action</th>
                      <th>Client ID</th>
                     
                        <th>Account</th>
                      <th>Verified</th>
                      <th>Agent</th>
                       <th>Amount</th>
                       <th>Turnover Status</th>
                        <th>Type</th>
                        <th>Wallet</th>
                       
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($balance as $transaction)
                        <tr>
                           <td>
                                <div class="btn-group">
                                    <a type="button" class="btn btn-info" href="{{route('crm.balance.show', ['balance' => $transaction->id])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                          <td>{{$transaction->user->id}}</td>
                            <td><b>{{$transaction->user->name}}</b><br/>
                                {{$transaction->user->email}}
                            </td>
                            @if($transaction->approved == "0") 
                            <td>Not</td>
                            @elseif($transaction->approved == "1") 
                            <td>Fully</td>
                            @elseif($transaction->approved == "2") 
                            <td>Partial</td>
                            @endif
                            <td>{{$transaction->user->name}}</td>
                          
                            <td>{{$transaction->amount}}</td>
                            <td></td>
                            @if($transaction->action=="payout")
                                <td>Withdrawal</td>
                              @else
                          <td>Deposit</td>
                          @endif
                            <td>{{$transaction->wallet->name}}</td>
                           
                          
                           
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

            </div>
        </div>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
