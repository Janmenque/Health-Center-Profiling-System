<?php echo e(Form::open(array('url'=>'users','method'=>'post'))); ?>

<div class="modal-body">
    <div class="row">
        <?php if(\Auth::user()->type != 'super admin'): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('role', __('Assign Role'),['class'=>'form-label'])); ?>

                <?php echo Form::select('role', $userRoles, null,array('class' => 'form-control hidesearch','required'=>'required')); ?>

            </div>
        <?php endif; ?>
        <?php if(\Auth::user()->type == 'super admin'): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('name',__('Name'),array('class'=>'form-label'))); ?>

                <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

            </div>
        <?php else: ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('first_name',__('First Name'),array('class'=>'form-label'))); ?>

                <?php echo e(Form::text('first_name',null,array('class'=>'form-control','placeholder'=>__('Enter First Name'),'required'=>'required'))); ?>

            </div>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('last_name',__('Last Name'),array('class'=>'form-label'))); ?>

                <?php echo e(Form::text('last_name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('email',__('User Email'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter user email'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('password',__('User Password'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter user password'),'required'=>'required','minlength'=>"6"))); ?>


        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('phone_number',__('User Phone Number'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('phone_number',null,array('class'=>'form-control','placeholder'=>__('Enter user phone number')))); ?>

        </div>

    </div>
</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary ml-10'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/user/create.blade.php ENDPATH**/ ?>