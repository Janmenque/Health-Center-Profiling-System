<div class="modal-body">
    <div class="product-card">
        <div class="row">
            <div class="col-6">
                <div class="detail-group">
                    <h6><?php echo e(__('Date')); ?></h6>
                    <p class="mb-20"><?php echo e(dateFormat($reminder->date)); ?></p>
                </div>
            </div>
            <div class="col-6">
                <div class="detail-group">
                    <h6><?php echo e(__('Time')); ?></h6>
                    <p class="mb-20"><?php echo e(timeFormat($reminder->time)); ?></p>
                </div>
            </div>
            <div class="col-6">
                <div class="detail-group">
                    <h6><?php echo e(__('Created By')); ?></h6>
                    <p class="mb-20"> <?php echo e(!empty($reminder->createdBy)?$reminder->createdBy->name:'-'); ?> </p>
                </div>
            </div>
            <div class="col-6">
                <div class="detail-group">
                    <h6><?php echo e(__('Assign User')); ?></h6>
                    <p class="mb-20">
                        <?php $__currentLoopData = $reminder->users(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($user->name); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="detail-group">
                    <h6><?php echo e(__('Subject')); ?></h6>
                    <p class="mb-20"><?php echo e($reminder->subject); ?></p>
                </div>
            </div>
            <div class="col-12">
                <div class="detail-group">
                    <h6><?php echo e(__('Message')); ?></h6>
                    <p class="mb-20"><?php echo e($reminder->message); ?> </p>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/reminder/show.blade.php ENDPATH**/ ?>