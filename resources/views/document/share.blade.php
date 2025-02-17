@extends('layouts.app')
@section('page-title')
    {{__('Document Details')}}
@endsection
@push('script-page')
    <script>
        "use strict";
        $(document).on('click', '#time_duration', function () {
            if ($("#time_duration").is(':checked'))
                $(".time_duration").removeClass('d-none');
            else
                $(".time_duration").addClass('d-none');
        });
    </script>
@endpush
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
                        @if(Gate::check('create share document'))
                            <div class="card-header">
                                <h4>{{__('Share Document')}}</h4>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                                   aria-expanded="false" aria-controls="collapse1"> <i
                                        class="ti-plus mr-5"></i>{{__('Share Document')}}</a>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="collapse1">
                                    {{Form::open(array('route'=>array('document.share',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post'))}}
                                    {{Form::hidden('document_id',$document->id,array('class'=>'form-control'))}}
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            {{Form::label('assign_user',__('Assign Users'),array('class'=>'form-label'))}}
                                            {{Form::select('assign_user[]',$users,null,array('class'=>'form-control hidesearch','multiple'))}}
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-check custom-chek">
                                                <input class="form-check-input" type="checkbox" name="time_duration"
                                                       value="1" id="time_duration">
                                                <label class="form-check-label"
                                                       for="time_duration">{{__('Time Duration')}} ? </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 time_duration d-none">
                                            <div class="row">
                                                <div class="form-group  col-md-6">
                                                    {{Form::label('start_date',__('Start Date'),array('class'=>'form-label'))}}
                                                    {{Form::date('start_date',null,array('class'=>'form-control'))}}
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    {{Form::label('end_date',__('End Date'),array('class'=>'form-label'))}}
                                                    {{Form::date('end_date',null,array('class'=>'form-control'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  col-md-12 text-end">
                                            {{Form::submit(__('Share'),array('class'=>'btn btn-primary btn-rounded'))}}
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="display dataTable cell-border datatbl-advance">
                                <thead>
                                <tr>
                                    <th>{{__('User Name')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Assign At')}}</th>
                                    <th>{{__('Start Date')}}</th>
                                    <th>{{__('End Date')}}</th>
                                    @if(Gate::check('delete share document'))
                                    <th>{{__('Action')}}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shareDocuments as $shareDocument)
                                    <tr role="row">
                                        <td>{{!empty($shareDocument->user)?$shareDocument->user->name:'-'}}</td>
                                        <td>{{!empty($shareDocument->user)?$shareDocument->user->email:'-'}}</td>
                                        <td>{{dateFormat($shareDocument->created_at)}}</td>
                                        <td>{{!empty($shareDocument->start_date)?dateFormat($shareDocument->start_date):'-'}}</td>
                                        <td>{{!empty($shareDocument->end_date)?dateFormat($shareDocument->end_date):'-'}}</td>
                                        @if(Gate::check('delete share document'))
                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['document.share.destroy', $shareDocument->id]]) !!}
                                            <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Detete')}}" href="#"> <i
                                                    data-feather="trash-2"></i></a>
                                            {!! Form::close() !!}
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

