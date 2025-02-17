@extends('layouts.app')
@section('page-title')
    {{__('Account Settings')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Account Settings')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 cdx-xxl-100 cdx-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="info-group">
                        {{Form::model($loginUser, array('route' => array('setting.account'), 'method' => 'post', 'enctype' => "multipart/form-data")) }}
                        <div class="row">
                            @if(\Auth::user()->type=='super admin')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{Form::label('first_name',__('Name'),array('class'=>'form-label'))}}
                                        {{Form::text('first_name',null,array('class'=>'form-control','placeholder'=>__('Enter your name'),'required'=>'required'))}}
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{Form::label('first_name',__('First Name'),array('class'=>'form-label'))}}
                                        {{Form::text('first_name',null,array('class'=>'form-control','placeholder'=>__('Enter your first name'),'required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{Form::label('last_name',__('Last Name'),array('class'=>'form-label'))}}
                                        {{Form::text('last_name',null,array('class'=>'form-control','placeholder'=>__('Enter your last name')))}}
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('email',__('Email Address'),array('class'=>'form-label'))}}
                                    {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter your email'),'required'=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('profile',__('Profile'),array('class'=>'form-label'))}}
                                    {{Form::file('profile',array('class'=>'form-control'))}}
                                </div>
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
    </div>
@endsection

