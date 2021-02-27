
<?php $__env->startSection('title'); ?>
    About Us | Funda of Web IT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/save-aboutus" method="POST">
        <?php echo e(csrf_field()); ?>

      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
            <input type="text" name="subtitle" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <textarea name="description" class="form-control" id="message-text"></textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> About Us
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>

        </h4>
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
      </div>
      <style>
        .w-10p{
          width: 10% !important;
        }
      </style>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th class="w-10p">Id</th>
              <th class="w-10p">Title</th>
              <th class="w-10p">Sub-Title</th>
              <th class="w-10p">Description</th>
              <th class="w-10p">EDIT</th>
              <th class="w-10p">DELETE</th>
            </thead>
            <tbody>
              <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($data->id); ?></td>
                <td><?php echo e($data->title); ?></td>
                <td><?php echo e($data->subtitle); ?></td>
                <td>
                <div style="height:80px; overflow: hidden;">
                  <?php echo e($data->description); ?>

                </div>
              </td>
                <td>
                  <a href ="<?php echo e(url('about-us/'.$data->id)); ?>" class="btn btn-success">EDIT</a>
                </td>
                <td>
                  <form action="<?php echo e(url('about-us-delete/'.$data->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <button type="submit"class="btn btn-danger">DELETE</button>

                  </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-status\webstat\resources\views/webstat/status.blade.php ENDPATH**/ ?>