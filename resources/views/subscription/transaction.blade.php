@extends('layouts.app')
@section('page-title')
    {{__('Transaction')}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Transaction')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th>{{__('User')}}</th>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Subscription')}}</th>
                            <th>{{__('Amount')}}</th>
                            <th>{{__('Payment Type')}}</th>
                            <th>{{__('Payment Status')}}</th>
                            <th>{{__('Receipt')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{!empty($transaction->users)?$transaction->users->name:''}}</td>
                                <td>{{dateFormat($transaction->created_at)}}</td>
                                <td>{{!empty($transaction->subscriptions)?$transaction->subscriptions->title:'-'}}</td>
                                <td>{{$settings['CURRENCY_SYMBOL'].$transaction->amount}}</td>
                                <td>{{$transaction->payment_type}}</td>
                                <td>
                                    @if($transaction->payment_status=='Pending')
                                        <span
                                            class="badge badge-warning">{{$transaction->payment_status}}</span>
                                    @elseif($transaction->payment_status=='Success')
                                        <span
                                            class="badge badge-success">{{$transaction->payment_status}}</span>
                                    @else
                                        <span
                                            class="badge badge-danger">{{$transaction->payment_status}}</span>
                                    @endif


                                </td>
                                <td>
                                    @if($transaction->payment_type=='Stripe')
                                        <a class="text-primary" data-bs-toggle="tooltip" target="_blank"
                                           data-bs-original-title="{{__('Receipt')}}" href="{{$transaction->receipt}}">
                                            <i data-feather="file"></i></a>
                                    @elseif($transaction->payment_type=='Bank Transfer')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['subscription.bank.transfer.action', [$transaction->id,'accept']]]) !!}

                                        <a class="text-primary" data-bs-toggle="tooltip" target="_blank"
                                           data-bs-original-title="{{__('Receipt')}}"
                                           href="{{asset('/storage/upload/payment_receipt/'.$transaction->receipt)}}">
                                            <i data-feather="file"></i></a>

                                        @if(\Auth::user()->type=='super admin' && $transaction->payment_status=='Pending')
                                            <a class="text-success" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Accept')}}"
                                               href="{{route('subscription.bank.transfer.action', [$transaction->id,'accept'])}}">
                                                <i data-feather="user-check"></i></a>

                                            <a class="text-danger" data-bs-toggle="tooltip"
                                               data-bs-original-title="{{__('Reject')}}"
                                               href="{{route('subscription.bank.transfer.action', [$transaction->id,'reject'])}}">
                                                <i data-feather="user-x"></i></a>
                                        @endif
                                    @endif
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

