@extends('layouts.app')
@section('page-title')
    {{__('Coupon')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Coupon')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(Gate::check('create coupon'))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="lg"
           data-url="{{ route('coupons.create') }}"
           data-title="{{__('Create Coupon')}}"> <i class="ti-plus mr-5"></i>{{__('Create Coupon')}}</a>
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
                            <th>{{__('Coupon')}}</th>
                            <th>{{__('Package')}}</th>
                            <th>{{__('User')}}</th>
                            <th>{{__('Date')}}</th>
                            @if(Gate::check('delete coupon history'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($couponhistory as $history)

                            <tr role="row">
                                <td> {{ !empty($history->coupons)?$history->coupons->name:'-' }}   </td>
                                <td>{{ !empty($history->pakages)?$history->pakages->name:'-' }} </td>
                                <td>{{ !empty($history->users)?$history->users->name:'-' }} </td>
                                <td>{{ dateFormat($history->date) }} </td>
                                @if(Gate::check('delete coupon history'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['coupons.history.destroy', $history->id]]) !!}

                                            @if( Gate::check('delete coupon history'))
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

