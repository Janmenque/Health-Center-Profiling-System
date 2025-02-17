@extends('layouts.app')
@section('page-title')
    {{__('Category')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Category')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create category'))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="{{ route('category.create') }}"
           data-title="{{__('Create Category')}}"> <i class="ti-plus mr-5"></i>{{__('Create Category')}}</a>
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
                            <th>{{__('Created At')}}</th>
                            @if(Gate::check('edit category') ||  Gate::check('delete category'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row">
                                <td>
                                    {{ $category->title }}
                                </td>
                                <td>
                                    {{ $category->created_at }}
                                </td>

                                @if(Gate::check('edit category') ||  Gate::check('delete category'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id]]) !!}

                                            @if(Gate::check('edit category') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" href="#"
                                                   data-url="{{ route('category.edit',$category->id) }}"
                                                   data-title="{{__('Edit Category')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete category'))
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

