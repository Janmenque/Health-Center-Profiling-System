@extends('layouts.app')
@section('page-title')
    {{__('Sub Category')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Sub Category')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create sub category'))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="{{ route('sub-category.create') }}"
           data-title="{{__('Create Sub Category')}}"> <i class="ti-plus mr-5"></i>{{__('Create Sub Category')}}</a>
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
                            <th>{{__('Title')}}</th>
                            <th>{{__('Category')}}</th>
                            <th>{{__('Created At')}}</th>
                            @if(Gate::check('edit sub category') ||  Gate::check('delete sub category'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub_categories as $sub_category)
                            <tr role="row">
                                <td>
                                    {{ $sub_category->title }}
                                </td>
                                <td>
                                    {{ !empty($sub_category->category)?$sub_category->category->title:'-' }}
                                </td>
                                <td>
                                    {{ $sub_category->created_at }}
                                </td>
                                @if(Gate::check('edit sub category') ||  Gate::check('delete sub category'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['sub-category.destroy', $sub_category->id]]) !!}

                                            @if(Gate::check('edit sub category') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" href="#"
                                                   data-url="{{ route('sub-category.edit',$sub_category->id) }}"
                                                   data-title="{{__('Edit Sub Category')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete sub category'))
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

