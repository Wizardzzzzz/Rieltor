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

    <form action="{{ route('advertisements.update',$advertisement[0]['id']) }}" method="POST">
        @csrf
       @method('PUT')
        <div class="container">
            <div class="row">

@foreach($advertisement as $advertise)
                <div class="white w-100">

                    <div class="form-group col-6">
                        <label for="Name">Назва оголошення</label>
                        <input id="Name" value="{{$advertise->Name}}" type="text" name="Name" class="form-control ">

                    </div>

                    <div class="form-group col-6">
                        <label for="Place">Місто</label>
                        <input type="text" value="{{$advertise->Place}}" name="Place" class="form-control ">

                    </div>
                    <div class="form-group col-6">
                        <label for="Address">Адреса</label>
                        <input type="text" name="Address" value="{{$advertise->Address}}" class="form-control ">

                    </div>
                    <div class="form-group col-6">
                        <label for="Fettle">Стан будинку</label>
                        <input type="text" name="Fettle" value="{{$advertise->Fettle}}" class="form-control ">
                    </div>
                    <div class="form-group col-6">
                        <label for="Benefits">Перневаги</label>
                        <input type="text" name="Benefits" value="{{$advertise->Benefits}}" class="form-control ">
                    </div>
                    <div class="form-group col-6">
                        <label for="Infrastructure">Інфраструктура</label>
                        <input type="text" name="Infrastructure" value="{{$advertise->Infrastructure}}" class="form-control">

                    </div>
                    <div class="form-group col-3">
                        <label for="Area">Площа</label>
                        <input type="text" name="Area" value="{{$advertise->Area}}" class="form-control">
                    </div>

                    <div class="form-label-group col-3">
                        <label for="Superficiality">Поверховість</label>
                        <input type="number" min="1" value="{{$advertise->Superficiality}}" max="99" name="Superficiality" class="form-control"
                               placeholder="Поверх" required=""
                               autofocus="">
                    </div>
                </div>

                <div class="white">

                    <div class="form-group col-lg-3">
                        <label for="Price">Ціна</label>
                        <input type="text" value="{{$advertise->Price}}" name="Price" placeholder="Введіть ціну в $" class="form-control">
                    </div>
                </div>
                @endforeach
            </div>
            <input class="btn btn-primary" type="submit" value="Підтвердити">
        </div>
    </form>


@endsection

