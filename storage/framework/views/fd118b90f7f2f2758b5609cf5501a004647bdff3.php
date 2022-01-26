<?php $__env->startSection('title-block'); ?>Обновление записи<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <h1>Обновление записи</h1>

  <form action="<?php echo e(route('contact-update-submit', $data->id)); ?>" method="post">
    <?php echo csrf_field(); ?>

    <div class="form-group">
      <select name="status" id="status">
        <option value="solved">Решена</option>
        <option value="rejected">Отклонена</option>
      </select>
    </div>

    <button type="submit" class="btn mt-3 btn-success">Обновить</button>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/update-message.blade.php ENDPATH**/ ?>