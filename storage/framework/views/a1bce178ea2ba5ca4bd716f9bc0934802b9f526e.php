<?php
    $settings=settings();
?>
<?php $__env->startSection('tab-title'); ?>
    <?php echo e(__('Register')); ?>

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
            <h3><?php echo e(__('Create your account')); ?></h3>
        </div>
        <?php echo e(Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm'))); ?>

        <div class="form-group ">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Your Name')))); ?>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-name text-danger" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group ">
            <?php echo e(Form::label('email',__('Email'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))); ?>

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

        <div class="form-group">
            <?php echo e(Form::label('password',__('Password'),array('class'=>'form-label'))); ?>

            <div class="input-group group-input">
                <input class="form-control showhide-password" type="password" name="password" id="Password"
                       placeholder="<?php echo e(__('Enter Your Password')); ?>" required="">
                <span class="input-group-text toggle-show fa fa-eye"></span>
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-password text-danger" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('password_confirmation',__('Password Confirmation'),array('class'=>'form-label'))); ?>

            <div class="input-group group-input">
                <input class="form-control showhide-password" type="password" name="password_confirmation" id="password_confirmation"
                       placeholder="<?php echo e(__('Enter Your Confirm Password')); ?>" required="">
                <span class="input-group-text toggle-show fa fa-eye"></span>
            </div>
            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-password_confirmation text-danger" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group mb-0">
            <div class="auth-remember">
                <div class="form-check custom-chek">
                    <input class="form-check-input" id="agree" type="checkbox" value="" required="">
                    <label class="form-check-label" for="agree"><?php echo e(__('I Agree Terms and conditions')); ?></label>
                </div>
            </div>
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
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> <?php echo e(__('Register')); ?></button>
        </div>
        <?php echo e(Form::close()); ?>

        <div class="auth-footer">
            <h6 class="text-center"><?php echo e(__('Already have an account?')); ?> <a class="text-primary" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login in here')); ?></a></h6>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>