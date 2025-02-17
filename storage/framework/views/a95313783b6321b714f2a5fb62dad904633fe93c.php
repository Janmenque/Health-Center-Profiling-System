<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        "use strict";
        $(document).on('click', '#time_duration', function () {
            if ($("#time_duration").is(':checked'))
                $(".time_duration").removeClass('d-none');
            else
                $(".time_duration").addClass('d-none');
        });
    </script>
<?php $__env->stopPush(); ?>
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
                        <?php if(Gate::check('create share document')): ?>
                            <div class="card-header">
                                <h4><?php echo e(__('Share Document')); ?></h4>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                                   aria-expanded="false" aria-controls="collapse1"> <i
                                        class="ti-plus mr-5"></i><?php echo e(__('Share Document')); ?></a>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="collapse1">
                                    <?php echo e(Form::open(array('route'=>array('document.share',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post'))); ?>

                                    <?php echo e(Form::hidden('document_id',$document->id,array('class'=>'form-control'))); ?>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <?php echo e(Form::label('assign_user',__('Assign Users'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::select('assign_user[]',$users,null,array('class'=>'form-control hidesearch','multiple'))); ?>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-check custom-chek">
                                                <input class="form-check-input" type="checkbox" name="time_duration"
                                                       value="1" id="time_duration">
                                                <label class="form-check-label"
                                                       for="time_duration"><?php echo e(__('Time Duration')); ?> ? </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 time_duration d-none">
                                            <div class="row">
                                                <div class="form-group  col-md-6">
                                                    <?php echo e(Form::label('start_date',__('Start Date'),array('class'=>'form-label'))); ?>

                                                    <?php echo e(Form::date('start_date',null,array('class'=>'form-control'))); ?>

                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <?php echo e(Form::label('end_date',__('End Date'),array('class'=>'form-label'))); ?>

                                                    <?php echo e(Form::date('end_date',null,array('class'=>'form-control'))); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  col-md-12 text-end">
                                            <?php echo e(Form::submit(__('Share'),array('class'=>'btn btn-primary btn-rounded'))); ?>

                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="display dataTable cell-border datatbl-advance">
                                <thead>
                                <tr>
                                    <th><?php echo e(__('User Name')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Assign At')); ?></th>
                                    <th><?php echo e(__('Start Date')); ?></th>
                                    <th><?php echo e(__('End Date')); ?></th>
                                    <?php if(Gate::check('delete share document')): ?>
                                    <th><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $shareDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shareDocument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row">
                                        <td><?php echo e(!empty($shareDocument->user)?$shareDocument->user->name:'-'); ?></td>
                                        <td><?php echo e(!empty($shareDocument->user)?$shareDocument->user->email:'-'); ?></td>
                                        <td><?php echo e(dateFormat($shareDocument->created_at)); ?></td>
                                        <td><?php echo e(!empty($shareDocument->start_date)?dateFormat($shareDocument->start_date):'-'); ?></td>
                                        <td><?php echo e(!empty($shareDocument->end_date)?dateFormat($shareDocument->end_date):'-'); ?></td>
                                        <?php if(Gate::check('delete share document')): ?>
                                        <td>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['document.share.destroy', $shareDocument->id]]); ?>

                                            <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
                                                    data-feather="trash-2"></i></a>
                                            <?php echo Form::close(); ?>

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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/share.blade.php ENDPATH**/ ?>