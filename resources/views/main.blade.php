@extends('layouts.page')
@section('style')
    <link href="{{asset('css/advertisement.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<form method="get">


</form>
<div class="container">
        <div class="row">
            @include('includes.filters')
            <h2 class="align-content-center">Дошка оголошень</h2>
    @foreach($data as $el)


            <div class="advertise-block" >

                <p class="image-center">
                <a href="{{route("advertisements.show",$el->id)}}"><img  src='/upload/{{$images[$el->id]}}'></a>
                </p>
                <h3 class="advertise-header" ><a class="link" href="{{route("advertisements.show",$el->id)}}">{{$el->Name}}</a></h3>
                <p class="down-text">{{$el->Place}}</p>
                <p>Ціна: {{$el->Price}} $</p>

            </div>
    @endforeach
    </div></div>
@endsection



