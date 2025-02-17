<?php echo e(Form::open(array('url'=>'document','method'=>'post', 'enctype' => "multipart/form-data"))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('name',__('name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter document name')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('middlename',__('middlename'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('middlename',null,array('class'=>'form-control','placeholder'=>__('Middle Name')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('FirstName',__('FirstName'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('FirstName',null,array('class'=>'form-control','placeholder'=>__('FirstName')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('Sex',__('Sex'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('Sex',null,array('class'=>'form-control','placeholder'=>__('Sex')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('DateofBirth',__('DateofBirth'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('DateofBirth',null,array('class'=>'form-control','placeholder'=>__('DateofBirth')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('PlaceofBirth',__('PlaceofBirth'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('PlaceofBirth',null,array('class'=>'form-control','placeholder'=>__('PlaceofBirth')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('NameofMother',__('NameofMother'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('NameofMother',null,array('class'=>'form-control','placeholder'=>__('NameofMother')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('NameofFather',__('NameofFather'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('NameofFather',null,array('class'=>'form-control','placeholder'=>__('NameofFather')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('Spouse',__('Spouse'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('Spouse',null,array('class'=>'form-control','placeholder'=>__('Spouse')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('EducationalAttainment',__('EducationalAttainment'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('EducationalAttainment',null,array('class'=>'form-control','placeholder'=>__('EducationalAttainment')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('Adress',__('Address'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('Adress',null,array('class'=>'form-control','placeholder'=>__('Adress')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('ContactNumber',__('ContactNumber'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('ContactNumber',null,array('class'=>'form-control','placeholder'=>__('ContactNumber')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('FamilySerialNumber',__('FamilySerialNumber'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('FamilySerialNumber',null,array('class'=>'form-control','placeholder'=>__('FamilySerialNumber')))); ?>

        </div>
        
        <div class="form-group col-md-12">
            <?php echo e(Form::label('category_id',__('Category'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::select('category_id',$category,null,array('class'=>'form-control hidesearch','id'=>'category'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('sub_category_id',__('Sub Category'),array('class'=>'form-label'))); ?>

            <div class="sc_div">
                <select class="form-control hidesearch sub_category_id" id="sub_category_id" name="sub_category_id">
                    <option value=""><?php echo e(__('Select Sub Category')); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('document',__('Document'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::file('document',array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('tages',__('Tages'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::select('tages[]',$tages,null,array('class'=>'form-control hidesearch','multiple'))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('description',__('Description'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','rows'=>3))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))); ?>

</div>
<?php echo e(Form::close()); ?>

<script>
    var url = "<?php echo e(route("category.sub-category", ":id")); ?>";
</script>
<script src="<?php echo e(asset('js/custom/document.js')); ?>"></script>
<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/create.blade.php ENDPATH**/ ?>