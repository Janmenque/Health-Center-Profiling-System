@extends('layouts.app')
@section('page-title')
    {{__('Site SEO Settings')}}
@endsection
@php
    $company_logo=getSettingsValByName('company_logo');
@endphp
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Site SEO Settings')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    {{Form::model($settings, array('route' => array('setting.site.seo'), 'method' => 'post', 'enctype' => "multipart/form-data")) }}
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('meta_seo_image',__('Meta Image'),array('class'=>'form-label'))}}
                            {{Form::file('meta_seo_image',array('class'=>'form-control'))}}
                        </div>
                    </div>
                    @if(!empty($settings['meta_seo_image']))
                        <div class="col-12 mt-20">
                            <img src="{{asset(Storage::url('upload/seo')).'/'.$settings['meta_seo_image']}}" class="setting-logo" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('meta_seo_title',__('Meta Title'),array('class'=>'form-label'))}}
                                {{Form::text('meta_seo_title',$settings['meta_seo_title'],array('class'=>'form-control','placeholder'=>__('Enter meta SEO title'),'required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('meta_seo_keyword',__('Meta Keyword'),array('class'=>'form-label'))}}
                                {{Form::text('meta_seo_keyword',$settings['meta_seo_keyword'],array('class'=>'form-control','placeholder'=>__('Enter meta SEO keyword'),'required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('meta_seo_description',__('Meta Description'),array('class'=>'form-label'))}}
                                {{ Form::textarea('meta_seo_description',$settings['meta_seo_description'], array('class' => 'form-control','placeholder'=>__('Enter meta SEO description'),'required'=>'required','rows'=>'2')) }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        {{Form::submit(__('Save'),array('class'=>'btn btn-primary btn-rounded'))}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

