@extends('layouts.page')
@section('style')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')Адмін панель@endsection
@section('head')Архів@endsection
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
                <td>
                    <form method="post" action="{{route("advertisements.destroy",$advertise->id)}}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-warning" href="{{route('advertisements.edit',$advertise->id)}}">Змінити</a>
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="paginator">
        {{$advertisement->links()}}
    </div>
@endsection

