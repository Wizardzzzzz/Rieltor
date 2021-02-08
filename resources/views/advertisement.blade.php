@extends('layouts.page')
@section('title')Створити оголошення@endsection

@section('content')
    <form action="advertisement\submit" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-field col s7">
            <input type="file" name="photos" id="photos" onChange="myFunc(this)" multiple/>
        </div>
        <div class="row">
            <div id="images"></div>
        </div>
        <div class="input-field col s7">
            <input id="text1" type="text" name="Name" class="validate">
            <label for="text1">Назва оголошення</label>
        </div>
        <div class="input-field col s7">
            <label for="selector">Кількість кімнат</label><br><br>
            <select class="browser-default" id="selector">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>

            </select>
        </div>

        <div class="input-field col s7">
            <input id="text2" type="text" name="Type" class="validate">
            <label for="text2">Тип будинку</label>
        </div>


        <div class="input-field col s7">
            <input id="text3" type="text" name="Place" class="validate">
            <label for="text3">Місцезнаходження</label>
        </div>

        <div class="input-field col s7">
            <input id="text4" type="text" name="Infastructure" class="validate">
            <label for="text4">Інфраструктура</label>
        </div>

        <div class="input-field col s7">
            <input type="text" name="Price">
            <label for="Price">Ціна</label>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Про будинок</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">
       Підтвердити
        </button>


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

