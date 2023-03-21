
<?php $__env->startSection('title', 'Login Page'); ?>
<?php $__env->startSection('login'); ?>


  <div class="col-md-6 container  card" style="margin-top:20vh">
    <h3 class="display-6" >Login Form</h3>
    <form class="container" id="loginForm" action="/users/authenticate" method="POST">
        <?php echo csrf_field(); ?>
          <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email" value="<?php echo e(old('email' , optional($product ?? null)->email)); ?>">
          </div>
          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="alert alert-danger">
            <?php echo e($message); ?>

          </div>  
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <div class="col-md-12 mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter the Password" name="password" id="password" value="<?php echo e(old('password' , optional($product ?? null)->password)); ?>">
          </div class="alert alert-danger">
          <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="alert alert-danger">
            <?php echo e($message); ?>

          </div>  
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <button type="submit" class="btn btn-primary">Sign in</button>
          <p>Don't have an account? <a href="/register" style="color:brown">Register!</a></p>
          <div class="col-12">
            
          </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/users/login.blade.php ENDPATH**/ ?>