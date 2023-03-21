
<?php $__env->startSection('title', 'Register Page'); ?>
<?php $__env->startSection('register'); ?>


  <div class="col-md-6 container card" style="margin-top:20vh">
    <h3 class="display-6" >Registration Form</h3>
    <form class="container" action="/users" method="POST">
        <?php echo csrf_field(); ?>
        
        <div class="col-md-12">
            <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" aria-label="Name" value="<?php echo e(old('name' , optional($product ?? null)->name)); ?>">
            </div>
            <?php $__errorArgs = ['name'];
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
          <div class="col-md-12">
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
          <div class="col-md-12 mb-2">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
          </div>
          <?php $__errorArgs = ['password_confirmation '];
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
         
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <p>Have an account? <a href="<?php echo e(route('users.login')); ?>" style="color:rgb(25, 88, 25)">Login!</a></p>
          </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/users/register.blade.php ENDPATH**/ ?>