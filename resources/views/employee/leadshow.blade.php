@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRM - Account</h1>
@stop
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update lead</h3>
        </div>
        <form class="form-horizontal" method="POST" action="{{route('employee.update_lead_status', $lead->id)}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                	<input type="hidden" name="lead_id" value="{{$lead->id}}">
                </div>
                    {{$lead->first_name}} {{$lead->last_name}}<br/>
                    {{$lead->email}}<br/>
                    {{$lead->phone}}<br/>
                    {{$lead->country}}<br/>
                    {{$lead->external_id}}<br/>
                    {{$lead->created_at}}<br/>
                    {{$lead->updated_at}}<br/>
                    {{$lead->user_status}}<br/>
                    {{$lead->comment}}<br/>
                  <hr/>
                <div class="form-group row">
                    <label for="lead_status" class="col-sm-2 col-form-label">status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="lead_status" required>
                            <option value="unknown" {{ ( $lead->lead_status == 'unknown') ? 'selected' : '' }}>Unknown</option>
                            <option value="FTD" {{ ( $lead->lead_status == 'FTD') ? 'selected' : '' }}>FTD</option>
                            <option value="CB" {{ ( $lead->lead_status == 'CB') ? 'selected' : '' }}>CB</option>
                            <option value="NA" {{ ( $lead->lead_status == 'NA') ? 'selected' : '' }}>NA</option>
                            <option value="High potential" {{ ( $lead->lead_status == 'High potential') ? 'selected' : '' }}>High potential</option>
                            <option value="Low potential" {{ ( $lead->lead_status == 'Low potential') ? 'selected' : '' }}>Low potential</option>
                        </select>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{route('employee.leads')}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@stop
