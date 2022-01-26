<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title-block'); ?></title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(Request::is('/')): ?>
      <?php echo $__env->make('inc.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="container mt-5">
      <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="row">
        <div class="col-8">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="col-4">
          <?php if(!Request::is('login') and !Request::is('registration')): ?>
          <?php echo $__env->make('inc.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/layouts/app.blade.php ENDPATH**/ ?>