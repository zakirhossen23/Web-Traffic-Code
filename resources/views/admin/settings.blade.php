@extends('admin.layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
            <div class="col-12 col-lg-6">
                    <div class="card mb-3">
                        <h5 class="card-header">General Settings</h5>
                        <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin/settings">
                        {{ csrf_field() }}

                        @if(Session::has('success_msg'))
                            <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                        @endif
                        @if(Session::has('error_msg'))
                            <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                        @endif

                        <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
                            <label for="site_name" class="col-md-4 control-label">Site Title</label>

                            <div class="col-md-12">
                                <input id="site_name" type="text" class="form-control" name="site_name" value="{{ $site->site_name }}">

                                @if ($errors->has('site_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('site_description') ? ' has-error' : '' }}">
                            <label for="site_description" class="col-md-4 control-label">Site Description</label>

                            <div class="col-md-12">
                                <input id="site_description" type="text" class="form-control" name="site_description" value="{{ $site->site_description }}">

                                @if ($errors->has('site_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('site_url') ? ' has-error' : '' }}">
                            <label for="site_url" class="col-md-4 control-label">Site URL</label>

                            <div class="col-md-12">
                                <input id="site_url" type="text" class="form-control" name="site_url" value="{{ $site->site_url }}">

                                @if ($errors->has('site_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('site_email') ? ' has-error' : '' }}">
                            <label for="site_email" class="col-md-4 control-label">Site Email</label>

                            <div class="col-md-12">
                                <input id="site_email" type="email" class="form-control" name="site_email" value="{{ $site->site_email }}">

                                @if ($errors->has('site_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('reg_credits') ? ' has-error' : '' }}">
                            <label for="reg_credits" class="col-md-4 control-label">Credits on Signup</label>

                            <div class="col-md-12">
                                <input id="reg_credits" type="text" class="form-control" name="reg_credits" value="{{ $site->reg_credits }}">

                                @if ($errors->has('reg_credits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reg_credits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>

            <div class="col-12 col-lg-6">
                    <div class="card mb-3">
                        <h5 class="card-header">Referral Settings</h5>
                        <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin/settings">
                        {{ csrf_field() }}

                        @if(Session::has('ref_success_msg'))
                            <p class="alert alert-success">{{ Session::get('ref_success_msg') }}</p>
                        @endif
                        @if(Session::has('ref_error_msg'))
                            <p class="alert alert-danger">{{ Session::get('ref_error_msg') }}</p>
                        @endif

                        <div class="form-group{{ $errors->has('ref_credits') ? ' has-error' : '' }}">
                            <label for="ref_credits" class="col-md-4 control-label">Credits per Referral</label>

                            <div class="col-md-12">
                                <input id="ref_credits" type="text" class="form-control" name="ref_credits" value="{{ $site->ref_credits }}">

                                @if ($errors->has('ref_credits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ref_credits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h5 class="card-header">Surf Settings</h5>
                        <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin/settings">
                        {{ csrf_field() }}

                        @if(Session::has('surf_success_msg'))
                            <p class="alert alert-success">{{ Session::get('surf_success_msg') }}</p>
                        @endif
                        @if(Session::has('surf_error_msg'))
                            <p class="alert alert-danger">{{ Session::get('surf_error_msg') }}</p>
                        @endif

                        <div class="form-group{{ $errors->has('surf_time') ? ' has-error' : '' }}">
                            <label for="surf_time" class="col-md-4 control-label">Auto-surf time (seconds)</label>

                            <div class="col-md-12">
                                <input id="surf_time" type="text" class="form-control" name="surf_time" value="{{ $site->surf_time }}">

                                @if ($errors->has('surf_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surf_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i> Save Changes
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
