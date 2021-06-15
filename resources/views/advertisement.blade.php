@extends('layouts.page')
@section('style')
    <link href="{{asset('css/sale.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')Створити оголошення@endsection
@section('head')Створити оголошення @endsection


@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('advertisements.index') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">


                <div class="white w-100">

                    <div class="form-group col-6">
                        <label for="Name">Назва оголошення</label>
                        <input id="Name" type="text" name="Name" class="form-control ">

                    </div>
                    <div class="form-group col-6">
                        <label for="TypeAdvertise">Тип Оголошення</label>
                        <select type="text" name="TypeAdvertise" class="form-control ">
                            <option value="Продаж">Продаж</option>
                            <option value="Оренда">Оренда</option>
                            <option value="Подобова оренда">Подобова оренда</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="TypeHouse">Тип будинку</label>
                        <select type="text" name="TypeHouse" class="form-control ">
                            <option value="Квартира">Квартира</option>
                            <option value="Будинок">Будинок</option>
                            <option value="Кімната">Кімната</option>
                            <option value="Ділянка">Ділянка</option>
                            <option value="Комерційна">Комерційна</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="Place">Місто</label>
                        <input type="text" name="Place" class="form-control ">

                    </div>
                    <div class="form-group col-6">
                        <label for="Address">Адреса</label>
                        <input type="text" name="Address" class="form-control ">

                    </div>
                    <div class="form-group col-6">
                        <label for="Fettle">Стан будинку</label>
                        <input type="text" name="Fettle" class="form-control ">
                    </div>
                    <div class="form-group col-6">
                        <label for="Benefits">Перневаги</label>
                        <input type="text" name="Benefits" class="form-control ">
                    </div>
                    <div class="form-group col-6">
                        <label for="Infrastructure">Інфраструктура</label>
                        <input type="text" name="Infrastructure" class="form-control">

                    </div>
                    <div class="form-group col-3">
                        <label for="Area">Площа</label>
                        <input type="text" name="Area" class="form-control">
                    </div>
                    <div class="form-group col-3 ">
                        <label for="RoomNum">Кількість кімнат</label>
                        <select class="form-control" type="text" name="RoomNum" id="RoomNum">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="form-label-group col-3">
                        <label for="Superficiality">Поверховість</label>
                        <input type="number" min="1" max="99" name="Superficiality" class="form-control"
                               placeholder="Поверх" required=""
                               autofocus="">
                    </div>
                </div>
                <div class="white w-100">
                    <div class="form-group">
                        <label for="photos">Виберіть зображення</label><br>
                        <input type="file" name="photos[]" id="photos" onChange="myFunc(this)" multiple/>
                        <div id="images"></div>
                    </div>
                </div>


                <div class="white">
                    <div>
                        <div class="form-group col-6">
                            <label for="About">Про будинок</label>
                            <textarea name="About" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="Price">Ціна</label>
                        <input type="text" name="Price" placeholder="Введіть ціну в $" class="form-control">
                    </div>
                </div>

            </div>
            <input class="btn btn-primary" type="submit" value="Підтвердити">
        </div>
    </form>

    <style>
        img {
            width: auto;
            height: 240px;
        }
    </style>
    <script>
        function myFunc(input) {
            var files = input.files || input.currentTarget.files;
            var reader = [];
            var images = document.getElementById('images');
            var name;
            for (var i in files) {
                if (files.hasOwnProperty(i)) {
                    name = 'file' + i;

                    reader[i] = new FileReader();
                    reader[i].readAsDataURL(input.files[i]);

                    images.innerHTML += '<img id="' + name + '" src="" />';

                    (function (name) {
                        reader[i].onload = function (e) {
                            console.log(document.getElementById(name));
                            document.getElementById(name).src = e.target.result;
                        };
                    })(name);
                    console.log(files[i]);
                }
            }
        }
    </script>
@endsection

