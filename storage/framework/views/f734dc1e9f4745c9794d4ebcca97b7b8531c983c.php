<?php $__env->startSection('konten'); ?>


<div class="row">
  <div class="col-12">
      <table class="table table-primary table-responsive-lg">
      <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
          </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $responseBody; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($consume->data->id); ?></td>
              <td><?php echo e($consume->data->name); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      </table>
      <?php echo e($responseBody->links()); ?>

  </div>
</div>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\Eannovate\Eannovates\resources\views/consumes/apiwithoutkey.blade.php ENDPATH**/ ?>