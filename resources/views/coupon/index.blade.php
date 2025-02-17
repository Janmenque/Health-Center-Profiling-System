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
                            <th>{{__('Coupon Name')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Rate')}}</th>
                            <th>{{__('Code')}}</th>
                            <th>{{__('Valid For')}}</th>
                            <th>{{__('Use Limit')}}</th>
                            <th>{{__('Applicable Packages')}}</th>
                            <th>{{__('Total Used')}}</th>
                            <th>{{__('status')}}</th>
                            @if(Gate::check('edit coupon') ||  Gate::check('delete coupon'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr role="row">
                                <td> {{ $coupon->name }}   </td>
                                <td> {{ \App\Models\Coupon::$type[$coupon->type] }}  </td>
                                <td>{{ $coupon->rate }} </td>
                                <td>{{ $coupon->code }} </td>
                                <td>{{ dateFormat($coupon->valid_for) }} </td>
                                <td>{{ $coupon->use_limit }} </td>
                                <td>

                                    @foreach($coupon->package($coupon->applicable_packages) as $package)
                                        <span class="badge badge-primary mb-5"> {{$package->title}} </span>
                                    @endforeach

                                </td>
                                <td>{{$coupon->usedCoupon()}}</td>
                                <td>
                                    @if($coupon->status==1)
                                        <span class="badge badge-success">{{\App\Models\Coupon::$status[$coupon->status]}}</span>
                                    @else
                                        <span class="badge badge-danger">{{\App\Models\Coupon::$status[$coupon->status]}}</span>
                                    @endif
                                </td>
                                @if(Gate::check('edit coupon') ||  Gate::check('delete coupon'))
                                    <td class="text-right">
                                        <div class="cart-action">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['coupons.destroy', $coupon->id]]) !!}

                                            @if(Gate::check('edit coupon') )
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Edit')}}" data-size="lg" href="#"
                                                   data-url="{{ route('coupons.edit',$coupon->id) }}"
                                                   data-title="{{__('Edit Coupon')}}"> <i data-feather="edit"></i></a>
                                            @endcan
                                            @if( Gate::check('delete coupon'))
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

