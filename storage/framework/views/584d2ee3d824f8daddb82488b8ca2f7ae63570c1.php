<?php
    $users=\Auth::user();
   $languages=\App\Models\Custom::languages();
   $userLang=\Auth::user()->lang;
   $profile=asset(Storage::url('upload/profile'));
?>
    <!-- Header Start-->
<header class="codex-header">
    <div class="header-contian d-flex justify-content-between align-items-center">
        <div class="header-left d-flex align-items-center">
            <div class="sidebar-action navicon-wrap"><i data-feather="menu"></i></div>
            <ul class="nav-iconlist">
                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">

                        <span class="align-middle d-none d-sm-inline-block"><?php echo e(ucfirst($userLang)); ?></span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-animated topbar-dropdown-menu">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($language!='en'): ?>
                                <a href="<?php echo e(route('language.change',$language)); ?>" class="dropdown-item notify-item">
                                    <span class="align-middle"><?php echo e(ucfirst( $language)); ?></span>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
            </ul>
        </div>
        <div class="header-right d-flex align-items-center justify-content-end">
            <ul class="nav-iconlist">
                <?php if(\Auth::user()->type=='super admin' || \Auth::user()->type=='owner'): ?>
                    <li data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Theme Settings')); ?>"
                        data-bs-placement="bottom">
                        <div class="navicon-wrap customizer-action"><i class="fa fa-cog"></i></div>
                    </li>
                <?php endif; ?>
                <li class="nav-profile">
                    <div class="media">
                        <div class="user-icon"><img class="img-fluid rounded-50"
                                                    src="<?php echo e((!empty($users->profile)? $profile.'/'.$users->profile : $profile.'/avatar.png')); ?>"
                                                    alt="logo"></div>
                        <div class="media-body">
                            <h6><?php echo e(\Auth::user()->name); ?></h6><span class="text-light"><?php echo e(\Auth::user()->type); ?></span>
                        </div>
                    </div>
                    <div class="hover-dropdown navprofile-drop">
                        <ul>
                            <li><a href="<?php echo e(route('setting.account')); ?>"><i class="ti-user"></i><?php echo e(__('Profile')); ?></a></li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="fa fa-sign-out"></i><?php echo e(__('Logout')); ?></a>
                                <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- Header End-->
<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/admin/header.blade.php ENDPATH**/ ?>