
<?php $__env->startSection('title', 'index'); ?>
<?php $__env->startSection('products'); ?>
<div style="margin:10px;">
    <div style="text-align: center">
        <h2 class="display-3 mb-2">Product List</h2>
    </div>
    <div id='success_msg'></div>
    <table id="product_table" class="table table-dark table-borderless table-sm table-striped table-hover display">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">files</th>
                <th scope="col">Price</th>
                <?php if(Auth::check()): ?>
                
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
                
                
               
                
                  
            <!-- Modal -->
            
                                
                            
                            
                            
                                   
                                
                            
                            
                                
                               
                            
                            
                
                            
                                
                            
                            
                           

                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div>No products found. Click on Add Button, to add new products!</div>
            <?php endif; ?>
        </tbody>   
    </table>
    <?php if(Auth::check()): ?>
    <a href="<?php echo e(route('products.create')); ?>"><button class="btn btn-success ">Add</button></a>
    
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
        // $(document).ready(function () {
            // $(document).on('click', '.edit-submit', function(e){
            //     e.preventDefault();
            //      var pro_id = $(this).val();
            //      console.log(pro_id);
            //      $('#editModal').modal('show');

            //      $.ajax({
            //         type:"GET",
            //         url:"/products/" +pro_id +"/edit",
            //         dataType:'json',
            //         success: function(response){
                           
            //                //console.log(response);
            //                if(response.status == 404){
            //                 $('#success_msg').html("");
            //                 $('#success_msg').addClass('alert alert-danger');
            //                 $('#success_msg').text(response.message);
            //                }else{
            //                 $('#name').val(response.product.name);
            //                 $('#description').val(response.product.description);
            //                 $('#show_file_name').val(response.product.show_file_name);
            //                 $('#price').val(response.product.price);
            //                 $('#product_id').val(pro_id);
            //                 $('#editbtn').val(pro_id)
            //                }
                          
                            
            //         }
            //      });
            // });

            // $(document).ready(function () {
            // $(document).on('click', '.edit-submit', function(e){
            //     e.preventDefault();
            //      var pro_id = $(this).val();
            //      var data = {
            //         "_token": '<?php echo e(csrf_token()); ?>',
            //         'name': $('#name').val(),
            //         'description': $('#description').val(),
            //         'show_file_name': $('#show_file_name').val(),
            //         'price': $('#price').val(),
                   
            //      }
                //  var data = {
                //     'name': name,
                //     'description': $('#description').val(),
                //     'show_file_name': $('#show_file_name').val(),
                //     'price': $('#price').val(),
                   
                //  }
                 //console.log(pro_id);
//                  $.ajaxSetup({
//      headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//      }
//   });
//                  $.ajax({
//                     method:"POST",
//                     url:"/products/" +pro_id,
//                     data:data,
//                     dataType:'json',
//                     success: function(data){
                           
//                            console.log(data);

//                            if(response.status == 400){
//                             $('#update_error').html("");
//                             $('#update_error').addClass('alert alert-danger');
//                             $.each(response.errors, function(key, err_values){
//                                 $('#update_error').append('<li>'+err_values+'</li>');
//                             })  
//                           }
//                         else if(response.status == 404){
//                             $('#update_error').html("");
//                             $('#success_msg').addClass('alert alert-danger');
//                             $('#success_msg').text(response.message);
//                            }else{
//                             $('#update_error').html("");
//                             $('#success_msg').html("");
//                             $('#success_msg').addClass('alert alert-danger');
//                             $('#success_msg').text(response.message);

                        //     $('#editModal').modal('hide');
                        //    }
                        //    if(response.status == 404){
                        //     $('#success_msg').html("");
                        //     $('#success_msg').addClass('alert alert-danger');
                        //     $('#success_msg').text(response.message);
                        //    }else{
                        //     $('#name').val(response.product.name);
                        //     $('#description').val(response.product.description);
                        //     $('#show_file_name').val(response.product.show_file_name);
                        //     $('#price').val(response.product.price);
                        //     $('#product_id').val(pro_id);
                        //     $('#editbtn').val(pro_id)
                        //    }
                          
                            
        //             }
        //          });
        //     });
        // });

        // })
    </script>
    <script>
    //     <?php if(count($errors) > 0): ?>
    //     // $('#editModal').modal('show');
    //     var myModal = new bootstrap.Modal(document.getElementById("editModal"));
    //         myModal.show()
    // <?php endif; ?>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelCRUD\resources\views/products/index.blade.php ENDPATH**/ ?>