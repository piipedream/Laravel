<?php $__env->startSection('title-block'); ?><?php echo e($data->subject); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <h1><?php echo e($data->subject); ?></h1>
    <div class="alert alert-info">
      <p><?php echo e($data->message); ?></p>
      <p>Status: <?php echo e($data->status); ?></p>
      <p>Category: <?php echo e($data->category); ?></p>
      <p><?php echo e($data->email); ?> - <?php echo e($data->name); ?></p>
      <p><small><?php echo e($data->created_at); ?></small></p>

      <?php if( $data->before_img != null ): ?>
        <h3>Image before:</h3>
        <img style="width: 100%;" src="<?php echo e(asset("storage/image/$data->before_img")); ?>" alt="">
      <?php endif; ?>

      <?php if( $data->after_img != null ): ?>
          <h3>Image after:</h3>
          <img style="width: 100%;" src="<?php echo e(asset("storage/image/$data->after_img")); ?>" alt="">
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
        <a href="<?php echo e(route('contact-update', $data->id)); ?>"><button class="btn mt-3 btn-primary">Редактировать</button></a>
      <?php endif; ?>
      <a href="<?php echo e(route('contact-delete', $data->id)); ?>"><button class="btn mt-3 btn-danger show_confirm">Удалить</button></a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Are you sure you want to delete this record?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });
      
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/one-message.blade.php ENDPATH**/ ?>