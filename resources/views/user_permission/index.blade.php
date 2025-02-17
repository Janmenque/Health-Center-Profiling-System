@extends('layouts.app')
@section('page-title')
    {{__('Role')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Roles')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md" data-url="{{ route('permission.create') }}"
       data-title="{{__('Create New Permission')}}"> <i class="ti-plus mr-5"></i>{{__('Create Permission')}}</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance" >
                        <thead>
                        <tr>
                            <th>{{__('Title')}}</th>
                            <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissionData as $data)
                            <tr>
                                <td>{{ $data->name }} </td>
                                <td class="text-right">
                                    <div class="cart-action">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['permission.destroy', $data->id]]) !!}
                                        <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip" data-bs-original-title="{{__('Detete')}}" href="#"> <i data-feather="trash-2"></i></a>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

