

<?php $__env->startSection('title', 'show'); ?>

<?php $__env->startSection('products'); ?>
<div class="container " style="background-color: #fff; border-radius: 5px; margin-top:5vh" >
        <h1 class="display-4"><?php echo e($product->name); ?></h1>
        <hr>
        <p style="font-size: 40px"><?php echo e($product->description); ?></p>
        <hr>
        <p style="font-size: 40px">Rs <?php echo e($product->price); ?></p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/products/show.blade.php ENDPATH**/ ?>