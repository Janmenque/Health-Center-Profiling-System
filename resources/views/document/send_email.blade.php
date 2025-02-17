@extends('layouts.app')
@section('page-title')
    {{__('Document Details')}}
@endsection

@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('document.index')}}">{{__('Document')}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Details')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="cdxemail-contain">
                @include('document.main')
                <div class="email-body">
                    <div class="card buttons">
                        <div class="card-header">
                            <h4>{{__('Send Email')}}</h4>
                        </div>
                        <div class="card-body">
                            {{Form::open(array('route'=>array('document.send.email',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post'))}}
                            {{Form::hidden('document_id',$document->id,array('class'=>'form-control'))}}
                            <div class="row">
                                <div class="form-group  col-md-12">
                                    {{Form::label('email',__('Email'),array('class'=>'form-label'))}}
                                    {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter email')))}}
                                </div>
                                <div class="form-group  col-md-12">
                                    {{Form::label('subject',__('Subject'),array('class'=>'form-label'))}}
                                    {{Form::text('subject',null,array('class'=>'form-control','placeholder'=>__('Enter subject')))}}
                                </div>
                                <div class="form-group  col-md-12">
                                    {{Form::label('message',__('Message'),array('class'=>'form-label'))}}
                                    {{Form::textarea('message',null,array('class'=>'form-control','placeholder'=>__('Enter message'),'rows'=>10))}}
                                </div>
                                @if(Gate::check('send mail'))
                                    <div class="form-group  col-md-12 text-end">
                                        {{Form::submit(__('Send'),array('class'=>'btn btn-primary btn-rounded'))}}
                                    </div>
                                @endif
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

