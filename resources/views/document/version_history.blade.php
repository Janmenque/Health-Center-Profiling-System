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
                    @if(Gate::check('create version'))
                        <div class="card buttons">
                            <div class="card-header">
                                <h4>{{__('Version History')}}</h4>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                                   aria-expanded="false" aria-controls="collapse1"> <i
                                        class="ti-plus mr-5"></i>{{__('New Version')}}</a>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="collapse1">
                                    {{Form::open(array('route'=>array('document.new.version',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post','enctype' => "multipart/form-data"))}}
                                    {{Form::hidden('document_id',$document->id,array('class'=>'form-control'))}}
                                    <div class="row">
                                        <div class="form-group  col-md-12">
                                            {{Form::label('document',__('Document'),array('class'=>'form-label'))}}
                                            {{Form::file('document',array('class'=>'form-control'))}}
                                        </div>
                                        <div class="form-group  col-md-12 text-end">
                                            {{Form::submit(__('Upload'),array('class'=>'btn btn-primary btn-rounded'))}}
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <table class="display dataTable cell-border datatbl-advance">
                                <thead>
                                <tr>
                                    <th>{{__('Uploaded At')}}</th>
                                    <th>{{__('Uploaded By')}}</th>
                                    <th>{{__('Status')}}</th>
                                    @if(Gate::check('preview document') ||  Gate::check('download document'))
                                        <th>{{__('Action')}}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($versions as $version)
                                    <tr role="row">
                                        <td>{{dateFormat($version->created_at)}} {{timeFormat($version->created_at)}}</td>
                                        <td>{{!empty($version->createdBy)?$version->createdBy->name:'-'}}</td>
                                        <td>
                                            @if($version->current_version==1)
                                                <span class="badge badge-success">{{__('Current Version')}}</span>
                                            @else
                                                <span class="badge badge-warning">{{__('Old Version')}}</span>
                                            @endif
                                        </td>
                                        @if(Gate::check('preview document') ||  Gate::check('download document'))
                                            <td>
                                                @if(Gate::check('preview document') )
                                                    <a class="text-info" data-bs-toggle="tooltip"
                                                       data-bs-original-title="{{__('View')}}"
                                                       href="{{!empty($version->document)? asset(Storage::url('upload/document/')).'/'.$version->document : '#'}}"
                                                       target="_blank"> <i data-feather="maximize"></i></a>
                                                @endif
                                                @if(Gate::check('download document'))
                                                    <a class="text-primary" data-bs-toggle="tooltip"
                                                       data-bs-original-title="{{__('Download')}}"
                                                       href="{{!empty($version->document)? asset(Storage::url('upload/document/')).'/'.$version->document : '#'}}"
                                                       download=""> <i data-feather="download"></i></a>
                                                @endif
                                            </td>
                                        @endif
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
@endsection

