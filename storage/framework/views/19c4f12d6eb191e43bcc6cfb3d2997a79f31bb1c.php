
<?php $__env->startSection('title', 'Edit'); ?>
<?php $__env->startSection('products'); ?>
    <div>
        <h2 style="text-align: center" class="display-3 mb-4">Update Product</h2>
        <form action="<?php echo e(route('products.update', ['product' => $product->id])); ?> }}" method="POST" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            
            <div class="mb-3">
                <label for="name" class="form-label">Enter The Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($product->name); ?>">
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
                <textarea name="description" id="description" class="form-control" cols="10" rows="5"> <?php echo e($product->description); ?> 
                </textarea>
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
                <label for="filenames" class="form-label">Upload Files: <?php echo e($product->show_file_name); ?> </label>
                <input type="file" name="filenames" id="filenames" class="form-control" value="<?php echo e($product->filenames); ?>">
               
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
                <input type="number" name="price" id="price" class="form-control" value="<?php echo e($product->price); ?>">
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
            <div class="d-grid"><input type="submit" value="Update" class="btn btn-primary btn-block"></div>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/products/edit.blade.php ENDPATH**/ ?>