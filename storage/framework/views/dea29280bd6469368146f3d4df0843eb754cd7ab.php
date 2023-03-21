
<?php $__env->startSection('title', 'My Products'); ?>

<?php $__env->startSection('myProducts'); ?>
<div style="margin:10px;">
    <div style="text-align: center">
        <h2 class="display-3 mb-2">Product List</h2>
    </div>
    <div id='success_msg'></div>
    <table id="product_table" class="table table-dark table-striped table-hover display">
        <thead >
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">files</th>
                <th scope="col">Price</th>
                <?php if(Auth::check()): ?>
                <th scope="col">Edit</th>
                <th scope="col">Archive</th>
                <?php else: ?>
                 
                 <a class="signin_link" href="<?php echo e(route('users.login')); ?>" rel="get:login"></a>
              <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><a href="<?php echo e(route('products.show', ['product' => $product->id])); ?>"><?php echo e($product->name); ?></a></td>
                <td><?php echo e($product->description); ?></td>
                <td><a href="<?php echo e(route('products.fileDownload',['product' => $product->id])); ?>">
                    <?php echo e($product->show_file_name); ?>

                </a>
                </td>
                <td><?php echo e($product->price); ?></td>
                <?php if(Auth::check()): ?>
                <td>
                <button type="button" value="<?php echo e($product->id); ?>" class="btn btn-warning editBtn" data-bs-target="#editModal" data-bs-toggle="modal">
                    <i class="material-icons">mode_edit</i>
                  </button> 
            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" style="color:black" id ="exampleModalLabel">Update Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('products.update', ['product' => $product->id])); ?> }}" method="POST" enctype="multipart/form-data" id="editForm">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            
                            <ul id="update_error"></ul>
                            
                            <input type="hidden" name="product_id" id="product_id"/>
                            <div class="mb-3">
                                <label for="name" class="form-label" >Enter The Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="The name field is required." > 
                                
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Enter The Product Description</label>
                                <textarea name="description" id="description" class="form-control" cols="10" rows="5" placeholder="The description field is required."> 
                                  
                                </textarea>
                            </div>
                    
                            <div class="mb-3">
                                <label for="show_filenames" style="color:black;" class="form-label">Uploaded File</label>
                            <input type="text" id="show_file_name" name="show_file_name" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="filenames" id="show_file_name" style="color:black;" class="form-label"></label>
                                <input type="file" name="filenames" id="filenames" class="form-control" >
                            </div>
                
                            <div class="mb-3" >
                                <label for="price" class="form-label">Enter The Product Price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="The price field is required.">
                                
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="editbtn" value="<?php echo e($product->id); ?>" class="btn btn-primary edit-submit">Update</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
           
            
                </td>
                <td>
                    <form action="<?php echo e(route('products.destroy', ['product' => $product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i> </button>
                    </form>
                    <?php else: ?>
                 
                 <a class="signin_link" href="<?php echo e(route('users.login')); ?>" rel="get:login"></a>
              <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div>No products found. Click on Add Button, to add new products!</div>
            <?php endif; ?>
        </tbody>   
    </table>
    <?php if(Auth::check()): ?>
    <a href="<?php echo e(route('products.create')); ?>"><button class="btn btn-success ">Add</button></a>
    <!-- Button trigger modal -->

  <!-- Modal -->
  
    
  <a href="<?php echo e(route('products.myArchivedProducts')); ?>"><button class="btn btn-secondary ">Archived Products</button></a>
    <?php else: ?>
                 
                 <a class="signin_link" href="<?php echo e(route('users.login')); ?>" rel="get:login"></a>
              <?php endif; ?>
        

              <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
   
    <script>
        $(document).ready(function () {

            $(document).on('click', '.editBtn', function(e){
                e.preventDefault();
                 var pro_id = $(this).val();
                 //alert(pro_id);
                 $('#editModal').modal('show');

                 $.ajax({
                    type:"GET",
                    url:"/products/" +pro_id +"/edit",
                    success: function(response){
                           // console.log(response.product.id);
                           console.log(response);
                            if(response.status == 404){
                            $('#success_msg').html("");
                            $('#success_msg').addClass('alert alert-danger');
                            $('#success_msg').text(response.message);
                           }else{
                            $('#success_msg').removeClass('alert alert-danger');
                            $('#name').val(response.product.name);
                            $('#description').val(response.product.description);
                            $('#price').val(response.product.price);
                            $('#show_file_name').val(response.product.show_file_name);
                            $('#product_id').val(pro_id);
                            $('#editbtn').val(pro_id);
                           }
                            
                    }
                 });
            });
        })
    </script>
     <script>
        $(document).ready(function () {

$(document).on('submit', '#editForm', function(e){
    e.preventDefault();
    var pro_id = $('#product_id').val();
    let editFormData = new FormData($('#editForm')[0]);
     var data = {
                    'name': $('#name').val(),
                    'description': $('#description').val(),
                    'show_file_name': $('#show_file_name').val(),
                    'filenames':$('filenames').val(),
                    'price': $('#price').val(),
                   
                 }
                // console.log(data);
                 $.ajaxSetup({
                     headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                 $.ajax({
                    type:"POST",
                    url:"/products/"+pro_id,
                    data:editFormData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);
                        if(response.status == 400){
                            $('#update_error').html("");
                            $('#update_error').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values){
                                $('#update_error').append('<li>'+err_values+'</li>');
                            })  
                          }else{
                            $('#update_error').html("");
                            $('#update_error').removeClass('alert alert-danger');
                            $('#success_msg').addClass('alert alert-success');
                            $('#success_msg').text(response.message);
                            $('#editModal').modal('hide');
                            $('#editModal').find('input').val("");
                            //alert("updated successfully!");
                            location.reload();
                          }
                    }
                });
                           
                 
        });

});
    </script>
   
   
    <script>
        $(document).ready(function () {
        $('#product_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf',
        ]
    });
        });
        </script>
    
<?php $__env->stopSection(); ?>



</div>



<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/products/myProducts.blade.php ENDPATH**/ ?>