<body>
 
    <div class="container mt-4">
     
      <h2 class="text-center">File Upload in Laravel 8 - Tutsmake.com</h2>
     
          <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" >
                     
              <div class="row">
     
                  <div class="col-md-12">
                      <div class="form-group">
                          <input type="file" name="file" placeholder="Choose file" id="file">
                            @error('file')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                      </div>
                  </div>
                     
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                  </div>
              </div>     
          </form>
    </div>
     
    </div>  
    </body>
  <!-- Script -->
  <script type="text/javascript"> 
    $(document).ready(function(){

        // DataTable
       $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('products.getEmployees')}}",
            columns: [
                { data: 'name' },
                { data: 'description' },
                { data: 'filenames' },
                { data: 'price' },
            ]
        });

     });
     </script>

public function getEmployees(Request $request) {
    ## Read value
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length"); // Rows display per page

    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');

    $columnIndex = $columnIndex_arr[0]['column']; // Column index
    $columnName = $columnName_arr[$columnIndex]['data']; // Column name
    $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    $searchValue = $search_arr['value']; // Search value

      // Total records
      $totalRecords = Product::select('count(*) as allcount')->count();
      $totalRecordswithFilter = Product::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
    
      // Fetch records
    $records = Product::orderBy($columnName,$columnSortOrder)
    ->where('products.name', 'like', '%' .$searchValue . '%')
   ->select('products.*')
   ->skip($start)
   ->take($rowperpage)
   ->get();

$data_arr = array();

foreach($records as $record){
$name = $record->name;
$description = $record->description;
$filenames = $record->filenames;
$price = $record->price;

$data_arr[] = array(
    "name" => $name,
    "description" => $description,
    "filenames" => $filenames,
    "price" => $price
);
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordswithFilter,
    "aaData" => $data_arr
 );
}
 return response()->json($response); 
}

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>



<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
            $(document).ready( function () {
    $('#product_table').DataTable();
} );

































<html>
<head>
    <title>All Posts</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
    <body>
        <div class="container">
            <h1 class="m-3 text-center">All Posts</h1>
            <table class="table table-bordered mb-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
  <td>{{ $post->title }}</td>
    <td>
  @if(request()->has('trashed'))
     <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-success">Restore</a>
  @else
        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
       @csrf
        <input name="_method" type="hidden" value="DELETE">
         <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
     </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('posts.index') }}" class="btn btn-info">View All posts</a>
                    <a href="{{ route('posts.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('posts.index', ['trashed' => 'post']) }}" class="btn btn-primary">View Deleted posts</a>
                @endif
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete').click(function(e) {
                    if(!confirm('Are you sure you want to delete this post?')) {
                        e.preventDefault();
                    }
                });
            });
        </script>
    </body> 
</html>