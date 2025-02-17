{{Form::open(array('url'=>'note','method'=>'post', 'enctype' => "multipart/form-data"))}}
<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            {{Form::label('name',__('name'),array('class'=>'form-label'))}}
            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter note title')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('FirstName',__('FirsName'),array('class'=>'form-label'))}}
            {{Form::text('FirstName',null,array('class'=>'form-control','placeholder'=>__('Enter note title')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('attachment',__('Attachment'),array('class'=>'form-label'))}}
            {{Form::file('attachment',array('class'=>'form-control'))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('description',__('Description'),array('class'=>'form-label'))}}
            {{Form::textarea('description',null,array('class'=>'form-control','rows'=>5))}}
        </div>
    </div>
</div>
<div class="modal-footer">
    {{Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))}}
</div>
{{ Form::close() }}


