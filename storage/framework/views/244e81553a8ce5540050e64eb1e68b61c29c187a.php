<?php $__env->startSection('title-block'); ?><?php echo e($data->subject); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <h1><?php echo e($data->subject); ?></h1>
    <div class="alert alert-info">
      <p><?php echo e($data->message); ?></p>
      <p>Status: <?php echo e($data->status); ?></p>
      <p>Category: <?php echo e($data->category); ?></p>
      <p><?php echo e($data->email); ?> - <?php echo e($data->name); ?></p>
      <p><small><?php echo e($data->created_at); ?></small></p>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
        <a href="<?php echo e(route('contact-update', $data->id)); ?>"><button class="btn btn-primary">Редактировать</button></a>
      <?php endif; ?>
      <a href="<?php echo e(route('contact-delete', $data->id)); ?>"><button class="btn btn-danger">Удалить</button></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/one-message.blade.php ENDPATH**/ ?>