<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('General Settings')); ?>

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
            <a href="#"><?php echo e(__('General Settings')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($settings, array('route' => array('setting.general'), 'method' => 'post', 'enctype' => "multipart/form-data"))); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('application_name',__('Application Name'),array('class'=>'form-label'))); ?>

                                <?php echo e(Form::text('application_name',!empty($settings['app_name'])?$settings['app_name']:env('APP_NAME'),array('class'=>'form-control','placeholder'=>__('Enter your application name'),'required'=>'required'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('logo',__('Logo'),array('class'=>'form-label'))); ?>

                                <?php echo e(Form::file('logo',array('class'=>'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('favicon',__('Favicon'),array('class'=>'form-label'))); ?>

                                <?php echo e(Form::file('favicon',array('class'=>'form-control'))); ?>

                            </div>
                        </div>
                        <?php if(\Auth::user()->type=='super admin'): ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('landing_logo',__('Landing Page Logo'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::file('landing_logo',array('class'=>'form-control'))); ?>

                                </div>
                            </div>

                        <?php endif; ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/settings/general.blade.php ENDPATH**/ ?>