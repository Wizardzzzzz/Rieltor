@extends('layouts.page')
@section('style')
    <link href="{{asset('css/advertisement.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/filters.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            @include('includes.filters')
            <h2 class="text-center">Дошка оголошень</h2>
            <div class="row">
                @foreach($data as $el)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="advertise-block">
                            <p class="image-center">
                                <a href="{{route("advertisements.show",$el->id)}}"><img
                                        src='/upload/{{$images[$el->id]}}'></a>
                            </p>
                            <h3 class="advertise-header"><a class="link"
                                                            href="{{route("advertisements.show",$el->id)}}">{{$el->Name}}</a>
                            </h3>
                            <p class="down-text">{{$el->Place}}</p>
                            <p>Ціна: {{$el->Price}} $</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="{{asset("js/show-block.js")}}"></script>


