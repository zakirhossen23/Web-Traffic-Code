@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card mb-3">
                        <h5 class="card-header">Settings</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="/settings/account">Account</a></li>
                            <li class="list-group-item"><a href="/settings/billing">Billing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="card mb-3">
                        <h5 class="card-header">Account</h5>
                        <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/settings/account') }}">
                            {{ csrf_field() }}

                            @if(Session::has('success_msg'))
                                <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                            @endif
                            @if(Session::has('error_msg'))
                                <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                            @endif

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <span class="form-text invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('curpass') ? ' has-error' : '' }}">
                                <label for="curpass">Current Password</label>
                                <input type="password" class="form-control" id="curpass" name="curpass" value="">
                                @if ($errors->has('curpass'))
                                    <span class="form-text invalid-feedback">
                                        <strong>{{ $errors->first('curpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="newpass">New Password</label>
                                <input type="password" class="form-control {{ $errors->has('newpass') ? ' is-invalid' : '' }}" id="newpass" name="newpass" value="">
                                @if ($errors->has('newpass'))
                                    <span class="form-text invalid-feedback">
                                        <strong>{{ $errors->first('newpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Changes</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
