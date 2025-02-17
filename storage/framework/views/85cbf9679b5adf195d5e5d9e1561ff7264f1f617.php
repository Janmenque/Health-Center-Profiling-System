

<?php
    $settings = settings();
    $registerPage = getSettingsValByName('register_page');
?>

<?php $__env->startSection('tab-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <?php if($settings['google_recaptcha'] == 'on'): ?>
        <?php echo NoCaptcha::renderJs(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        /* Background Image for the whole page */
        body {
            background-image: url("1.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }

        /* Additional styling for your login container */
        .codex-authbox {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background to make the text readable */
            padding: 40px;
            border-radius: 8px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .auth-header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .auth-header h3 {
            font-size: 2rem;
        }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        .auth-footer h6 a {
            color: #3498db;
        }
    </style>

    <div class="codex-authbox">
        <div class="auth-header">
            <div class="codex-brand">
                <a href="#">
                    <img class="img-fluid light-logo" src="<?php echo e(asset(Storage::url('upload/logo/')) . '/logo.png'); ?>" alt="">
                    <img class="img-fluid dark-logo" src="<?php echo e(asset(Storage::url('upload/logo/')) . '/logo.png'); ?>" alt="">
                </a>
            </div>
            <h3><?php echo e(__('Welcome to')); ?> <?php echo e(env('APP_NAME')); ?></h3>
        </div>

        <?php echo e(Form::open(array('route' => 'login', 'method' => 'post', 'id' => 'loginForm', 'class' => 'login-form'))); ?>

        <div class="form-group">
            <?php echo e(Form::label('email', __('Email'), array('class' => 'form-label'))); ?>

            <?php echo e(Form::text('email', null, array('class' => 'form-control', 'placeholder' => __('Enter Your Email')))); ?>

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
            <label class="form-label" for="Password"><?php echo e(__('Password')); ?></label>
            <div class="input-group group-input">
                <input class="form-control showhide-password" type="password" name="password" id="Password" placeholder="<?php echo e(__('Enter Your Password')); ?>" required>
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

        <div class="form-group mb-0">
            <div class="auth-remember">
                <div class="form-check custom-chek">
                    <input class="form-check-input" id="agree" type="checkbox" value="" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="agree"><?php echo e(__('Remember me')); ?></label>
                </div>
                <?php if(Route::has('password.request')): ?>
                    <a class="text-primary f-pwd" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot your password?')); ?></a>
                <?php endif; ?>
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
            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> <?php echo e(__('Login')); ?></button>
        </div>

        <?php echo e(Form::close()); ?>


        <div class="auth-footer">
            <?php if($registerPage == 'on'): ?>
                <h6 class="text-center"><?php echo e(__("Don't Have An Account?")); ?> <a class="text-primary" href="<?php echo e(route('register')); ?>"><?php echo e(__('Create an account')); ?></a></h6>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>