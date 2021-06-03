@extends('layouts.page')
@section('style')
    <link href="{{asset('css/advertisement.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/filters.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('title')
    Оголошення
@endsection
@section('content')

    <div class="container">
        <div class="row">
            @include('includes.filters')
            <h2 class="text-center">Дошка оголошень</h2>
            <form method="get" id="form2" action="{{route("advertisements.index")}}">
                <div class="row">
                    <div class="form-group input-fld offset-1 col-9">
                        <select type="text" name="TypeHouse" class="form-control ">
                            <option value="" disabled selected>Сортування</option>
                            <option value="Квартира">Найдешевші</option>
                            <option value="Будинок">Найдорожчі</option>
                            <option value="Кімната">Найдешевші за м</option>
                            <option value="Ділянка">Найдорожчі за м</option>
                            <option value="Комерційна">Найменші за площею</option>
                            <option value="Комерційна">Найбільші за площей</option>
                        </select>
                    </div>
                    <div class="form-group input-fld input-with-label col-2 btn2 ">
                        <button id="confirm-but" class="btn btn-primary " type="submit">Застосувати</button>
                    </div>
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
                            <div class="price"><p>Ціна: {{$el->Price}}$ або {{round($el->Price/$el->Area)}}
                                    $/м<sup>2</sup></p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="{{asset("js/show-block.js")}}"></script>


