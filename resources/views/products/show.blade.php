@extends('layout.app')

@section('title', 'show')

@section('products')
<div class="container " style="background-color: #fff; border-radius: 5px; margin-top:5vh" >
        <h1 class="display-4">{{ $product->name }}</h1>
        <hr>
        <p style="font-size: 40px">{{ $product->description }}</p>
        <hr>
        <p style="font-size: 40px">Rs {{ $product->price}}</p>
</div>
@endsection