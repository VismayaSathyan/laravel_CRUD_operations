@extends('users.app')
@section('title', 'Register Page')
@section('register')


  <div class="col-md-6 container card" style="margin-top:20vh">
    <h3 class="display-6" >Registration Form</h3>
    <form class="container" action="/users" method="POST">
        @csrf
        
        <div class="col-md-12">
            <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" aria-label="Name" value="{{ old('name' , optional($product ?? null)->name) }}">
            </div>
            @error('name')
            <div class="alert alert-danger">
              {{ $message }}
            </div>  
            @enderror
          <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email" value="{{ old('email' , optional($product ?? null)->email) }}">
          </div>
          @error('email')
          <div class="alert alert-danger">
            {{ $message }}
          </div>  
          @enderror
          <div class="col-md-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter the Password" name="password" id="password" value="{{ old('password' , optional($product ?? null)->password) }}">
          </div class="alert alert-danger">
          @error('password')
          <div class="alert alert-danger">
            {{ $message }}
          </div>  
          @enderror
          <div class="col-md-12 mb-2">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
          </div>
          @error('password_confirmation ')
          <div class="alert alert-danger">
            {{ $message }}
          </div>  
          @enderror
         
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <p>Have an account? <a href="{{ route('users.login') }}" style="color:rgb(25, 88, 25)">Login!</a></p>
          </div>
    </form>
</div>
@endsection('register')