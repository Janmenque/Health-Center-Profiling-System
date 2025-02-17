<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Note')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Note')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('create note') || \Auth::user()->type=='super admin'): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('note.create')); ?>"
           data-title="<?php echo e(__('Create New Note')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Note')); ?></a>
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
                            <th><?php echo e(__('Last Name')); ?></th>
                            <th><?php echo e(__('First Name')); ?></th>
                            <th><?php echo e(__('Description')); ?></th>
                            <th><?php echo e(__('Created At')); ?></th>
                            <?php if(Gate::check('edit note') || Gate::check('delete note') || \Auth::user()->type=='super admin'): ?>
                                <th><?php echo e(__('Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($note->name); ?> </td>
                                <td><?php echo e($note->FirstName); ?> </td>
                                <td><?php echo e(!empty($note->description)?$note->description:'-'); ?> </td>
                                <td><?php echo e(dateFormat($note->created_at)); ?></td>
                                <?php if(Gate::check('edit note') || Gate::check('delete note') || \Auth::user()->type=='super admin'): ?>
                                    <td>
                                        <div class="cart-action">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['note.destroy', $note->id]]); ?>

                                            <?php if(!empty($note->attachment)): ?>
                                                <a href="<?php echo e(asset('/storage/upload/applicant/attachment/'.$note->attachment)); ?>"
                                                   target="_blank"><i data-feather="download"></i></a>
                                            <?php endif; ?>
                                            <?php if(Gate::check('edit note') || \Auth::user()->type=='super admin'): ?>
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Edit')); ?>" href="#"
                                                   data-url="<?php echo e(route('note.edit',$note->id)); ?>"
                                                   data-title="<?php echo e(__('Edit Note')); ?>"> <i data-feather="edit"></i></a>
                                            <?php endif; ?>
                                            <?php if(Gate::check('delete note') || \Auth::user()->type=='super admin'): ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/note/index.blade.php ENDPATH**/ ?>