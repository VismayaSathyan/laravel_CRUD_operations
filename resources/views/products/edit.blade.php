@extends('layout.app')
@section('title', 'Edit')
@section('products')
    <div>
        <h2 style="text-align: center" class="display-3 mb-4">Update Product</h2>
        <form action="{{ route('products.update', ['product' => $product->id]) }} }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Enter The Product Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            @error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
            <div class="mb-3">
                <label for="description" class="form-label">Enter The Product Description</label>
                <textarea name="description" id="description" class="form-control" cols="10" rows="5">  
                </textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="filenames" class="form-label">Upload Files:<span id="show_file_name"></span></label>
                <input type="file" name="filenames" id="filenames" class="form-control" >
               {{-- <a style="color:black;" href="{{ route('products.fileDownload',['product' => $product->id]) }}"><span>{{ $product->filenames }}</span></a> --}}
            </div>
            @error('filenames')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3" >
                <label for="price" class="form-label">Enter The Product Price</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid"><input type="submit" value="Update" class="btn btn-primary btn-block"></div>
        </form>
    </div>

@endsection