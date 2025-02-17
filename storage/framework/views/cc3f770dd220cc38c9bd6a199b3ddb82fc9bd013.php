<!DOCTYPE html>
<?php
    $settings=settings();
?>
<html lang="en" style="<?php echo e(($settings['color_type']=='custom')?$settings['own_color']:''); ?>">
<?php echo $__env->make('admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="customizer-modal <?php echo e($settings['layout_direction']); ?> <?php echo e($settings['layout_mode']); ?>">
<!-- Loader Start-->
<div class="codex-loader">
    <div class="linespinner"></div>
</div>
<!-- Loader End-->
<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="themebody-wrap">
    <!-- breadcrumb start-->
    <div class="codex-breadcrumb">
        <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
                <?php echo $__env->yieldContent('breadcrumb'); ?>

            </div>
            <div class="right-breadcrumb">
                <ul>
                    <?php echo $__env->yieldContent('card-action-btn'); ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end-->
    <!-- theme body start-->
    <div class="theme-body <?php echo $__env->yieldContent('page-class'); ?> " data-simplebar>
        <div class="custom-container common-dash">
            <?php echo $__env->make('admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <!-- theme body start-->
</div>
<div class="modal fade" id="customModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5><a href="javascript:void(0);" data-bs-dismiss="modal"><i class="ti-close"></i></a>
            </div>
            <div class="body">
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>