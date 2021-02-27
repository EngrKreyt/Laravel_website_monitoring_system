
<?php $__env->startSection('title'); ?>
    About Us Edit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Website - Edit Data</h4>

      <form action="<?php echo e(url('aboutus-update/'.$aboutus->id)); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>



      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Company:</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($aboutus->title); ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Website:</label>
            <input type="text" name="link" class="form-control" value="<?php echo e($aboutus->link); ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Status:</label>
<!--            <textarea name="description" class="form-control" rows="6" cols="5"><?php echo e($aboutus->description); ?></textarea>-->
            <select class="form-control" name="description">
              <option value="Site is Up!">Site is Up!</option>
              <option value="Site is Down!">Site is Down!</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" name="date" class="form-control" value="<?php echo e($aboutus->date); ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Time:</label>
            <input type="time" name="time" class="form-control" value="<?php echo e($aboutus->time); ?>">
          </div>

      </div>
      <div class="modal-footer">
        <a href ="<?php echo e(url('abouts')); ?>" class="btn btn-secondary">BACK</button></a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
    </form>

    </div>
  </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-status\webstat\resources\views/admin/abouts/edit.blade.php ENDPATH**/ ?>