@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User - &#x40;{{ $website->id }}</div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="/websites/edit/{{$website->id}}">
                        {{ csrf_field() }}

                        @if(Session::has('success_msg'))
                            <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                        @endif
                        @if(Session::has('error_msg'))
                            <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                        @endif
                        
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-4 control-label">URL</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control" name="url" value="{{ $website->url }}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('credits') ? ' has-error' : '' }}">
                            <label for="credits" class="col-md-4 control-label">credits</label>

                            <div class="col-md-6">
                                <input id="credits" type="number" class="form-control" name="credits" value="{{ $website->credits }}">

                                @if ($errors->has('credits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('credits') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <select class="form-control" id="status" name="status">
                                    <option value="0" {{$website->status == '0'  ? 'selected' : ''}}>Active</option>
                                    <option value="1" {{$website->status == '1'  ? 'selected' : ''}}>Inactive</option>
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
@endsection
