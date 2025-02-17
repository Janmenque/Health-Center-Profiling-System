@extends('layouts.app')
@section('page-title')
    {{__('Tag')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Tag')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create tag'))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="{{ route('tag.create') }}"
           data-title="{{__('Create Tag')}}"> <i class="ti-plus mr-5"></i>{{__('Create Tag')}}</a>
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
                            <th>{{__('Tag')}}</th>
                            <th>{{__('Created At')}}</th>
                            @if(Gate::check('edit tag') ||  Gate::check('delete tag'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr role="row">
                                <td>
                                    {{ $tag->title }}
                                </td>
                                <td>
                                    {{ $tag->created_at }}
                                </td>

                                @if(Gate::check('edit tag') ||  Gate::check('delete tag'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['tag.destroy', $tag->id]]) !!}

                                            @if(Gate::check('edit tag') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" href="#"
                                                   data-url="{{ route('tag.edit',$tag->id) }}"
                                                   data-title="{{__('Edit Tag')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete tag'))
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

