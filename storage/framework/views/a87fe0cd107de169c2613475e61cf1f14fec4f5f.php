<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Company Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Company Settings')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($settings, array('route' => array('setting.company'), 'method' => 'post'))); ?>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('company_name',__('Name'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('company_name',$settings['company_name'],array('class'=>'form-control','placeholder'=>__('Enter company name')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('company_email',__('Email'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('company_email',$settings['company_email'],array('class'=>'form-control','placeholder'=>__('Enter company email')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('company_phone',__('Phone Number'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('company_phone',$settings['company_phone'],array('class'=>'form-control','placeholder'=>__('Enter company phone')))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('company_address',__('Address'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::textarea('company_address',$settings['company_address'], array('class' => 'form-control','rows'=>'2'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('CURRENCY_SYMBOL',__('Currency Icon'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('CURRENCY_SYMBOL',$settings['CURRENCY_SYMBOL'],array('class'=>'form-control','placeholder'=>__('Enter currency symbol')))); ?>

                        </div>
                        <div class="col-md-6">
                            <?php echo e(Form::label('timezone',__('Timezone'),['class'=>'form-label text-dark'])); ?>

                            <select type="text" name="timezone" class="form-control basic-select" id="timezone">
                                <option value=""><?php echo e(__('Select Timezone')); ?></option>
                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>" <?php echo e(($settings['timezone']==$k)?'selected':''); ?>><?php echo e($timezone); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <?php echo e(Form::label('company_zipcode',__('System Date Format'),array('class'=>'form-label'))); ?>

                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_date_format1" name="company_date_format" class="custom-control-input" value="M j, Y" <?php echo e(($settings['company_date_format'] =='M j, Y')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_date_format1"><?php echo e(date('M d,Y')); ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_date_format2" name="company_date_format" class="custom-control-input" value="y-m-d" <?php echo e(($settings['company_date_format'] =='y-m-d')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_date_format2"><?php echo e(date('y-m-d')); ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_date_format3" name="company_date_format" class="custom-control-input" value="d-m-y" <?php echo e(($settings['company_date_format'] =='d-m-y')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_date_format3"><?php echo e(date('d-m-y')); ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_date_format4" name="company_date_format" class="custom-control-input" value="m-d-y" <?php echo e(($settings['company_date_format'] =='m-d-y')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_date_format4"><?php echo e(date('m-d-y')); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <?php echo e(Form::label('company_zipcode',__('System Time Format'),array('class'=>'form-label'))); ?>

                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_time_format1" name="company_time_format" class="custom-control-input" value="H:i" <?php echo e(($settings['company_time_format'] =='H:i')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_time_format1"><?php echo e(date('H:i')); ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_time_format2" name="company_time_format" class="custom-control-input" value="g:i A" <?php echo e(($settings['company_time_format'] =='g:i A')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_time_format2"><?php echo e(date('g:i A')); ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="company_time_format3" name="company_time_format" class="custom-control-input" value="g:i a" <?php echo e(($settings['company_time_format'] =='g:i a')?'checked':''); ?>>
                                    <label class="custom-control-label" for="company_time_format3"><?php echo e(date('g:i a')); ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-10">
                            <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary btn-rounded'))); ?>

                        </div>
                    </div>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/settings/company.blade.php ENDPATH**/ ?>