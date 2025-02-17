@extends('layouts.app')
@section('page-title')
    {{__('General Settings')}}
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
            <a href="#">{{__('General Settings')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{Form::model($settings, array('route' => array('setting.general'), 'method' => 'post', 'enctype' => "multipart/form-data")) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('application_name',__('Application Name'),array('class'=>'form-label'))}}
                                {{Form::text('application_name',!empty($settings['app_name'])?$settings['app_name']:env('APP_NAME'),array('class'=>'form-control','placeholder'=>__('Enter your application name'),'required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('logo',__('Logo'),array('class'=>'form-label'))}}
                                {{Form::file('logo',array('class'=>'form-control'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('favicon',__('Favicon'),array('class'=>'form-label'))}}
                                {{Form::file('favicon',array('class'=>'form-control'))}}
                            </div>
                        </div>
                        @if(\Auth::user()->type=='super admin')
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('landing_logo',__('Landing Page Logo'),array('class'=>'form-label'))}}
                                    {{Form::file('landing_logo',array('class'=>'form-control'))}}
                                </div>
                            </div>

                        @endif
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

