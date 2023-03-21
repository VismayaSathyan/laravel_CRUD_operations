
<?php $__env->startSection('title', 'Create'); ?>
<?php $__env->startSection('products'); ?>
    <div class="container">

        <h2 style="text-align: center" class="display-3 mb-4">Add New Product</h2>


        <form action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Enter The Product Name</label>
                <input type="text" name="name" id="name" placeholder="Product Name" class="form-control" value="<?php echo e(old('name' , optional($product ?? null)->name)); ?>">
            </div>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="mb-3">
                <label for="description" class="form-label">Enter The Product Description</label>
                <textarea name="description" id="description" placeholder="Product Description" class="form-control" cols="10" rows="5"><?php echo e(old('description' , optional($product ?? null)->description)); ?></textarea>
            </div>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="mb-3">
                <label for="filenames" class="form-label">Upload Files</label>
                <input type="file" name="filenames" id="filenames" class="form-control" value="<?php echo e(old('filenames' , optional($product ?? null)->filenames)); ?>">
            </div>
            <?php $__errorArgs = ['filenames'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="mb-3" >
                <label for="price" class="form-label">Enter The Product Price</label>
                <input type="number" name="price" id="price" placeholder="Rs 00.00" class="form-control" value="<?php echo e(old('price' , optional($product ?? null)->name)); ?>">
            </div>
            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
            <div class="d-grid">
                <input type="submit" value="Create" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/products/create.blade.php ENDPATH**/ ?>