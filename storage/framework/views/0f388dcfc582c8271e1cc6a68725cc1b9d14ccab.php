<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Total User')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['totalUser']); ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Total Document')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['totalDocument']); ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Today Document')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['todayDocument']); ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Total Category')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['totalCategory']); ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Total Reminder')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['totalReminder']); ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Today Reminder')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['todayReminder']); ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
            <div class="card sale-revenue">
                <div class="card-header">
                    <h4><?php echo e(__('Total Contact')); ?></h4>
                </div>
                <div class="card-body progressCounter">
                    <h2>
                        <span class="count"><?php echo e($result['totalContact']); ?></span>
                    </h2>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-xxl-12 cdx-xxl-50">
            <div class="card overall-revenuetbl">
                <div class="card-header">
                    <h4><?php echo e(__('Document By Category')); ?></h4>
                </div>
                <div class="card-body">
                    <div id="document_by_cat"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12 cdx-xxl-50">
            <div class="card overall-revenuetbl">
                <div class="card-header">
                    <h4><?php echo e(__('Document By Sub Category')); ?></h4>
                </div>
                <div class="card-body">
                    <div id="document_by_subcat"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        var documentByCategoryData=<?php echo json_encode($result['documentByCategory']['data']); ?>;
        var documentByCategory= <?php echo json_encode($result['documentByCategory']['category']); ?>;
        var documentBySubCategoryData= <?php echo json_encode($result['documentBySubCategory']['data']); ?>;
        var documentBySubCategory= <?php echo json_encode($result['documentBySubCategory']['category']); ?>;
    </script>

    <script src="<?php echo e(asset('js/custom/dashboard.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/dashboard/index.blade.php ENDPATH**/ ?>