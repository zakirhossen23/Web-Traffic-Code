@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    @if(Session::has('success_msg'))
                        <p class="alert alert-success">{{ Session::get('success_msg') }}</p>
                    @endif
                    <div class="card mb-3">
                        <h5 class="card-header">Contact Us</h5>
                        <div class="card-body">
                        <form method="POST" action="{{ url('/contact') }}">
                            {{ csrf_field() }}
                            
                            <input type="hidden" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <span class="form-text invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}">
                                @if ($errors->has('subject'))
                                    <span class="form-text invalid-feedback">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="7" placeholder="Message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="form-text invalid-feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
							<div class="row form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
								<div class="col-md-12">
										{!! NoCaptcha::renderJs() !!}
						            	{!! NoCaptcha::display() !!}
									@if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Send</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection