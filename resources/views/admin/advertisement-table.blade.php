@extends('layouts.page')
@section('style')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')Адмін панель@endsection
@section('head')Дія з оголошенням @endsection
@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Place</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

            @foreach($advertisement as $advertise)
                <tr>
            <th scope="row">{{$advertise->id}}</th>
            <td><a href="{{route('advertisements.show',$advertise->id)}}">{{$advertise->Name}}</a></td>
            <td>{{$advertise->Place}}</td>
                <td><a class="btn btn-warning" href="{{route('advertisements.edit',$advertise->id)}}">Змінити</a>
                    <a class="btn btn-secondary" href="{{route("advertisements.addToArchieve",$advertise->id)}}">Архівувати</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="paginator">
    {{$advertisement->links()}}
    </div>
@endsection

