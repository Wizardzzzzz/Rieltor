@extends('layouts.page')
@section('style')
    <link href="{{asset('css/advertise_page.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')
    {{$advertisement[0]['Name']}}
@endsection
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="carousel-block col-xl-5 col-lg-11 ">

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
            <div class="offset-lg-1 list col-xl-5 col-lg-5 col-md-5 col-11">
                <h4> {{$advertisement[0]['Name']}}</h4>
                   <p>{{$advertisement[0]['RoomNum']}} кімнати, {{$advertisement[0]['Superficiality']}} поверх </p>
                  <p class="price"><b>{{$advertisement[0]['Price']}} $</b></p>
                  <p class="text-helper">{{round( $advertisement[0]['Price']/$advertisement[0]['Area'])}}  $/м<sup>2</sup></p>

    <table>
        <tbody>
        <tr>
            <td class="td-caption">Місто</td>
            <td class="td-descr">{{$advertisement[0]['Place']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Адреса</td>
            <td class="td-descr">{{$advertisement[0]['Address']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Стан</td>
            <td class="td-descr">{{$advertisement[0]['Fettle']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Переваги</td>
            <td class="td-descr">{{$advertisement[0]['Benefits']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Тип Оголошення</td>
            <td class="td-descr">{{$advertisement[0]['TypeAdvertise']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Тип Будинку</td>
            <td class="td-descr">{{$advertisement[0]['TypeHouse']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Інфраструктура</td>
            <td class="td-descr">{{$advertisement[0]['Infrastructure']}}</td>
        </tr>
        <tr>
            <td class="td-caption">Площа</td>
            <td class="td-descr">{{$advertisement[0]['Area']}} м<sup>2</sup></td>
        </tr>
        </tbody>
    </table>
</div>
            <div class="description col-xl-11 col-lg-5 col-md-5 col-11">
                <h4>Опис</h4>
                <p> {{$advertisement[0]['About']}}</p>
            </div>

            <div >
                <div class="image-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2252.28267268763!2d{{$coordinates['longitude']}}!3d{{$coordinates['latitude']}}!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1622980981917!5m2!1sru!2sua"
                            width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy">
                         </iframe>


                </div>
            </div>
</div>
</div>
@endsection
