<?php $__env->startSection('title-block'); ?>Страница контактов<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <h1>Страница контактов</h1>

  <form action="<?php echo e(route('contact-form')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <input name="user_id"id="user_id" style="display: none" value="<?php echo e(Auth::user()->id); ?>">

    <div class="form-group">
      <label for="name" class="mb-2">Введите имя</label>
      <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
    </div>

    <div class="mt-3 form-group">
      <label for="name" class="mb-2">Email</label>
      <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="subject" class="mb-2">Тема сообщения</label>
      <input type="text" name="subject" placeholder="Тема сообщения" id="subject" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="message" class="mb-2">Сообщение</label>
      <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea>
    </div>

    <div class="mt-3 form-group">
      <select class="form-select mt-3" name="category">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($type->name); ?>">
            <?php echo e($type->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    </div>

    <div class="form-group mt-3">
      <label for="beforeImage">Image</label>
      <input type="file" class="form-control-file" id="beforeImage" name="beforeImage">
    </div>
    
    <button type="submit" class="btn mt-3 btn-success">Отправить</button>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/contact.blade.php ENDPATH**/ ?>