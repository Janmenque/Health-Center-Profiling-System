<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Contact')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('manage contact') || \Auth::user()->type=='super admin'): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('contact.create')); ?>"
           data-title="<?php echo e(__('Create Contact')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Contact')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-md-6 cdx-xxl-50 cdx-xl-50">
                <div class="card contact-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4><?php echo e($contact->name); ?>  </h4>
                                <h6 class="text-light"><?php echo e($contact->email); ?></h6>
                            </div>
                            <?php if(Gate::check('edit contact') || Gate::check('delete contact') || \Auth::user()->type=='super admin'): ?>
                                <div class="user-setting">
                                    <div class="action-menu">
                                        <div class="action-toggle"><i data-feather="more-vertical"></i></div>
                                        <ul class="action-dropdown">
                                            <?php if(Gate::check('edit contact') || \Auth::user()->type=='super admin'): ?>
                                                <li><a class="customModal"
                                                       data-url="<?php echo e(route('contact.edit',$contact->id)); ?>"
                                                       data-title="<?php echo e(__('Edit Contact')); ?>"> <i
                                                            data-feather="edit"> </i><?php echo e(__('Edit Contact')); ?></a></li>
                                            <?php endif; ?>
                                            <?php if(Gate::check('edit contact') || \Auth::user()->type=='super admin'): ?>
                                                <li>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['contact.destroy', $contact->id],'id'=>'user-'.$contact->id]); ?>

                                                    <a href="#" class="confirm_dialog"> <i
                                                            data-feather="trash"></i><?php echo e(__('Delete Contact')); ?></a>
                                                    <?php echo Form::close(); ?>

                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="user-detail">
                            <h5 class="text-primary mb-10"><?php echo e($contact->subject); ?></h5>

                            <ul class="info-list">
                                <li><span><?php echo e(__('Contact Number')); ?>  :- </span><?php echo e($contact->contact_number); ?> </li>
                                <li>
                                    <span><?php echo e(__('Created Date')); ?> :- </span><?php echo e(dateFormat($contact->created_at)); ?>

                                </li>

                            </ul>
                            <div class="user-action">
                                <p class="text-light"> <?php echo e($contact->message); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/contact/index.blade.php ENDPATH**/ ?>