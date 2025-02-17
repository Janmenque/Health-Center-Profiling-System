@extends('layouts.app')
@section('page-title')
    {{__('History')}}
@endsection

@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('History')}}</a>
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
                            <th>{{__('Document')}}</th>
                            <th>{{__('Action')}}</th>
                            <th>{{__('Action Time')}}</th>
                            <th>{{__('Action User')}}</th>
                            <th>{{__('Description')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($histories as $history)
                            <tr role="row">
                                <td> {{ !empty($history->documents)?$history->documents->name:'-' }} </td>
                                <td> {{ucfirst($history->action) }} </td>
                                <td>{{dateFormat($history->created_at)}} {{timeFormat($history->created_at)}}</td>
                                <td> {{ !empty($history->actionUser)?$history->actionUser->name:'-' }} </td>
                                <td> {{$history->description }} </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

