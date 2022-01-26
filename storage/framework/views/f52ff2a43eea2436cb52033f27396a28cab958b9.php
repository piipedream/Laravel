<?php $__env->startSection('title-block'); ?>Login <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Login</h1>

<form action="<?php echo e(route('user.login')); ?>" method="post">
    <?php echo csrf_field(); ?>

    <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" class="form-control">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit" class="btn btn-success mt-3">Login</button>
</form>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\localhost\projectSU\resources\views/login.blade.php ENDPATH**/ ?>