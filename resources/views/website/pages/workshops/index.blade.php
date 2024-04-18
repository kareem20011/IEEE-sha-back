@extends('website.layouts.layout')
@section('header')

<div class="header-content p-lg-5 p-sm-2">
    <h1>Workshops | Page</h1>
</div>

@endsection
@section('website_content')




    <!-- Start WorkShops -->
    
    <div class="container-fluid my-5">
            <div class="main-heading">
                <h2>WorkShops Section</h2>
            </div>

            @foreach($categories as $category)
            <div class="content my-5">
                <div class="workshop-title">
                    <h2>{{ $category->title }}</h2>
                </div>

                <div class="d-flex justify-content-center flex-wrap">

                    @foreach($category->workshops as $workshop)
                    <div class="card m-3" style="width: 20rem;">
                        @if( $workshop->hasMedia('images') )
                        <img src="{{ $workshop->getFirstMediaUrl('images') }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $workshop->title }}</h5>
                            <p class="card-text">{{ $workshop->description }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach
        </div>
        
    <!-- End WorkShops -->




@endsection