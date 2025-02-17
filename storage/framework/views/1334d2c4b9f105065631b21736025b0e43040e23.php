<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Role')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Roles')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create role')): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="<?php echo e(route('role.create')); ?>"> <i
                class="ti-plus mr-5"></i><?php echo e(__('Create Role')); ?></a>
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
                            <th><?php echo e(__('Role')); ?></th>
                            <th><?php echo e(__('Assigned Users')); ?></th>
                            <th><?php echo e(__('Assigned Permissions')); ?></th>
                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $roleData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ucfirst($role->name)); ?> </td>
                                <td><?php echo e(\Auth::user()->roleWiseUserCount($role->name)); ?></td>
                                <td><?php echo e($role->permissions()->count()); ?></td>
                                <td class="text-right">
                                    <div class="cart-action">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $role->id]]); ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit role')): ?>
                                            <a class="text-success" data-size="xl" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Edit')); ?>"
                                               href="<?php echo e(route('role.edit',$role->id)); ?>"> <i
                                                    data-feather="edit"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete role')): ?>
                                            <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
                                                    data-feather="trash-2"></i></a>
                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/role/index.blade.php ENDPATH**/ ?>