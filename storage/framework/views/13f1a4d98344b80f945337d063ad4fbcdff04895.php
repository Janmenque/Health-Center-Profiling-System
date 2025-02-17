<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Password Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Password Settings')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12 cdx-xxl-100 cdx-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="info-group">
                        <?php echo e(Form::model($loginUser, array('route' => array('setting.password'), 'method' => 'post'))); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('current_password',__('Current Password'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::password('current_password',array('class'=>'form-control','placeholder'=>__('Enter your current password'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('new_password',__('New Password'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::password('new_password',array('class'=>'form-control','placeholder'=>__('Enter your new password'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('confirm_password',__('Confirm New Password'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::password('confirm_password',array('class'=>'form-control','placeholder'=>__('Enter your confirm new password'),'required'=>'required'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary btn-rounded'))); ?>

                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/settings/password.blade.php ENDPATH**/ ?>