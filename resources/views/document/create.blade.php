{{Form::open(array('url'=>'document','method'=>'post', 'enctype' => "multipart/form-data"))}}
<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            {{Form::label('name',__('name'),array('class'=>'form-label'))}}
            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter document name')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('middlename',__('middlename'),array('class'=>'form-label'))}}
            {{Form::text('middlename',null,array('class'=>'form-control','placeholder'=>__('Middle Name')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('FirstName',__('FirstName'),array('class'=>'form-label'))}}
            {{Form::text('FirstName',null,array('class'=>'form-control','placeholder'=>__('FirstName')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('Sex',__('Sex'),array('class'=>'form-label'))}}
            {{Form::text('Sex',null,array('class'=>'form-control','placeholder'=>__('Sex')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('DateofBirth',__('DateofBirth'),array('class'=>'form-label'))}}
            {{Form::text('DateofBirth',null,array('class'=>'form-control','placeholder'=>__('DateofBirth')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('PlaceofBirth',__('PlaceofBirth'),array('class'=>'form-label'))}}
            {{Form::text('PlaceofBirth',null,array('class'=>'form-control','placeholder'=>__('PlaceofBirth')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('NameofMother',__('NameofMother'),array('class'=>'form-label'))}}
            {{Form::text('NameofMother',null,array('class'=>'form-control','placeholder'=>__('NameofMother')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('NameofFather',__('NameofFather'),array('class'=>'form-label'))}}
            {{Form::text('NameofFather',null,array('class'=>'form-control','placeholder'=>__('NameofFather')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('Spouse',__('Spouse'),array('class'=>'form-label'))}}
            {{Form::text('Spouse',null,array('class'=>'form-control','placeholder'=>__('Spouse')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('EducationalAttainment',__('EducationalAttainment'),array('class'=>'form-label'))}}
            {{Form::text('EducationalAttainment',null,array('class'=>'form-control','placeholder'=>__('EducationalAttainment')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('Adress',__('Address'),array('class'=>'form-label'))}}
            {{Form::text('Adress',null,array('class'=>'form-control','placeholder'=>__('Adress')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('ContactNumber',__('ContactNumber'),array('class'=>'form-label'))}}
            {{Form::text('ContactNumber',null,array('class'=>'form-control','placeholder'=>__('ContactNumber')))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('FamilySerialNumber',__('FamilySerialNumber'),array('class'=>'form-label'))}}
            {{Form::text('FamilySerialNumber',null,array('class'=>'form-control','placeholder'=>__('FamilySerialNumber')))}}
        </div>
        
        <div class="form-group col-md-12">
            {{Form::label('category_id',__('Category'),array('class'=>'form-label'))}}
            {{Form::select('category_id',$category,null,array('class'=>'form-control hidesearch','id'=>'category'))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('sub_category_id',__('Sub Category'),array('class'=>'form-label'))}}
            <div class="sc_div">
                <select class="form-control hidesearch sub_category_id" id="sub_category_id" name="sub_category_id">
                    <option value="">{{__('Select Sub Category')}}</option>
                </select>
            </div>
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('document',__('Document'),array('class'=>'form-label'))}}
            {{Form::file('document',array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('tages',__('Tages'),array('class'=>'form-label'))}}
            {{Form::select('tages[]',$tages,null,array('class'=>'form-control hidesearch','multiple'))}}
        </div>
        <div class="form-group  col-md-12">
            {{Form::label('description',__('Description'),array('class'=>'form-label'))}}
            {{Form::textarea('description',null,array('class'=>'form-control','rows'=>3))}}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{__('Close')}}</button>
    {{Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))}}
</div>
{{ Form::close() }}
<script>
    var url = "{{ route("category.sub-category", ":id") }}";
</script>
<script src="{{ asset('js/custom/document.js') }}"></script>
