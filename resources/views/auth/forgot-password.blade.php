@extends('layouts.auth')
@php
    $settings=settings();
@endphp
@section('tab-title')
    {{__('Reset Password')}}
@endsection
@push('script-page')
    @if ($settings['google_recaptcha'] == 'on')
        {!! NoCaptcha::renderJs() !!}
    @endif
@endpush
@section('content')
    <div class="codex-authbox">
        <div class="auth-header">
            <div class="codex-brand">
                <a href="#">
                    <img class="img-fluid light-logo" src="{{asset(Storage::url('upload/logo/')).'/logo.png'}}" alt="">
                    <img class="img-fluid dark-logo" src="{{asset(Storage::url('upload/logo/')).'/logo.png'}}" alt="">
                </a>
            </div>
            <h3>{{__('forgot password ?')}}</h3>
            <p>{{__('Enter Your Email And Well Send You A Link To Reset')}} <br> {{__('Your Password.')}}</p>
        </div>

        @if (session('status'))
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
        @endif
        {{Form::open(array('route'=>'password.email','method'=>'post','id'=>'loginForm'))}}
        <div class="form-group mb-0">
            {{Form::label('email',__('Email'),['class'=>'form-label'])}}
            {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter your email')))}}
            @error('email')
            <span class="invalid-email text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @if ($settings['google_recaptcha'] == 'on')
            <div class="form-group">
                <label for="email" class="form-label"></label>
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                <span class="small text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
        @endif
        <div class="form-group mb-0">
            <button class="btn btn-primary" type="submit"><i class="fa fa-key"></i> {{__('Send Reset Link')}}</button>
        </div>
        <div class="auth-footer">
            <h6 class="text-center">{{__('Back to')}} <a class="text-primary" href="{{ route('login') }}">{{__('Log In')}}</a></h6>
        </div>
        {{Form::close()}}
    </div>
@endsection

