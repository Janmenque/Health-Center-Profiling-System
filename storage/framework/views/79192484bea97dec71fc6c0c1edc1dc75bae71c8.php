<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('SMTP Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
$settings=settings();
?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('SMTP Settings')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($settings, array('route' => array('setting.smtp'), 'method' => 'post'))); ?>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('sender_name',__('Sender Name'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('sender_name',$settings['FROM_NAME'],array('class'=>'form-control','placeholder'=>__('Enter sender name')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('sender_email',__('Sender Email'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('sender_email',$settings['FROM_EMAIL'],array('class'=>'form-control','placeholder'=>__('Enter sender email')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('server_driver',__('SMTP Driver'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('server_driver',$settings['SERVER_DRIVER'],array('class'=>'form-control','placeholder'=>__('Enter smtp driver')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('server_host',__('SMTP Host'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('server_host',$settings['SERVER_HOST'],array('class'=>'form-control ','placeholder'=>__('Enter smtp host')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('server_username',__('SMTP Username'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('server_username',$settings['SERVER_USERNAME'],array('class'=>'form-control','placeholder'=>__('Enter smtp username')))); ?>


                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('server_password',__('SMTP Password'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('server_password',$settings['SERVER_PASSWORD'],array('class'=>'form-control','placeholder'=>__('Enter smtp password')))); ?>


                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('server_encryption',__('SMTP Encryption'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('server_encryption',$settings['SERVER_ENCRYPTION'],array('class'=>'form-control','placeholder'=>__('Enter smtp encryption')))); ?>


                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('server_port',__('SMTP Port'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('server_port',$settings['SERVER_PORT'],array('class'=>'form-control','placeholder'=>__('Enter smtp port')))); ?>


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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/settings/smtp.blade.php ENDPATH**/ ?>