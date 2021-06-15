@extends('layouts.page')
@section('style')
    <link href="{{asset('css/sale.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/filters.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/aboutUs.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('title')
    Нерухомість
@endsection
@section('content')

    <div class="container">
        <div class="row">
            @include('includes.filters')
        </div>
    </div>
    <div class="about">
        <div class="container">
            <div class="row ">

                <h3 class="text-center header">Про нас</h3>

                <hr>
                <div class="col-6 mini-headers">
                    <p>
                        <b>Наші працівники</b>
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad alias architecto autem commodi
                        culpa dolorum ex expedita hic illo impedit in incidunt ipsa laudantium maiores nam natus
                        necessitatibus neque nihil nobis odio, perferendis placeat quam quidem quis rem repellat
                        repudiandae rerum saepe sint temporibus ut velit voluptate! Deserunt, magni! Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit. Ab amet autem cum doloribus, est hic inventore maiores
                        mollitia, nam nostrum quasi quidem repellat tempora?
                    </p>
                </div>
                <div class="col-3">
                    <img src="/assets/ofis.jpg" width="150px" height="300px">
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row about">
            <div class="col-6 mini-headers">
                <p>
                    <b>Наші клієнти</b>
                </p>
            </div>
            <div class="col-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad alias architecto autem commodi culpa
                    dolorum ex expedita hic illo impedit in incidunt ipsa laudantium maiores nam natus necessitatibus
                    neque nihil nobis odio, perferendis placeat quam quidem quis rem repellat repudiandae rerum saepe
                    sint temporibus ut velit voluptate! Deserunt, magni! Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Ab amet autem cum doloribus, est hic inventore maiores mollitia, nam nostrum quasi
                    quidem repellat tempora?
                </p>
            </div>
            <div class="col-3">
                <img src="/assets/clients.jpg" width="150px" height="300px">
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row about">
            <div class="col-6 mini-headers">
                <p>
                    <b>Наш офіс</b>
                </p>
            </div>
            <div class="col-6">
                <div class="image-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1525.6709293993606!2d24.700380003074944!3d48.914488256721754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4730c13f3e2cfaa9%3A0xde33c2341e09d861!2sPrykarpat%C2%B7s%CA%B9kyy%20Natsional%CA%B9nyy%20Universytet!5e0!3m2!1sru!2sua!4v1620737847389!5m2!1sru!2sua"
                        width="680" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row about">
            <div class="col-6 mini-headers">
                <p>
                    <b>Контакти</b>
                </p>
            </div>
            <div class="col-3">
                <p>
                    +38067535323 - менеджер <br>
                    +38067245233 - консультант <br>
                    +38067254253 - менеджер
                </p>
            </div>
            <div class="col-3">
                <p>

                    Viber: +38067535323 <br>
                    Telegram: +38067535323 <br>
                    Facebook: Rieltor UA
                </p>
            </div>
        </div>
    </div>

@endsection
