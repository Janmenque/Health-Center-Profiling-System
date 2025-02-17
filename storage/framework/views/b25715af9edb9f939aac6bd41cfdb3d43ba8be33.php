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
                    <?php if(Gate::check('create comment')): ?>
                    <div class="card buttons">
                        <div class="card-header">
                            <h4><?php echo e(__('Comment')); ?></h4>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button"
                               aria-expanded="false" aria-controls="collapse1"> <i
                                    class="ti-plus mr-5"></i><?php echo e(__('Add Comment')); ?></a>
                        </div>
                        <div class="card-body">
                            <div class="collapse" id="collapse1">
                               <div class="row">
                                   <?php echo e(Form::open(array('route'=>array('document.comment',\Illuminate\Support\Facades\Crypt::encrypt($document->id)),'method'=>'post'))); ?>

                                   <div class="form-group">
                                       <?php echo e(Form::textarea('comment',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Write a comment')))); ?>

                                   </div>
                                   <div class="form-group col-md-12 text-end">
                                       <?php echo e(Form::submit(__('Add'),array('class'=>'btn btn-primary'))); ?>

                                   </div>
                                   <?php echo e(Form::close()); ?>

                               </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="card">

                        <div class="card-body">
                            <ul class="blgcomment-list">
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="reply-comment1">
                                    <div class="comment-item">
                                        <div class="media">
                                            <img class="img-fluid" src="<?php echo e((!empty($comment->user)? asset(Storage::url('upload/profile/')).'/'.$comment->user->profile : asset(Storage::url('upload/profile')).'/avatar.png')); ?>" alt="">
                                            <div class="media-body">
                                                <a href="#">
                                                    <h5> <?php echo e(!empty($comment->user)?$comment->user->name:'-'); ?> <span class="comment-time">  <i class="fa fa-calendar"></i><?php echo e(dateFormat($comment->created_at)); ?></span>
                                                    </h5>
                                                </a>
                                                <p> <?php echo e($comment->comment); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/comment.blade.php ENDPATH**/ ?>