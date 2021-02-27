
<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Tasks
        </h4>
      </div>
      <div class="card-body">
        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form class="horizontal" action="<?php echo e(url('task')); ?>" method="post">
          <div class="form-group">
            <label for="name">Task</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
        <div class="form-group">
          <?php echo e(csrf_field()); ?>

          <div class="col-md-12">
            <button type="submit" class="btn btn-default">Add Task</button>
          </div>
        </div>
  </form>
      </div>
        </div>
      </div>
    </div>

<?php if($task->count()): ?>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">
<table class="table table-striped">
  <thead>
    <th>Task</th>
    <th>&nbsp;</th>
  </thead>
  <tbody>
  </tbody>
  <?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($tasks->name); ?></td>
      <td>
        <form action="<?php echo e(url('task/'. $tasks->id)); ?>" method ="post">
          <button type="submit" class="btn btn-danger">Delete</button>
          <?php echo e(method_field('DELETE')); ?>

          <?php echo e(csrf_field()); ?>

        </form>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
</div>
</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-status\webstat\resources\views/tasks/index.blade.php ENDPATH**/ ?>