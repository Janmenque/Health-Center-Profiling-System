<?php echo e(Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('title',__('Title'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter category title')))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary btn-rounded'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /home/u538007105/domains/capstonesystem.website/public_html/resources/views/category/edit.blade.php ENDPATH**/ ?>