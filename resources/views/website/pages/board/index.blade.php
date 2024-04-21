@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-sm-2">
    <h1>Board | Page</h1>
</div>

@endsection
@section('website_content')



<!-- Start WorkShops -->

<div class="container-fluid my-5">
        <div class="main-heading">
            <h2>Board Section</h2>
        </div>
        @if($categories->isEmpty())
        <div>
            <img  class="d-block mx-auto my-5 w-50" src="{{ asset( 'website/images/9264820.png' ) }}" alt="">
        </div>
        @else
        
            @foreach($categories as $category)
            @if($category->boards->isEmpty() || $category->status == 0)
                @continue
            @else
            
            <div class="content my-5">
                <div class="workshop-title">
                    <h2>{{ $category->title }}</h2>
                </div>

                <div class="d-flex justify-content-center flex-wrap">

                    @foreach($category->boards as $board)
                    <div class="card m-3" style="width: 20rem;">
                        @if( $board->hasMedia('images') )
                        <img src="{{ $board->getFirstMediaUrl('images') }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $board->title }}</h5>
                            <p class="card-text text-success">{{ $board->role }}</p>
                            <p class="card-text">{{ $board->description }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif
            @endforeach
        @endif
    </div>
    
<!-- End WorkShops -->





@endsection