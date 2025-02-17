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
                    @if(Gate::check('create reminder'))
                    <div class="card buttons">
                        <div class="card-header">
                            <h4>{{__('Reminder')}}</h4>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                               aria-expanded="false" aria-controls="collapse1"> <i
                                    class="ti-plus mr-5"></i>{{__('Create Reminder')}}</a>
                        </div>
                        <div class="card-body">
                            <div class="collapse" id="collapse1">
                                {{Form::open(array('url'=>'reminder','method'=>'post'))}}
                                {{Form::hidden('document_id',$document->id,array('class'=>'form-control'))}}
                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        {{Form::label('date',__('Date'),array('class'=>'form-label'))}}
                                        {{Form::date('date',null,array('class'=>'form-control'))}}
                                    </div>
                                    <div class="form-group  col-md-6">
                                        {{Form::label('time',__('Time'),array('class'=>'form-label'))}}
                                        {{Form::time('time',null,array('class'=>'form-control'))}}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('assign_user',__('Assign Users'),array('class'=>'form-label'))}}
                                        {{Form::select('assign_user[]',$users,null,array('class'=>'form-control hidesearch','multiple'))}}
                                    </div>
                                    <div class="form-group  col-md-6">
                                        {{Form::label('subject',__('Subject'),array('class'=>'form-label'))}}
                                        {{Form::text('subject',null,array('class'=>'form-control','placeholder'=>__('Enter reminder subject')))}}
                                    </div>
                                    <div class="form-group  col-md-12">
                                        {{Form::label('message',__('Message'),array('class'=>'form-label'))}}
                                        {{Form::textarea('message',null,array('class'=>'form-control','placeholder'=>__('Enter reminder message'),'rows'=>2))}}
                                    </div>
                                    <div class="form-group  col-md-12 text-end">
                                        {{Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))}}
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
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Time')}}</th>
                                    <th>{{__('Subject')}}</th>
                                    <th>{{__('Created By')}}</th>
                                    @if(Gate::check('show reminder'))
                                    <th>{{__('Action')}}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reminders as $reminder)
                                    <tr role="row">
                                        <td>{{dateFormat($reminder->date)}}</td>
                                        <td>{{timeFormat($reminder->time)}}</td>
                                        <td> {{ $reminder->subject }} </td>
                                        <td> {{ !empty($reminder->createdBy)?$reminder->createdBy->name:'-' }} </td>
                                        @if(Gate::check('show reminder'))
                                        <td>
                                            <a class="text-warning customModal" data-size="lg" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Show')}}" href="#"
                                               data-url="{{ route('reminder.show',$reminder->id) }}"
                                               data-title="{{__('Details')}}"> <i data-feather="eye"></i></a>
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

