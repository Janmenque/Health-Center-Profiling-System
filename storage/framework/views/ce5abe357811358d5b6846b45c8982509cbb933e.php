<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Tag')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Tag')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('create tag')): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('tag.create')); ?>"
           data-title="<?php echo e(__('Create Tag')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Tag')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Tag')); ?></th>
                            <th><?php echo e(__('Created At')); ?></th>
                            <?php if(Gate::check('edit tag') ||  Gate::check('delete tag')): ?>
                                <th class="text-right"><?php echo e(__('Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr role="row">
                                <td>
                                    <?php echo e($tag->title); ?>

                                </td>
                                <td>
                                    <?php echo e($tag->created_at); ?>

                                </td>

                                <?php if(Gate::check('edit tag') ||  Gate::check('delete tag')): ?>
                                    <td class="text-right">
                                        <div class="cart-action">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['tag.destroy', $tag->id]]); ?>


                                            <?php if(Gate::check('edit tag') ): ?>
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Edit')); ?>" href="#"
                                                   data-url="<?php echo e(route('tag.edit',$tag->id)); ?>"
                                                   data-title="<?php echo e(__('Edit Tag')); ?>"> <i data-feather="edit"></i></a>
                                            <?php endif; ?>
                                            <?php if( Gate::check('delete tag')): ?>
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
                                                        data-feather="trash-2"></i></a>
                                            <?php endif; ?>
                                            <?php echo Form::close(); ?>

                                        </div>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/tag/index.blade.php ENDPATH**/ ?>