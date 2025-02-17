<!-- footer start-->
<footer class="codex-footer">
    <p><?php echo e(__('Copyright')); ?> <?php echo e(date('Y')); ?> © <?php echo e(env('APP_NAME')); ?> <?php echo e(__('All rights reserved')); ?>.</p>
</footer>
<!-- footer end-->
<!-- back to top start //-->
<div class="scroll-top"><i class="fa fa-angle-double-up"></i></div>
<!-- back to top end //-->
<!-- main jquery-->
<script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
<!-- Theme Customizer-->
<script src="<?php echo e(asset('assets/js/layout-storage.js')); ?>"></script>

<?php if(\Auth::user()->type=='super admin' || \Auth::user()->type=='owner'): ?>
    <script>
        var public_path='<?php echo e(asset('assets/css/')); ?>';
        $(".customizer-modal").append('' +
            '<form method="post" action="<?php echo e(route("theme.settings")); ?>"><?php echo e(csrf_field()); ?><div class="customizer-layer"></div>' +
            '<div class="customizer-action bg-primary"><i data-feather="settings"></i>' +
            '</div><div class="theme-cutomizer"> ' +
            '<div class="customizer-header"> <h4><?php echo e(__('Theme Setting')); ?></h4> ' +
            '<div class="close-customizer"><i data-feather="x"></i></div>' +
            '</div>' +
            '<input type="hidden" name="theme_color" id="theme_color" value="<?php echo e($settings['theme_color']); ?>">' +
            '<input type="hidden" name="sidebar_mode" id="sidebar_mode" value="<?php echo e($settings['sidebar_mode']); ?>">' +
            '<input type="hidden" name="layout_direction" id="layout_direction" value="<?php echo e($settings['layout_direction']); ?>">' +
            '<input type="hidden" name="layout_mode" id="layout_mode" value="<?php echo e($settings['layout_mode']); ?>">' +
            '<input type="hidden" name="own_color" id="own_color" value="<?php echo e($settings['own_color']); ?>">' +
            '<input type="hidden" name="own_color_code" id="own_color_code" value="<?php echo e($settings['own_color_code']); ?>">' +
            '<input type="hidden" name="color_type" id="color_type" value="<?php echo e($settings['color_type']); ?>">' +
            '<div class="customizer-body"> ' +
            '<div class="cutomize-group"> ' +
            '<h6 class="customizer-title"><?php echo e(__('Theme Color')); ?></h6> ' +
            '<ul class="customizeoption-list themecolor-list" > ' +
            '<li class="color1 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color1'?'active-mode':''); ?>"></li>' +
            '<li class="color2 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color2'?'active-mode':''); ?>"></li>' +
            '<li class="color3 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color3'?'active-mode':''); ?>"></li>' +
            '<li class="color4 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color4'?'active-mode':''); ?>"></li>' +
            '<li class="color5 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color5'?'active-mode':''); ?>"></li>' +
            '<li class="color6 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color6'?'active-mode':''); ?>"></li>' +
            '<li class="color7 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color7'?'active-mode':''); ?>"></li>' +
            '<li class="color8 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color8'?'active-mode':''); ?>"></li>' +
            '<li class="color9 <?php echo e($settings['color_type']=='default' && $settings['theme_color']=='color9'?'active-mode':''); ?>"></li>' +
            '</ul> ' +
            '<ul class="" > ' +
            '<li class="custom-color"><?php echo e(__('Choose Your Own Color')); ?> <input class="" value="<?php echo e($settings['own_color_code']); ?>" id="colorChange" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id7="transparentcolor" ></li>'+
            '</ul> ' +
            '</div>' +

            '<div class="cutomize-group "> ' +
            '<h6 class="customizer-title"><?php echo e(__('Layout mode')); ?></h6> ' +
            '<ul class="customizeoption-list"> ' +
            '<li class="light-action <?php echo e($settings['layout_mode']=='lightmode'?'active-mode':''); ?>"><?php echo e(__('Light')); ?></li>' +
            '<li class="dark-action <?php echo e($settings['layout_mode']=='darkmode'?'active-mode':''); ?>"><?php echo e(__('Dark')); ?></li>' +
            '</ul> ' +
            '</div>' +
            '<div class="cutomize-group"> ' +
            '<h6 class="customizer-title"><?php echo e(__('Sidebar Mode')); ?></h6> ' +
            '<ul class="customizeoption-list sidebaroption-list"> ' +
            '<li class="sidebarlight-action <?php echo e($settings['sidebar_mode']=='light'?'active-mode':''); ?>"><?php echo e(__('Light')); ?></li>' +
            '<li class="sidebardark-action <?php echo e($settings['sidebar_mode']=='dark'?'active-mode':''); ?>"><?php echo e(__('Dark')); ?></li>' +
            '<li class="sidebargradient-action <?php echo e($settings['sidebar_mode']=='gradient'?'active-mode':''); ?>"><?php echo e(__('Gradient')); ?></li>' +
            '</ul> ' +
            '</div>' +
            '<div class="cutomize-group"> ' +
            '<h6 class="customizer-title"><?php echo e(__('Layout Direction')); ?></h6> ' +
            '<ul class="customizeoption-list"> ' +
            '<li class="ltr-action <?php echo e($settings['layout_direction']=='ltrmode'?'active-mode':''); ?>"><?php echo e(__('LTR')); ?></li>' +
            '<li class="rtl-action <?php echo e($settings['layout_direction']=='rtlmode'?'active-mode':''); ?>"><?php echo e(__('RTL')); ?></li>' +
            '</ul> ' +
            '</div>' +

            <?php if(\Auth::user()->type=='super admin'): ?>
                '<div class="cutomize-group"> ' +
            '<h6 class="customizer-title"><?php echo e(__('Registration Page')); ?></h6> ' +
            '<div> <label class="switch with-icon switch-primary"><input type="checkbox" name="register_page" id="register_page" <?php echo e($settings['register_page']=='on'?'checked':''); ?>>' +
            '<span class="switch-btn"></span></label></div>' +
            '</div>' +

            '<div class="cutomize-group"> ' +
            '<h6 class="customizer-title"><?php echo e(__('Landing Page')); ?></h6> ' +
            '<div> <label class="switch with-icon switch-primary"><input type="checkbox" name="landing_page" id="landing_page" <?php echo e($settings['landing_page']=='on'?'checked':''); ?>>' +
            '<span class="switch-btn"></span></label></div>' +
            '</div>' +

            <?php endif; ?>
                '<button type="submit" class="btn btn-primary mt-20"><?php echo e(__('Save')); ?></button>' +
            '</div>' +
            '</div></form>' +
            '');
    </script>
<?php endif; ?>
<script src="<?php echo e(asset('assets/js/customizer.js')); ?>"></script>
<!-- Feather icons js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.js')); ?>"></script>
<!-- Scrollbar-->
<script src="<?php echo e(asset('assets/js/vendors/simplebar.js')); ?>"></script>
<!-- apex chart-->
<script src="<?php echo e(asset('assets/js/vendors/chart/apexcharts.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/vendors/select2/select2.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/vendors/sweetalert/sweetalert2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/sweetalert/custom-sweetalert2.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/vendors/slider/slick-sldier/slick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/slider/slick-sldier/slick-custom.js')); ?>"></script>
<!-- Datatable-->
<script src="<?php echo e(asset('assets/js/vendors/datatable/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/dataTables.buttons.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/buttons.print.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/jszip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/pdfmake.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/buttons.html5.js')); ?>"></script>

<!-- Custom script-->

<script src="<?php echo e(asset('assets/js/vendors/notify/bootstrap-notify.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/custom-script.js')); ?>"></script>
<?php echo $__env->yieldPushContent('script-page'); ?>

<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php if($statusMessage = Session::get('info')): ?>
    <script>toastrs('Info', '<?php echo $statusMessage; ?>', 'info')</script>
<?php endif; ?>
<?php if($statusMessage = Session::get('success')): ?>
    <script>
        toastrs('Success', '<?php echo $statusMessage; ?>', 'success')
    </script>
<?php endif; ?>
<?php if($statusMessage = Session::get('error')): ?>
    <script>toastrs('Error', '<?php echo $statusMessage; ?>', 'error')</script>
<?php endif; ?>




<?php /**PATH C:\xampp\htdocs\HealthCenterProfilingSystem\resources\views/admin/footer.blade.php ENDPATH**/ ?>