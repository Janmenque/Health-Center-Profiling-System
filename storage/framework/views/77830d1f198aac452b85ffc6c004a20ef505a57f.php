<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('document.index')); ?>"><?php echo e(__('Document')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Details')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="cdxemail-contain">
                <?php echo $__env->make('document.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="email-body">
                    <div class="card buttons">
                        <div class="card-header">
                            <h4><?php echo e(__('Send Email')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e(Form::open(array('route'=>array('document.send.email',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post'))); ?>

                            <?php echo e(Form::hidden('document_id',$document->id,array('class'=>'form-control'))); ?>

                            <div class="row">
                                <div class="form-group  col-md-12">
                                    <?php echo e(Form::label('email',__('Email'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter email')))); ?>

                                </div>
                                <div class="form-group  col-md-12">
                                    <?php echo e(Form::label('subject',__('Subject'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::text('subject',null,array('class'=>'form-control','placeholder'=>__('Enter subject')))); ?>

                                </div>
                                <div class="form-group  col-md-12">
                                    <?php echo e(Form::label('message',__('Message'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::textarea('message',null,array('class'=>'form-control','placeholder'=>__('Enter message'),'rows'=>10))); ?>

                                </div>
                                <?php if(Gate::check('send mail')): ?>
                                    <div class="form-group  col-md-12 text-end">
                                        <?php echo e(Form::submit(__('Send'),array('class'=>'btn btn-primary btn-rounded'))); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/send_email.blade.php ENDPATH**/ ?>