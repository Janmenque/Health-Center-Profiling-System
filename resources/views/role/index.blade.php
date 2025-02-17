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
    @can('create role')
        <a class="btn btn-primary btn-sm ml-20 customModal" href="{{ route('role.create') }}"> <i
                class="ti-plus mr-5"></i>{{__('Create Role')}}</a>
    @endcan
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th>{{__('Role')}}</th>
                            <th>{{__('Assigned Users')}}</th>
                            <th>{{__('Assigned Permissions')}}</th>
                            <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roleData as $role)
                            <tr>
                                <td>{{ ucfirst($role->name) }} </td>
                                <td>{{\Auth::user()->roleWiseUserCount($role->name)}}</td>
                                <td>{{$role->permissions()->count()}}</td>
                                <td class="text-right">
                                    <div class="cart-action">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $role->id]]) !!}
                                        @can('edit role')
                                            <a class="text-success" data-size="xl" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Edit')}}"
                                               href="{{ route('role.edit',$role->id) }}"> <i
                                                    data-feather="edit"></i></a>
                                        @endcan
                                        @can('delete role')
                                            <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Detete')}}" href="#"> <i
                                                    data-feather="trash-2"></i></a>
                                            {!! Form::close() !!}
                                        @endcan
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

