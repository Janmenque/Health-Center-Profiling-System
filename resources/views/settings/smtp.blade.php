@extends('layouts.app')
@section('page-title')
    {{__('SMTP Settings')}}
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
            <a href="#">{{__('SMTP Settings')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{Form::model($settings, array('route' => array('setting.smtp'), 'method' => 'post')) }}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::label('sender_name',__('Sender Name'),array('class'=>'form-label')) }}
                            {{Form::text('sender_name',$settings['FROM_NAME'],array('class'=>'form-control','placeholder'=>__('Enter sender name')))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('sender_email',__('Sender Email'),array('class'=>'form-label')) }}
                            {{Form::text('sender_email',$settings['FROM_EMAIL'],array('class'=>'form-control','placeholder'=>__('Enter sender email')))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('server_driver',__('SMTP Driver'),array('class'=>'form-label')) }}
                            {{Form::text('server_driver',$settings['SERVER_DRIVER'],array('class'=>'form-control','placeholder'=>__('Enter smtp driver')))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('server_host',__('SMTP Host'),array('class'=>'form-label')) }}
                            {{Form::text('server_host',$settings['SERVER_HOST'],array('class'=>'form-control ','placeholder'=>__('Enter smtp host')))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('server_username',__('SMTP Username'),array('class'=>'form-label')) }}
                            {{Form::text('server_username',$settings['SERVER_USERNAME'],array('class'=>'form-control','placeholder'=>__('Enter smtp username')))}}

                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('server_password',__('SMTP Password'),array('class'=>'form-label')) }}
                            {{Form::text('server_password',$settings['SERVER_PASSWORD'],array('class'=>'form-control','placeholder'=>__('Enter smtp password')))}}

                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('server_encryption',__('SMTP Encryption'),array('class'=>'form-label')) }}
                            {{Form::text('server_encryption',$settings['SERVER_ENCRYPTION'],array('class'=>'form-control','placeholder'=>__('Enter smtp encryption')))}}

                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('server_port',__('SMTP Port'),array('class'=>'form-label')) }}
                            {{Form::text('server_port',$settings['SERVER_PORT'],array('class'=>'form-control','placeholder'=>__('Enter smtp port')))}}

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

