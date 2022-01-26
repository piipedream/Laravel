<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($errors); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>

<?php if(session('success')): ?>
  <div class="alert alert-success">
    <?php echo e(session('success')); ?>

  </div>
<?php endif; ?>
<?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/inc/messages.blade.php ENDPATH**/ ?>