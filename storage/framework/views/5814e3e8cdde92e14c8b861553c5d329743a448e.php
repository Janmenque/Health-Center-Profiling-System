<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Transaction')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Transaction')); ?></a>
        </li>
    </ul>
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
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Subscription')); ?></th>
                            <th><?php echo e(__('Amount')); ?></th>
                            <th><?php echo e(__('Payment Type')); ?></th>
                            <th><?php echo e(__('Payment Status')); ?></th>
                            <th><?php echo e(__('Receipt')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(!empty($transaction->users)?$transaction->users->name:''); ?></td>
                                <td><?php echo e(dateFormat($transaction->created_at)); ?></td>
                                <td><?php echo e(!empty($transaction->subscriptions)?$transaction->subscriptions->title:'-'); ?></td>
                                <td><?php echo e($settings['CURRENCY_SYMBOL'].$transaction->amount); ?></td>
                                <td><?php echo e($transaction->payment_type); ?></td>
                                <td>
                                    <?php if($transaction->payment_status=='Pending'): ?>
                                        <span
                                            class="badge badge-warning"><?php echo e($transaction->payment_status); ?></span>
                                    <?php elseif($transaction->payment_status=='Success'): ?>
                                        <span
                                            class="badge badge-success"><?php echo e($transaction->payment_status); ?></span>
                                    <?php else: ?>
                                        <span
                                            class="badge badge-danger"><?php echo e($transaction->payment_status); ?></span>
                                    <?php endif; ?>


                                </td>
                                <td>
                                    <?php if($transaction->payment_type=='Stripe'): ?>
                                        <a class="text-primary" data-bs-toggle="tooltip" target="_blank"
                                           data-bs-original-title="<?php echo e(__('Receipt')); ?>" href="<?php echo e($transaction->receipt); ?>">
                                            <i data-feather="file"></i></a>
                                    <?php elseif($transaction->payment_type=='Bank Transfer'): ?>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['subscription.bank.transfer.action', [$transaction->id,'accept']]]); ?>


                                        <a class="text-primary" data-bs-toggle="tooltip" target="_blank"
                                           data-bs-original-title="<?php echo e(__('Receipt')); ?>"
                                           href="<?php echo e(asset('/storage/upload/payment_receipt/'.$transaction->receipt)); ?>">
                                            <i data-feather="file"></i></a>

                                        <?php if(\Auth::user()->type=='super admin' && $transaction->payment_status=='Pending'): ?>
                                            <a class="text-success" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Accept')); ?>"
                                               href="<?php echo e(route('subscription.bank.transfer.action', [$transaction->id,'accept'])); ?>">
                                                <i data-feather="user-check"></i></a>

                                            <a class="text-danger" data-bs-toggle="tooltip"
                                               data-bs-original-title="<?php echo e(__('Reject')); ?>"
                                               href="<?php echo e(route('subscription.bank.transfer.action', [$transaction->id,'reject'])); ?>">
                                                <i data-feather="user-x"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/subscription/transaction.blade.php ENDPATH**/ ?>