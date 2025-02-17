@extends('layouts.app')
@section('page-title')
    {{__('Document Details')}}
@endsection

@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><h1>{{__('Dashboard')}}</h1></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('document.index')}}">{{__('Document')}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{__('Details')}}</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="cdxemail-contain">
                @include('document.main')
                <div class="email-body">
                    @if(Gate::check('create comment'))
                    <div class="card buttons">
                        <div class="card-header">
                            <h4>{{__('Comment')}}</h4>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                               aria-expanded="false" aria-controls="collapse1"> <i
                                    class="ti-plus mr-5"></i>{{__('Add Comment')}}</a>
                        </div>
                        <div class="card-body">
                            <div class="collapse" id="collapse1">
                               <div class="row">
                                   {{Form::open(array('route'=>array('document.comment',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post'))}}
                                   <div class="form-group">
                                       {{Form::textarea('comment',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Write a comment')))}}
                                   </div>
                                   <div class="form-group col-md-12 text-end">
                                       {{Form::submit(__('Add'),array('class'=>'btn btn-primary'))}}
                                   </div>
                                   {{ Form::close() }}
                               </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card">

                        <div class="card-body">
                            <ul class="blgcomment-list">
                                @foreach($comments as $comment)
                                <li class="reply-comment1">
                                    <div class="comment-item">
                                        <div class="media">
                                            <img class="img-fluid" src="{{(!empty($comment->user)? asset(Storage::url('upload/profile/')).'/'.$comment->user->profile : asset(Storage::url('upload/profile')).'/avatar.png')}}" alt="">
                                            <div class="media-body">
                                                <a href="#">
                                                    <h5> {{!empty($comment->user)?$comment->user->name:'-'}} <span class="comment-time">  <i class="fa fa-calendar"></i>{{dateFormat($comment->created_at)}}</span>
                                                    </h5>
                                                </a>
                                                <p> {{$comment->comment}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

