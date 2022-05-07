@extends('layouts.main')
@section('headerfile')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>CRM-Agents
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                        Inbox
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                        Book
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                        Picture
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                        File Disabled
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{ $error }}
    </div>
    @endforeach
    @endif

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Create a New Agent</h5>
            <form class="" autocompelte="off" method="POST" action="{{ route('crm.agent.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleEmail11" class="">First Name</label>
                            <input name="name" id="exampleEmail11" placeholder="Enter First Name" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="examplePassword11" class="">Last Name</label>
                            <input name="lastname" id="examplePassword11" placeholder="Enter Last Name" type="text"
                                class="form-control">
                        </div>
                    </div>

                </div>
                <div class="form-row">

                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Role</label>
                            <select name="role" class="form-control">
                                <option hidden>Select Role</option>
                                <option value="Retension">Retension</option>
                                <option value="Conversion">Conversion</option>
                                <option value="Complains">Complains</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleState" class="">Password</label>
                            <input name="password" type="text" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleState" class="">White list IP Address</label>
                            <input name="ip" type="text" class="form-control" Placeholder="Enter IP Address" />
                        </div>
                    </div>
                </div>
                <button class="mt-2 btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footerfile')
@endsection