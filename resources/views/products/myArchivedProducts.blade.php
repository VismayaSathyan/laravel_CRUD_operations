@extends('layout.app')
@section('title', 'My Archive')
@section('myArchive')
<div style="margin:20px;">
   <div  style="text-align: center">
<h2  class="display-3 mb-4">Archived Product List</h2>
</div>

<table id="product_table" class="table table-dark table-hover display">
    <thead >
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">files</th>
        <th scope="col">Price</th>
        
        {{-- <th scope="col"><a href="{{ route('products.create') }}">Add</a></th> --}}
        <th scope="col">Restore</th>
        <th scope="col">Delete</th>
        
    </tr>
</thead>
<tbody>
            @forelse ($products as $key => $product)
           
            
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    {{ $product->show_file_name}}
                <td>{{ $product->price }}</td>
                
                {{-- <td><a href="{{ route('products.create') }}"><button class="btn btn-success">Add</button></a></td> --}}
                <td>
                    <form action="{{ route('products.restore', ['product' => $product->id]) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="material-icons">undo</i></button>
                    </form>
                </td>
                {{-- <td><a href="{{ route('products.delete', ['product' => $product->id]) }}"><button class="btn btn-success">DELETE</button></a></td> --}}
                <td>
                    <form action="{{ route('products.delete', ['product' => $product->id]) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="material-icons">&#xe92b;</i></button>
                    </form>
                </td>
                
            </tr>

    
    @empty
    
    <div>No archived products.</div>
    

    @endforelse
</tbody>
            
        </table>

        <a   href="{{ route('products.myProducts') }}"><button class="btn btn-dark ">My Products List</button></a>
       
@endsection('myArchive')
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
    $('#product_table').DataTable();
});
    </script>
    @endsection('script')
</div>