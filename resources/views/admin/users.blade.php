@extends('layouts.page')
@section('style')
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('title')Адмін панель@endsection
@section('head')Користувачі@endsection
@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->firstName}}</td>
                <td>{{$user->lastName}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="paginator">
        {{$users->links()}}
    </div>
@endsection

