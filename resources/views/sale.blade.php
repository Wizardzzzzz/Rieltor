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
            <form method="get" action="{{route("advertisements.index")}}">

                <div class="form-group offset-1 col-9">
            <select  type="text" name="TypeHouse" class="form-control ">
                <option value="" disabled selected>Сортування</option>
                <option value="Квартира">за ціною $ <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                    </svg></option>
                <option value="Будинок">за ціною $ </option>
                <option value="Кімната">Кімната</option>
                <option value="Ділянка">Ділянка</option>
                <option value="Комерційна">Комерційна</option>
            </select>
                </div>

            </form>
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
                            <p class="down-text">{{$el->Place}} - {{$el->Address}}</p>
                            <div class="price"><p>Ціна: {{$el->Price}}$ або {{round($el->Price/$el->Area)}}$/м<sup>2</sup></p> </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="{{asset("js/show-block.js")}}"></script>


