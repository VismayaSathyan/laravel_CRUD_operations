@extends('layout.app')
@section('title', 'index')
@section('products')
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
                @if(Auth::check())
                {{-- <th scope="col"></th>
                <th scope="col"></th> --}}
                @else
                 
                 <a class="signin_link" href="{{ route('users.login') }}" rel="get:login"></a>
              @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $key => $product)
            <tr>
                <td><a href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->name }}</a></td>
                <td>{{ $product->description }}</td>
                <td><a href="{{ route('products.fileDownload',['product' => $product->id]) }}">
                    {{ $product->show_file_name}}
                </a>
                </td>
                <td>{{ $product->price}}</td>
                {{-- @if(Auth::check()) --}}
                {{-- <td> --}}
               
                {{-- <button type="button" value="{{ $product->id }}" class="btn btn-warning editBtn" data-bs-target="#editModal" data-bs-toggle="modal">
                   Edit
                  </button> --}}
                  
            <!-- Modal -->
            {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" style="color:black" id ="exampleModalLabel">Update Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.update', ['product' => $product->id]) }} }}" method="POST" enctype="multipart/form-data" id="editForm">
                            @method('PUT')
                            @csrf
                            
                            <ul id="update_error"></ul>
                            
                            <input type="hidden" name="product_id" id="product_id"/>
                            <div class="mb-3">
                                <label for="name" class="form-label" >Enter The Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="The name field is required." >  --}}
                                {{-- value="{{ $product->name }}" --}}
                            {{-- </div> --}}
                            {{-- @error('name')
               
                @enderror --}}
                            {{-- <div class="mb-3">
                                <label for="description" class="form-label">Enter The Product Description</label>
                                <textarea name="description" id="description" class="form-control" cols="10" rows="5" placeholder="The description field is required.">  --}}
                                   {{-- value = {{$product->description}}  --}}
                                {{-- </textarea>
                            </div> --}}
                            {{-- @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                            {{-- <div class="mb-3">
                                <label for="show_filenames" style="color:black;" class="form-label">Uploaded File</label>
                            <input type="text" id="show_file_name" name="show_file_name" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="filenames" id="show_file_name" style="color:black;" class="form-label"></label>
                                <input type="file" name="filenames" id="filenames" class="form-control" > --}}
                                {{-- value="{{ $product->filenames }}" --}}
                               {{-- <a style="color:black;" href="{{ route('products.fileDownload',['product' => $product->id]) }}"><span>{{ $product->filenames }}</span></a> --}}
                            {{-- </div> --}}
                            {{-- @error('filenames')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                
                            {{-- <div class="mb-3" >
                                <label for="price" class="form-label">Enter The Product Price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="The price field is required."> --}}
                                {{-- value="{{ $product->price }}" --}}
                            {{-- </div> --}}
                            {{-- @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                           
{{--                         
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="editbtn" value="{{ $product->id }}" class="btn btn-primary edit-submit">Update</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
           
            
                </td>
                <td>
                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value='Delete' class="btn btn-danger">
                    </form>
                    @else
                 
                 <a class="signin_link" href="{{ route('users.login') }}" rel="get:login"></a>
             
                </td> --}}
                {{-- @endif --}}
            </tr>
            @empty
            <div>No products found. Click on Add Button, to add new products!</div>
            @endforelse
        </tbody>   
    </table>
    @if(Auth::check())
    <a href="{{ route('products.create') }}"><button class="btn btn-success ">Add</button></a>
    {{-- <a href="{{ route('products.archive') }}"><button class="btn btn-secondary ">Archived Products</button></a> --}}
    @else
                 
                 <a class="signin_link" href="{{ route('users.login') }}" rel="get:login"></a>
              @endif
        
@endsection('products')

@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
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
            //         "_token": '{{csrf_token()}}',
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
    //     @if(count($errors) > 0)
    //     // $('#editModal').modal('show');
    //     var myModal = new bootstrap.Modal(document.getElementById("editModal"));
    //         myModal.show()
    // @endif
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
    
@endsection('script')



</div>