@extends('layouts.app')
@section('page-title')
    {{__('Google ReCaptcha Settings')}}
@endsection
@php
    $settings=settings();
@endphp
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Payment Settings')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{Form::model($settings, array('route' => array('setting.google.recaptcha'), 'method' => 'post')) }}
                    <div class="row mt-2">
                        <div class="col-auto">
                            {{Form::label('google_recaptcha',__('Google ReCaptch Enable'),array('class'=>'form-label')) }}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check custom-chek">
                                    <input class="form-check-input" type="checkbox" name="google_recaptcha" id="google_recaptch" {{ $settings['google_recaptcha'] == 'on' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::label('recaptcha_key',__('Recaptcha Key'),array('class'=>'form-label')) }}
                            {{Form::text('recaptcha_key',$settings['recaptcha_key'],['class'=>'form-control','placeholder'=>__('Enter recaptcha key')])}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('recaptcha_secret',__('Recaptcha Secret'),array('class'=>'form-label')) }}
                            {{Form::text('recaptcha_secret',$settings['recaptcha_secret'],['class'=>'form-control ','placeholder'=>__('Enter recaptcha secret')])}}
                        </div>
                    </div>

                    <div class="text-right">
                        {{Form::submit(__('Save'),array('class'=>'btn btn-primary btn-rounded'))}}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

