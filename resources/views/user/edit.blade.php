{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
<div class="modal-body">
    <div class="row">
        @if(\Auth::user()->type != 'super admin')
            <div class="form-group col-md-6">
                {{ Form::label('role', __('Assign Role'),['class'=>'form-label']) }}
                {!! Form::select('role', $userRoles, !empty($user->roles)?$user->roles[0]->id:null,array('class' => 'form-control hidesearch ','required'=>'required')) !!}
            </div>
        @endif
            @if(\Auth::user()->type == 'super admin')
                <div class="form-group col-md-6">
                    {{Form::label('name',__('Name'),array('class'=>'form-label')) }}
                    {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))}}
                </div>
            @else
                <div class="form-group col-md-6">
                    {{Form::label('first_name',__('First Name'),array('class'=>'form-label')) }}
                    {{Form::text('first_name',null,array('class'=>'form-control','placeholder'=>__('Enter First Name'),'required'=>'required'))}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('last_name',__('Last Name'),array('class'=>'form-label')) }}
                    {{Form::text('last_name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))}}
                </div>
            @endif
        <div class="form-group col-md-6">
            {{Form::label('email',__('User Email'),array('class'=>'form-label'))}}
            {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email'),'required'=>'required'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('phone_number',__('User Phone Number'),array('class'=>'form-label')) }}
            {{Form::text('phone_number',null,array('class'=>'form-control','placeholder'=>__('Enter Phone Number')))}}
        </div>

    </div>
</div>
<div class="modal-footer">
    {{Form::submit(__('Update'),array('class'=>'btn btn-primary btn-rounded'))}}
</div>
{{ Form::close() }}
