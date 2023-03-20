@extends('users.app')
@section('title', 'Login Page')
@section('login')


  <div class="col-md-6 container  card" style="margin-top:20vh">
    <h3 class="display-6" >Login Form</h3>
    <form class="container" id="loginForm" action="/users/authenticate" method="POST">
        @csrf
          <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email" value="{{ old('email' , optional($product ?? null)->email) }}">
          </div>
          @error('email')
          <div class="alert alert-danger">
            {{ $message }}
          </div>  
          @enderror
          <div class="col-md-12 mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter the Password" name="password" id="password" value="{{ old('password' , optional($product ?? null)->password) }}">
          </div class="alert alert-danger">
          @error('password')
          <div class="alert alert-danger">
            {{ $message }}
          </div>  
          @enderror
          <button type="submit" class="btn btn-primary">Sign in</button>
          <p>Don't have an account? <a href="/register" style="color:brown">Register!</a></p>
          <div class="col-12">
            
          </div>
    </form>
</div>
@endsection('login')