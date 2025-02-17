<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('document.index')); ?>"><?php echo e(__('Document')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Details')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="cdxemail-contain">
                <?php echo $__env->make('document.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="email-body">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo e(__('Basic Details')); ?></h4>
                            <div class="float-right">
                                <?php if(Gate::check('edit document')): ?>
                                    <a class="btn btn-primary" data-bs-toggle="tooltip"
                                       data-bs-original-title="<?php echo e(__('Preview')); ?>"
                                       href="<?php echo e(!empty($latestVersion->document)? asset(Storage::url('upload/document/')).'/'.$latestVersion->document : '#'); ?>"
                                       target="_blank"><i data-feather="maximize"> </i></a>
                                <?php endif; ?>
                                <?php if(Gate::check('download document')): ?>
                                    <a class="btn btn-primary" data-bs-toggle="tooltip"
                                       data-bs-original-title="<?php echo e(__('Download')); ?>"
                                       href="<?php echo e(!empty($latestVersion->document)? asset(Storage::url('upload/document/')).'/'.$latestVersion->document : '#'); ?>"><i
                                            data-feather="download"> </i></a>
                                <?php endif; ?>
                                <?php if(Gate::check('preview document')): ?>
                                    <a class="btn btn-primary customModal" data-bs-toggle="tooltip"
                                       data-bs-original-title="<?php echo e(__('Edit')); ?>" href="#"
                                       data-url="<?php echo e(route('document.edit',$document->id)); ?>"
                                       data-title="<?php echo e(__('Edit Support')); ?>"> <i data-feather="edit"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="Primary">
                                    <ul class="mail-list" data-simplebar>
                                    <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Family Serial Number')); ?></h6>
                                                <p><?php echo e($document->FamilySerialNumber); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Last Name')); ?></h6>
                                                <p><?php echo e($document->name); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Middle Name')); ?></h6>
                                                <p><?php echo e($document->middlename); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('First Name')); ?></h6>
                                                <p><?php echo e($document->FirstName); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Sex')); ?></h6>
                                                <p><?php echo e($document->Sex); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Date Of Birth')); ?></h6>
                                                <p><?php echo e($document->DateofBirth); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Place Of Birth')); ?></h6>
                                                <p><?php echo e($document->PlaceofBirth); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Name Of Mother')); ?></h6>
                                                <p><?php echo e($document->NameofMother); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Name Of Father')); ?></h6>
                                                <p><?php echo e($document->NameofFather); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Spouse')); ?></h6>
                                                <p><?php echo e($document->Spouse); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Educational Background')); ?></h6>
                                                <p><?php echo e($document->EducationalAttainment); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Address')); ?></h6>
                                                <p><?php echo e($document->Adress); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Contact Number')); ?></h6>
                                                <p><?php echo e($document->ContactNumber); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Category')); ?></h6>
                                                <p><?php echo e(!empty($document->category)?$document->category->title:'-'); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Sub Category')); ?></h6>
                                                <p><?php echo e(!empty($document->subCategory)?$document->subCategory->title:'-'); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Created By')); ?></h6>
                                                <p><?php echo e(!empty($document->createdBy)?$document->createdBy->name:''); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Created At')); ?></h6>
                                                <p><?php echo e(dateFormat($document->created_at)); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Tags')); ?></h6>
                                                <p>
                                                    <?php $__currentLoopData = $document->tags(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($tag->title); ?>,
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mail-item">
                                                <i class="like-mail text-warning" data-feather="star"></i>
                                                <h6 class="parson-name"><?php echo e(__('Description')); ?></h6>
                                                <p><?php echo e($document->description); ?> </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/document/show.blade.php ENDPATH**/ ?>