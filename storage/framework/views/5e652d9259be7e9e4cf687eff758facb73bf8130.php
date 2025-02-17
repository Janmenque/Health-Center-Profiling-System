<?php
    $settings=settings();
?>
<?php $__env->startSection('tab-title'); ?>
    <?php echo e(__('Reset Password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <?php if($settings['google_recaptcha'] == 'on'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="codex-authbox">
        <div class="auth-header">
            <div class="codex-brand">
                <a href="#">
                    <img class="img-fluid light-logo" src="<?php echo e(asset(Storage::url('upload/logo/')).'/logo.png'); ?>" alt="">
                    <img class="img-fluid dark-logo" src="<?php echo e(asset(Storage::url('upload/logo/')).'/logo.png'); ?>" alt="">
                </a>
            </div>
            <h3><?php echo e(__('forgot password ?')); ?></h3>
            <p><?php echo e(__('Enter Your Email And Well Send You A Link To Reset')); ?> <br> <?php echo e(__('Your Password.')); ?></p>
        </div>

        <?php if(session('status')): ?>
            <div class="alert alert-primary">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <?php echo e(Form::open(array('route'=>'password.email','method'=>'post','id'=>'loginForm'))); ?>

        <div class="form-group mb-0">
            <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter your email')))); ?>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-email text-danger" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <?php if($settings['google_recaptcha'] == 'on'): ?>
            <div class="form-group">
                <label for="email" class="form-label"></label>
                <?php echo NoCaptcha::display(); ?>

                <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="small text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <?php if($errors->has('g-recaptcha-response')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                </span>
            <?php endif; ?>
        <?php endif; ?>
        <div class="form-group mb-0">
            <button class="btn btn-primary" type="submit"><i class="fa fa-key"></i> <?php echo e(__('Send Reset Link')); ?></button>
        </div>
        <div class="auth-footer">
            <h6 class="text-center"><?php echo e(__('Back to')); ?> <a class="text-primary" href="<?php echo e(route('login')); ?>"><?php echo e(__('Log In')); ?></a></h6>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>