<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    <title>CRUD- @yield('title')</title>
    <style>
         body{
    background-image:url('https://images.unsplash.com/photo-1677476325640-0c6ce16dc2f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDF8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=400&q=60');
    background-repeat: no-repeat;
    background-size: cover; 
}
        .form-label{
            color: black;
        }
        a{
            text-decoration: none;
            color: #fff;
        }
        .nav{
            color: black;
            display: flex;
            display: inline;
        }
        .home{
            background-color: #cccccc;
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light me-auto">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Product Services</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('users.home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link">Products</a>
              </li>
              @auth
              <li class="nav-item">
                <a href="{{ route('products.myProducts') }}" class="nav-link">My Products</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.myArchivedProducts') }}" class="nav-link">My Archive</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout({{ auth()->user()->name }})</a>
                <form action="/logout" method="POST" class="d-none" id="logout-form">
                    @csrf
                    </form>
              </li>
              @else
              <li class="nav-item">
                <a href="{{ route('users.register') }}" class="nav-link">Register</a>
              </li>
              <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    
      {{-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <h5 class="my-0 me-md-auto font-weight-normal">Product Services</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('users.home') }}">Home</a>
            <a href="{{ route('products.index') }}" class="p-2 text-dark ">Products</a>
            @auth
            
            
            
            
            <a href="{{ route('products.myProducts') }}" class="p-2 text-dark ">My Products</a>
            <a href="{{ route('products.myArchivedProducts') }}" class="p-2 text-dark ">My Archive</a>
            <a href="" class="p-2 text-dark " onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout({{ auth()->user()->name }})</a>

            <form action="/logout" method="POST" class="d-none" id="logout-form">
            @csrf
            </form>
            @else
            <a href="{{ route('users.register') }}" class="p-2 text-dark ">Register</a>
           
            <a href="/login" class="p-2 text-dark ">Login</a>
            @endauth



           
        </nav>
    </div> --}}

        <div>
            @yield('myArchive')
            @yield('myProducts')
            @yield('products')
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
            @yield('script')
        </div>
        
</body>
</html>