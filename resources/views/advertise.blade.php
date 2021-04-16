@extends('layouts.page')
@section('style')
    <link href="{{asset('css/advertise_page.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('head')
    {{$advertisement[0]['Name']}}
@endsection
@section('content')


    @foreach ($advertisement as $adv)

    @endforeach
    <div class="container">
        <div class="row">
            <div class="carousel-block col-lg-3">

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/upload/{{$images[0]->path}}" class="d-block " alt="Failed to load image">
                        </div>
                        @foreach($images as $image)
                            @if($image!=$images[0])
                                <div class="carousel-item">
                                    <img src="/upload/{{$image->path}}" class="d-block " alt="Failed to load image">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
