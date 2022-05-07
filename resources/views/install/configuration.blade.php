@extends('install.layout')

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger fade in alert-dismissable">
            {{ session('error') }}
        </div>
    @endif

    <h2>2. Configuration</h2>

    <form method="POST" action="{{ url('install/configuration') }}" class="form-horizontal">
        {{ csrf_field() }}

        <div class="box">s
            <p>Please enter your database connection details.</p>

            <div class="configure-form">
                <div class="form-group {{ $errors->has('db[host]') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="host">Host <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="db[host]" value="{{ old('db[host]', '127.0.0.1') }}" id="host" class="form-control" autofocus>

                        {!! $errors->first('db[host]', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('db[port]') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="port">Port <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="db[port]" value="{{ old('db[port]', '3306') }}" id="port" class="form-control">

                        {!! $errors->first('db[port]', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('db[username]') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="db-username">DB Username <span>*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="db[username]" value="{{ old('db[username]') }}" id="db-username" class="form-control">

                        {!! $errors->first('db[username]', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="db-password">DB Password</label>

                    <div class="col-sm-9">
                        <input type="password" name="db[password]" value="{{ old('db[password]') }}" id="db-password" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('db[database]') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="database">Database <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="db[database]" value="{{ old('db[database]') }}" id="database" class="form-control">

                        {!! $errors->first('db[database]', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <p>Please enter a username and password for the administration.</p>

            <div class="configure-form">
                <div class="form-group {{ $errors->has('admin.name') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="admin-name">Full Name <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="admin[name]" value="{{ old('admin.name') }}" id="admin-name" class="form-control">

                        {!! $errors->first('admin.name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('admin.email') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="admin-email">Email <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="admin[email]" value="{{ old('admin.email') }}" id="admin-email" class="form-control">

                        {!! $errors->first('admin.email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('admin.username') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="admin-username">Username <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="admin[username]" value="{{ old('admin.username') }}" id="admin-username" class="form-control">

                        {!! $errors->first('admin.username', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('admin.password') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="admin-password">Password <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="password" name="admin[password]" id="admin-password" class="form-control">

                        {!! $errors->first('admin.password', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="admin-confirm-password">Confirm Password <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="password" name="admin[password_confirmation]" id="admin-confirm-password" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <div class="box">
            <p>Please enter your site details.</p>

            <div class="configure-form p-b-0">
                <div class="form-group {{ $errors->has('site.site_name') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="site-name">Site Name <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="site[site_name]" value="{{ old('site.site_name') }}" id="site-name" class="form-control">

                        {!! $errors->first('site.site_name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('site.site_description') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="site-description">Site Description <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="site[site_description]" value="{{ old('site.site_description') }}" id="site-description" class="form-control">

                        {!! $errors->first('site.site_description', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('site.site_url') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="site-url">Site URL <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="url" name="site[site_url]" value="{{ old('site.site_url') }}" id="site-url" class="form-control">

                        {!! $errors->first('site.site_url', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>


                <div class="form-group {{ $errors->has('site.site_email') ? 'has-error': '' }}">
                    <label class="control-label col-sm-3" for="site-email">Site Email <span>*</span></label>

                    <div class="col-sm-9">
                        <input type="text" name="site[site_email]" value="{{ old('site.site_email') }}" id="site-email" class="form-control">

                        {!! $errors->first('site.site_email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

            </div>
        </div>

        <div class="content-buttons clearfix">
            <button type="submit" class="btn btn-primary pull-right install-button">Install</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#store-search-engine').on('change', function () {
            $('#algolia-fields').toggleClass('hide');
        });

        $('.install-button').on('click', function (e) {
            var button = $(e.currentTarget);

            button.data('loading-text', button.html())
                .addClass('btn-loading')
                .button('loading');
        });
    </script>
@endpush
