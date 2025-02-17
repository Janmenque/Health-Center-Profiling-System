@extends('layouts.auth')

@php
    $settings = settings();
    $registerPage = getSettingsValByName('register_page');
@endphp

@section('tab-title')
    {{ __('Login') }}
@endsection

@push('script-page')
    @if ($settings['google_recaptcha'] == 'on')
        {!! NoCaptcha::renderJs() !!}
    @endif
@endpush

@section('content')
    <style>
        /* Background Image for the whole page */
        body {
            background-image: url("1.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }

        /* Additional styling for your login container */
        .codex-authbox {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background to make the text readable */
            padding: 40px;
            border-radius: 8px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .auth-header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .auth-header h3 {
            font-size: 2rem;
        }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        .auth-footer h6 a {
            color: #3498db;
        }
    </style>

    <div class="codex-authbox">
        <div class="auth-header">
            <div class="codex-brand">
                <a href="#">
                    <img class="img-fluid light-logo" src="{{ asset(Storage::url('upload/logo/')) . '/logo.png' }}" alt="">
                    <img class="img-fluid dark-logo" src="{{ asset(Storage::url('upload/logo/')) . '/logo.png' }}" alt="">
                </a>
            </div>
            <h3>{{ __('Welcome to') }} {{ env('APP_NAME') }}</h3>
        </div>

        {{ Form::open(array('route' => 'login', 'method' => 'post', 'id' => 'loginForm', 'class' => 'login-form')) }}
        <div class="form-group">
            {{ Form::label('email', __('Email'), array('class' => 'form-label')) }}
            {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => __('Enter Your Email'))) }}
            @error('email')
                <span class="invalid-email text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="Password">{{ __('Password') }}</label>
            <div class="input-group group-input">
                <input class="form-control showhide-password" type="password" name="password" id="Password" placeholder="{{ __('Enter Your Password') }}" required>
                <span class="input-group-text toggle-show fa fa-eye"></span>
            </div>
            @error('password')
                <span class="invalid-password text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-0">
            <div class="auth-remember">
                <div class="form-check custom-chek">
                    <input class="form-check-input" id="agree" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="agree">{{ __('Remember me') }}</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-primary f-pwd" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
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

        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> {{ __('Login') }}</button>
        </div>

        {{ Form::close() }}

        <div class="auth-footer">
            @if ($registerPage == 'on')
                <h6 class="text-center">{{ __("Don't Have An Account?") }} <a class="text-primary" href="{{ route('register') }}">{{ __('Create an account') }}</a></h6>
            @endif
        </div>
    </div>
@endsection
