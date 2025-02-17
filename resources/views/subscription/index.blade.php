@extends('layouts.app')
@section('page-title')
    {{__('Packages')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Packages')}}</a>
        </li>
    </ul>
@endsection
@section('card-action-btn')
    @if(\Auth::user()->type=='super admin' &&  (subscriptionPaymentSettings()['STRIPE_PAYMENT'] == 'on' || subscriptionPaymentSettings()['paypal_payment'] == 'on' || subscriptionPaymentSettings()['bank_transfer_payment'] == 'on' || subscriptionPaymentSettings()['flutterwave_payment'] == 'on' ))
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="{{ route('subscriptions.create') }}"
           data-title="{{__('Create New Package')}}"> <i class="ti-plus mr-5"></i>{{__('Create Package')}}</a>
    @endif
@endsection
@section('content')
    <div class="row pricing-grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Amount')}}</th>
                            <th>{{__('Interval')}}</th>
                            <th>{{__('User Limit')}}</th>
                            <th>{{__('Document Limit')}}</th>
                            <th>{{__('Document History')}}</th>
                            <th>{{__('Coupon Applicable')}}</th>
                            <th>{{__('User Logged History')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>
                                    {{ $subscription->title }}
                                    @if(\Auth::user()->type!='super admin' && \Auth::user()->subscription == $subscription->id)
                                        <a href="#" class="badge badge-success">{{__('Active')}}</a> <br>
                                        <span>{{\Auth::user()->subscription_expire_date ? dateFormat(\Auth::user()->subscription_expire_date):__('Unlimited')}}</span>{{__('Expiry Date') }}
                                    @endif
                                </td>
                                <td>{{subscriptionPaymentSettings()['CURRENCY_SYMBOL'].$subscription->package_amount}} </td>
                                <td>{{$subscription->interval}} </td>
                                <td>{{$subscription->user_limit}} </td>
                                <td>{{$subscription->document_limit}}</td>
                                <td>
                                    @if($subscription->enabled_document_history==1)
                                        <i class="text-success mr-4" data-feather="check-circle"></i>
                                    @else
                                        <i class="text-danger mr-4" data-feather="x-circle"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($subscription->couponCheck()>0)
                                        <i class="text-success mr-4" data-feather="check-circle"></i>
                                    @else
                                        <i class="text-danger mr-4" data-feather="x-circle"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($subscription->enabled_logged_history==1)
                                        <i class="text-success mr-4" data-feather="check-circle"></i>
                                    @else
                                        <i class="text-danger mr-4" data-feather="x-circle"></i>
                                    @endif
                                </td>

                                <td>
                                    <div class="cart-action">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['subscriptions.destroy', $subscription->id]]) !!}
                                        @if(\Auth::user()->type=='owner' && \Auth::user()->subscription != $subscription->id)
                                            <a class="text-warning" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Detail')}}"
                                               href="{{route('subscriptions.show',\Illuminate\Support\Facades\Crypt::encrypt($subscription->id))}}"><i
                                                    data-feather="eye"></i></a>
                                        @endif

                                        @can('edit pricing packages')
                                            <a class="text-success customModal" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Edit')}}" href="#"
                                               data-url="{{ route('subscriptions.edit',$subscription->id) }}"
                                               data-title="{{__('Edit Package')}}"> <i data-feather="edit"></i></a>
                                        @endcan
                                        @if($subscription->id!=1)
                                            @can('delete pricing packages')
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="{{__('Detete')}}" href="#"> <i
                                                        data-feather="trash-2"></i></a>
                                            @endcan
                                        @endif
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

