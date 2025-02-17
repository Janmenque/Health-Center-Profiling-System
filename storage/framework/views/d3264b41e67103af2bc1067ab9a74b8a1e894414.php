<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Packages')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Packages')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(\Auth::user()->type=='super admin' &&  (subscriptionPaymentSettings()['STRIPE_PAYMENT'] == 'on' || subscriptionPaymentSettings()['paypal_payment'] == 'on' || subscriptionPaymentSettings()['bank_transfer_payment'] == 'on' || subscriptionPaymentSettings()['flutterwave_payment'] == 'on' )): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('subscriptions.create')); ?>"
           data-title="<?php echo e(__('Create New Package')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Package')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row pricing-grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Amount')); ?></th>
                            <th><?php echo e(__('Interval')); ?></th>
                            <th><?php echo e(__('User Limit')); ?></th>
                            <th><?php echo e(__('Document Limit')); ?></th>
                            <th><?php echo e(__('Document History')); ?></th>
                            <th><?php echo e(__('Coupon Applicable')); ?></th>
                            <th><?php echo e(__('User Logged History')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($subscription->title); ?>

                                    <?php if(\Auth::user()->type!='super admin' && \Auth::user()->subscription == $subscription->id): ?>
                                        <a href="#" class="badge badge-success"><?php echo e(__('Active')); ?></a> <br>
                                        <span><?php echo e(\Auth::user()->subscription_expire_date ? dateFormat(\Auth::user()->subscription_expire_date):__('Unlimited')); ?></span><?php echo e(__('Expiry Date')); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(subscriptionPaymentSettings()['CURRENCY_SYMBOL'].$subscription->package_amount); ?> </td>
                                <td><?php echo e($subscription->interval); ?> </td>
                                <td><?php echo e($subscription->user_limit); ?> </td>
                                <td><?php echo e($subscription->document_limit); ?></td>
                                <td>
                                    <?php if($subscription->enabled_document_history==1): ?>
                                        <i class="text-success mr-4" data-feather="check-circle"></i>
                                    <?php else: ?>
                                        <i class="text-danger mr-4" data-feather="x-circle"></i>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($subscription->couponCheck()>0): ?>
                                        <i class="text-success mr-4" data-feather="check-circle"></i>
                                    <?php else: ?>
                                        <i class="text-danger mr-4" data-feather="x-circle"></i>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($subscription->enabled_logged_history==1): ?>
                                        <i class="text-success mr-4" data-feather="check-circle"></i>
                                    <?php else: ?>
                                        <i class="text-danger mr-4" data-feather="x-circle"></i>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="cart-action">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['subscriptions.destroy', $subscription->id]]); ?>

                                        <?php if(\Auth::user()->type=='owner' && \Auth::user()->subscription != $subscription->id): ?>
                                            <a class="text-warning" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Detail')); ?>"
                                               href="<?php echo e(route('subscriptions.show',\Illuminate\Support\Facades\Crypt::encrypt($subscription->id))); ?>"><i
                                                    data-feather="eye"></i></a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit pricing packages')): ?>
                                            <a class="text-success customModal" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Edit')); ?>" href="#"
                                               data-url="<?php echo e(route('subscriptions.edit',$subscription->id)); ?>"
                                               data-title="<?php echo e(__('Edit Package')); ?>"> <i data-feather="edit"></i></a>
                                        <?php endif; ?>
                                        <?php if($subscription->id!=1): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete pricing packages')): ?>
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
                                                        data-feather="trash-2"></i></a>
                                            <?php endif; ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/subscription/index.blade.php ENDPATH**/ ?>