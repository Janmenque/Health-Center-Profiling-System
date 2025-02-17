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
                    <?php if(Gate::check('create reminder')): ?>
                    <div class="card buttons">
                        <div class="card-header">
                            <h4><?php echo e(__('Reminder')); ?></h4>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                               aria-expanded="false" aria-controls="collapse1"> <i
                                    class="ti-plus mr-5"></i><?php echo e(__('Create Reminder')); ?></a>
                        </div>
                        <div class="card-body">
                            <div class="collapse" id="collapse1">
                                <?php echo e(Form::open(array('url'=>'reminder','method'=>'post'))); ?>

                                <?php echo e(Form::hidden('document_id',$document->id,array('class'=>'form-control'))); ?>

                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <?php echo e(Form::label('date',__('Date'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::date('date',null,array('class'=>'form-control'))); ?>

                                    </div>
                                    <div class="form-group  col-md-6">
                                        <?php echo e(Form::label('time',__('Time'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::time('time',null,array('class'=>'form-control'))); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('assign_user',__('Assign Users'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::select('assign_user[]',$users,null,array('class'=>'form-control hidesearch','multiple'))); ?>

                                    </div>
                                    <div class="form-group  col-md-6">
                                        <?php echo e(Form::label('subject',__('Subject'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('subject',null,array('class'=>'form-control','placeholder'=>__('Enter reminder subject')))); ?>

                                    </div>
                                    <div class="form-group  col-md-12">
                                        <?php echo e(Form::label('message',__('Message'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::textarea('message',null,array('class'=>'form-control','placeholder'=>__('Enter reminder message'),'rows'=>2))); ?>

                                    </div>
                                    <div class="form-group  col-md-12 text-end">
                                        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))); ?>

                                    </div>
                                </div>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <table class="display dataTable cell-border datatbl-advance">
                                <thead>
                                <tr>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Time')); ?></th>
                                    <th><?php echo e(__('Subject')); ?></th>
                                    <th><?php echo e(__('Created By')); ?></th>
                                    <?php if(Gate::check('show reminder')): ?>
                                    <th><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row">
                                        <td><?php echo e(dateFormat($reminder->date)); ?></td>
                                        <td><?php echo e(timeFormat($reminder->time)); ?></td>
                                        <td> <?php echo e($reminder->subject); ?> </td>
                                        <td> <?php echo e(!empty($reminder->createdBy)?$reminder->createdBy->name:'-'); ?> </td>
                                        <?php if(Gate::check('show reminder')): ?>
                                        <td>
                                            <a class="text-warning customModal" data-size="lg" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Show')); ?>" href="#"
                                               data-url="<?php echo e(route('reminder.show',$reminder->id)); ?>"
                                               data-title="<?php echo e(__('Details')); ?>"> <i data-feather="eye"></i></a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/reminder.blade.php ENDPATH**/ ?>