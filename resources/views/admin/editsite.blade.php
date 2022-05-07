@extends('admin.layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card mb-3">
                        <h5 class="card-header">Edit Site</h5>
                        <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin/websites/edit/{{$siteEdit->id}}">
                        {{ csrf_field() }}

                        @if(Session::has('success_msg'))
                            <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                        @endif
                        @if(Session::has('error_msg'))
                            <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                        @endif
                        
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-4 control-label">URL</label>

                            <div class="col-md-12">
                                <input id="url" type="text" class="form-control" name="url" value="{{ $siteEdit->url }}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('credits') ? ' has-error' : '' }}">
                            <label for="credits" class="col-md-4 control-label">Credits</label>

                            <div class="col-md-12">
                                <input id="credits" type="text" class="form-control" name="credits" value="{{ $siteEdit->credits }}">

                                @if ($errors->has('credits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('credits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-12">
                                <select class="form-control" id="status" name="status">
                                    <option value="0" {{$siteEdit->status == '0'  ? 'selected' : ''}}>Active</option>
                                    <option value="1" {{$siteEdit->status == '1'  ? 'selected' : ''}}>Inactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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
