<?php $__env->startSection('title-block'); ?>Главная страница<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <h1>Главная страница</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aside'); ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('aside'); ?>
  <p>Dop text</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/home.blade.php ENDPATH**/ ?>