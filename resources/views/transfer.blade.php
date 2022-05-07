@extends('layouts.app')

@section('title', 'Transfers')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
            <div class="col-12 col-lg-9">
                <div class="card mb-3">
                    <h5 class="card-header">Transfer Credits</h5>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/transfer') }}">
                            {{ csrf_field() }}

                            @if(Session::has('success_msg'))
                                <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                            @endif
                            @if(Session::has('error_msg'))
                                <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                            @endif
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('credits') ? ' has-error' : '' }}">
                                <label for="credits">Credits</label>
                                <input type="text" class="form-control" id="credits" name="credits" placeholder="{{ Auth::user()->credits }}" value="{{ old('credits') }}">
                                @if ($errors->has('credits'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('credits') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Send</button>
                        </form>
                    </div>
                </div>
            </div>
                <div class="col-12">
                    <div class="card mb-3">
                        <h5 class="card-header">Transfer history</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Sender</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transfers as $data)
                                        <tr>
                                            <td> {{$data->id}} </td>
                                            @if ($data->receiver != Auth::user()->id)
                                                <td> <i class="fas fa-arrow-up" style="color:red"></i></td>
                                            @else
                                                <td> <i class="fas fa-arrow-down" style="color:green"></i> </td>
                                            @endif
                                
                                            <td> {{$data->sender}} </td>
                                            <td> {{number_format($data->credits, 2)}} credits</td>
                                            <td> {{$data->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
