@extends('admin.layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card mb-3">
                        <h5 class="card-header">Add new User</h5>
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/users/add') }}">
                            {{ csrf_field() }}

                            @if(Session::has('success_msg'))
                                <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                            @endif
                            @if(Session::has('error_msg'))
                                <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                            @endif
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('credits') ? ' has-error' : '' }}">
                                <label for="credits" class="col-md-4 control-label">Credits</label>

                                <div class="col-md-6">
                                    <input id="credits" type="number" class="form-control" name="credits" value="{{ old('credits') }}">

                                    @if ($errors->has('credits'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('credits') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('newpass'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('userlevel') ? ' has-error' : '' }}">
                                <label for="userlevel" class="col-md-4 control-label">User Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="userlevel" name="userlevel">
                                        <option>User</option>
                                        <option>Admin</option>
                                    </select>
                                    @if ($errors->has('userlevel'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('userlevel') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                                <label for="active" class="col-md-4 control-label">Status</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="active" name="active">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('active') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
