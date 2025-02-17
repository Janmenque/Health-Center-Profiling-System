<div class="email-sidebar cdxapp-sidebar">
    <div class="card">
        <div class="card-header">
            <h4 ><?php echo e(__('Document Overview')); ?></h4>
        </div>
        <div class="card-body">
            <ul class="sidebarmenu-list custom-sidebarmenu-list">
                <li>
                    <a class="menu-item" href="<?php echo e(route('document.show',\Illuminate\Support\Facades\Crypt::encrypt($document->id))); ?>">
                        <div class="icons"><i data-feather="list"></i></div>
                        <?php echo e(__('Basic Details')); ?>

                    </a>
                </li>
                <?php if(Gate::check('manage comment')): ?>
                <li>
                    <a class="menu-item" href="<?php echo e(route('document.comment',\Illuminate\Support\Facades\Crypt::encrypt($document->id))); ?>">
                        <div class="icons"><i data-feather="message-circle"></i></div>
                        <?php echo e(__('Comment')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::check('manage reminder')): ?>
                <li>
                    <a class="menu-item" href="<?php echo e(route('document.reminder',\Illuminate\Support\Facades\Crypt::encrypt($document->id))); ?>">
                        <div class="icons"><i data-feather="user-check"></i></div>
                        <?php echo e(__('Reminder')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::check('manage version')): ?>
                <li>
                    <a class="menu-item" href="<?php echo e(route('document.version.history',\Illuminate\Support\Facades\Crypt::encrypt($document->id))); ?>">
                        <div class="icons"><i data-feather="briefcase"></i></div>
                        <?php echo e(__('Version History')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::check('manage share document')): ?>
                <li>
                    <a class="menu-item" href="<?php echo e(route('document.share',\Illuminate\Support\Facades\Crypt::encrypt($document->id))); ?>">
                        <div class="icons"><i data-feather="share-2"></i></div>
                        <?php echo e(__('Share')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::check('manage mail')): ?>
                <li>
                    <a class="menu-item" href="<?php echo e(route('document.send.email',\Illuminate\Support\Facades\Crypt::encrypt($document->id))); ?>">
                        <div class="icons"><i data-feather="mail"></i></div>
                        <?php echo e(__('Send Email')); ?>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/main.blade.php ENDPATH**/ ?>