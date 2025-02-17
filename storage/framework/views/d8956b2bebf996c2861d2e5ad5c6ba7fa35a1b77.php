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
                    <?php if(Gate::check('create version')): ?>
                        <div class="card buttons">
                            <div class="card-header">
                                <h4><?php echo e(__('Version History')); ?></h4>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                                   aria-expanded="false" aria-controls="collapse1"> <i
                                        class="ti-plus mr-5"></i><?php echo e(__('New Version')); ?></a>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="collapse1">
                                    <?php echo e(Form::open(array('route'=>array('document.new.version',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post','enctype' => "multipart/form-data"))); ?>

                                    <?php echo e(Form::hidden('document_id',$document->id,array('class'=>'form-control'))); ?>

                                    <div class="row">
                                        <div class="form-group  col-md-12">
                                            <?php echo e(Form::label('document',__('Document'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::file('document',array('class'=>'form-control'))); ?>

                                        </div>
                                        <div class="form-group  col-md-12 text-end">
                                            <?php echo e(Form::submit(__('Upload'),array('class'=>'btn btn-primary btn-rounded'))); ?>

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
                                    <th><?php echo e(__('Uploaded At')); ?></th>
                                    <th><?php echo e(__('Uploaded By')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <?php if(Gate::check('preview document') ||  Gate::check('download document')): ?>
                                        <th><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row">
                                        <td><?php echo e(dateFormat($version->created_at)); ?> <?php echo e(timeFormat($version->created_at)); ?></td>
                                        <td><?php echo e(!empty($version->createdBy)?$version->createdBy->name:'-'); ?></td>
                                        <td>
                                            <?php if($version->current_version==1): ?>
                                                <span class="badge badge-success"><?php echo e(__('Current Version')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-warning"><?php echo e(__('Old Version')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(Gate::check('preview document') ||  Gate::check('download document')): ?>
                                            <td>
                                                <?php if(Gate::check('preview document') ): ?>
                                                    <a class="text-info" data-bs-toggle="tooltip"
                                                       data-bs-original-title="<?php echo e(__('View')); ?>"
                                                       href="<?php echo e(!empty($version->document)? asset(Storage::url('upload/document/')).'/'.$version->document : '#'); ?>"
                                                       target="_blank"> <i data-feather="maximize"></i></a>
                                                <?php endif; ?>
                                                <?php if(Gate::check('download document')): ?>
                                                    <a class="text-primary" data-bs-toggle="tooltip"
                                                       data-bs-original-title="<?php echo e(__('Download')); ?>"
                                                       href="<?php echo e(!empty($version->document)? asset(Storage::url('upload/document/')).'/'.$version->document : '#'); ?>"
                                                       download=""> <i data-feather="download"></i></a>
                                                <?php endif; ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/version_history.blade.php ENDPATH**/ ?>