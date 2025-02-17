<?php
    $profile=asset(Storage::url('upload/profile/'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">
                <?php echo e(__('Users')); ?>

            </a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('manage user')): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="lg"
           data-url="<?php echo e(route('users.create')); ?>"
           data-title="<?php echo e(__('Add New User')); ?>"> <i
                class="ti-plus mr-5"></i>
            <?php echo e(__('Create User')); ?>

        </a>
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
                            <th><?php echo e(__('User')); ?></th>
                            <th><?php echo e(__('Email')); ?></th>
                            <th><?php echo e(__('Phone Number')); ?></th>
                            <?php if(\Auth::user()->type=='super admin'): ?>
                                <th><?php echo e(__('Active Package')); ?></th>
                                <th><?php echo e(__('Package Due Date')); ?></th>
                            <?php else: ?>
                                <th><?php echo e(__('Assign Role')); ?></th>
                            <?php endif; ?>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="table-user">
                                    <img
                                        src="<?php echo e(!empty($user->avatar)?asset(Storage::url('upload/profile')).'/'.$user->avatar:asset(Storage::url('upload/profile')).'/avatar.png'); ?>"
                                        alt="" class="mr-2 avatar-sm rounded-circle user-avatar">
                                    <a href="#" class="text-body font-weight-semibold"><?php echo e($user->name); ?></a>
                                </td>
                                <td><?php echo e($user->email); ?> </td>
                                <td><?php echo e(!empty($user->phone_number)?$user->phone_number:'-'); ?> </td>
                                <?php if(\Auth::user()->type=='super admin'): ?>
                                    <td><?php echo e(!empty($user->subscriptions)?$user->subscriptions->title:'-'); ?> </td>
                                    <td><?php echo e(!empty($user->plan_expire_date) ? dateFormat($user->plan_expire_date): __('Unlimited')); ?> </td>
                                <?php else: ?>
                                    <td><?php echo e(ucfirst($user->type)); ?> </td>
                                <?php endif; ?>
                                <td>
                                    <div class="cart-action">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]); ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit user')): ?>
                                            <a class="text-success customModal" data-bs-toggle="tooltip" data-size="lg"
                                               data-bs-original-title="<?php echo e(__('Edit')); ?>" href="#"
                                               data-url="<?php echo e(route('users.edit',$user->id)); ?>"
                                               data-title="<?php echo e(__('Edit User')); ?>"> <i data-feather="edit"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete user')): ?>
                                            <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
                                                    data-feather="trash-2"></i></a>
                                        <?php endif; ?>
                                        <?php echo Form::close(); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/user/index.blade.php ENDPATH**/ ?>