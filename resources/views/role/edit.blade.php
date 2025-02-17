@extends('layouts.app')
@section('page-title')
    {{__('Role')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('role.index')}}">{{__('Roles')}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Edit')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    @php
        $systemModules=\App\Models\User::$systemModules;
    @endphp
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('Edit Role And Permissions')}}</h4>
                </div>
                <div class="card-body">
                    {{Form::model($role,array('route' => array('role.update', $role->id), 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{Form::label('title',__('Role Title'),['class'=>'form-label'])}}
                        {{Form::text('title',$role->name,array('class'=>'form-control','placeholder'=>__('Enter role title')))}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                @foreach($systemModules as $module)
                                    <div class="row">
                                        @foreach($permissionList as $permission)
                                            @if (str_contains(strtolower($permission->name), strtolower($module)))
                                                <div class="form-check custom-chek form-check-inline col-md-2">
                                                    {{ Form::checkbox('user_permission[]', $permission->id, null, ['class'=>'form-check-input', 'id' => $module.'_permission'.$permission->id,in_array($permission->id,$assignPermission)?'checked':'']) }}
                                                    {{ Form::label($module.'_permission'.$permission->id, ucfirst($permission->name), ['class'=>'form-check-label']) }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-20 text-end">
                        {{Form::submit(__('Update'),array('class'=>'btn btn-primary btn-rounded'))}}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

