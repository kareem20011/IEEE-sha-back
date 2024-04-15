@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-3">

    <div class="text">
    <h3>For Better Future</h3>
    <h1>IEEE Shorouk <br> Branch</h1>
    <button type="button" class="btn btn-info">Learn More</button>
    </div>

    <div class="img mb-5">
    <img src="{{ asset( 'temp/images/img1.png' ) }}" alt="">
    </div>

</div>

@endsection
@section('website_content')
    <h1 class="text-center m-5">Home</h1>
    <h1 class="text-center m-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda odit hic officiis autem, quod consectetur at qui amet quae, suscipit aliquid obcaecati quidem animi dolorem dolorum ipsa! Excepturi, quia eius.</h1>
@endsection