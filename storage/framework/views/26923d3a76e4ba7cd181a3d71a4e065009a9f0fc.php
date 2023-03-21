
<?php $__env->startSection('title', 'index'); ?>
<?php $__env->startSection('products'); ?>
<div style="margin:20px;">
   <div  style="text-align: center">
<h2  class="display-3 mb-4">Archived Product List</h2>
</div>

<table id="product_table" class="table table-dark table-hover display">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">files</th>
        <th scope="col">Price</th>
        
        
        <th scope="col"></th>
        <th scope="col"></th>
        
    </tr>
</thead>
<tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
           
            
            <tr>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->description); ?></td>
                <td>
                    <?php echo e($product->show_file_name); ?>

                <td><?php echo e($product->price); ?></td>
                
                
                <td>
                    <form action="<?php echo e(route('products.restore', ['product' => $product->id])); ?>" method="get">
                        <?php echo csrf_field(); ?>
                        <input type="submit" value='Restore' class="btn btn-success">
                    </form>
                </td>
                
                <td>
                    <form action="<?php echo e(route('products.delete', ['product' => $product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <input type="submit" value='Delete' class="btn btn-danger">
                    </form>
                </td>
                
            </tr>

    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    
    <div>No archived products.</div>
    

    <?php endif; ?>
</tbody>
            
        </table>

        <a   href="<?php echo e(route('products.index')); ?>"><button class="btn btn-dark ">All Products List</button></a>
       
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
    $('#product_table').DataTable();
});
    </script>
    <?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/products/archive.blade.php ENDPATH**/ ?>