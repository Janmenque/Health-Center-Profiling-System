
<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <meta name="author" content="<?php echo e(!empty($settings['app_name'])?$settings['app_name']:env('APP_NAME')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(!empty($settings['app_name'])?$settings['app_name']:env('APP_NAME')); ?> - <?php echo $__env->yieldContent('page-title'); ?> </title>

    <meta name="title" content="<?php echo e($settings['meta_seo_title']); ?>">
    <meta name="keywords" content="<?php echo e($settings['meta_seo_keyword']); ?>">
    <meta name="description" content="<?php echo e($settings['meta_seo_description']); ?>">


    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e($settings['meta_seo_title']); ?>">
    <meta property="og:description" content="<?php echo e($settings['meta_seo_description']); ?>">
    <meta property="og:image" content="<?php echo e(asset(Storage::url('upload/seo')).'/'.$settings['meta_seo_image']); ?>">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e($settings['meta_seo_title']); ?>">
    <meta property="twitter:description" content="<?php echo e($settings['meta_seo_description']); ?>">
    <meta property="twitter:image" content="<?php echo e(asset(Storage::url('upload/seo')).'/'.$settings['meta_seo_image']); ?>">

    <!-- shortcut icon-->
    <link rel="icon" href="<?php echo e(asset(Storage::url('upload/logo')).'/'.$settings['company_favicon']); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset(Storage::url('upload/logo')).'/'.$settings['company_favicon']); ?>" type="image/x-icon">
    <!-- Fonts css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link href="<?php echo e(asset('assets/css/vendor/font-awesome.css')); ?>" rel="stylesheet">
    <!-- themify icon-->
    <link href="<?php echo e(asset('assets/css/vendor/themify-icons.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/vendor/datatable/jquery.dataTables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/vendor/datatable/buttons.dataTables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/vendor/datatable/custom-datatable.css')); ?>" rel="stylesheet">

    <!-- Slick slider-->
    <link href="<?php echo e(asset('assets/css/vendor/slider/slick-slider/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/vendor/slider/slick-slider/slick-theme.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/vendor/select2/select2.css')); ?>" rel="stylesheet">

    <!-- Scrollbar-->
    <link href="<?php echo e(asset('assets/css/vendor/simplebar.css')); ?>" rel="stylesheet">
    <!-- Bootstrap css-->
    <link href="<?php echo e(asset('assets/css/vendor/bootstrap.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/vendor/sweetalert/sweetalert2.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('css-page'); ?>
    <!-- Custom css-->
    <?php
        $style=$settings['theme_color']=='color1'?'style.css':$settings['theme_color'].'.css';
        if($settings['color_type']=='custom'){
    $style='style.css';
}


    ?>
    <link href="<?php echo e(asset('assets/css/'.$style)); ?>" id="customstyle" rel="stylesheet">

    <link href="<?php echo e(asset('css/custom.css')); ?>"  rel="stylesheet">


</head>
<?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/admin/head.blade.php ENDPATH**/ ?>