@extends('layouts.app')
@section('page-title')
    {{__('Note')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Note')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create note') || \Auth::user()->type=='super admin')
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="{{ route('note.create') }}"
           data-title="{{__('Create New Note')}}"> <i class="ti-plus mr-5"></i>{{__('Create Note')}}</a>
    @endif
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th>{{__('Last Name')}}</th>
                            <th>{{__('First Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('Created At')}}</th>
                            @if(Gate::check('edit note') || Gate::check('delete note') || \Auth::user()->type=='super admin')
                                <th>{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notes as $note)
                            <tr>
                                <td>{{ $note->name }} </td>
                                <td>{{ $note->FirstName }} </td>
                                <td>{{ !empty($note->description)?$note->description:'-' }} </td>
                                <td>{{dateFormat($note->created_at)}}</td>
                                @if(Gate::check('edit note') || Gate::check('delete note') || \Auth::user()->type=='super admin')
                                    <td>
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['note.destroy', $note->id]]) !!}
                                            @if(!empty($note->attachment))
                                                <a href="{{asset('/storage/upload/applicant/attachment/'.$note->attachment)}}"
                                                   target="_blank"><i data-feather="download"></i></a>
                                            @endif
                                            @if(Gate::check('edit note') || \Auth::user()->type=='super admin')
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" href="#"
                                                   data-url="{{ route('note.edit',$note->id) }}"
                                                   data-title="{{__('Edit Note')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if(Gate::check('delete note') || \Auth::user()->type=='super admin')
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Detete')}}" href="#"> <i
                                                        data-feather="trash-2"></i></a>
                                            @endcan
                                            {!! Form::close() !!}
                                        </div>
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
@endsection

