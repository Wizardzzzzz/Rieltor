@extends('layouts.page')

@section('head')
    Головна сторінка
@endsection
@section('content')
<?php
var_dump($data);
?>
    @foreach($data as $el)
        {{$el->Id}}
        <a href="upload"></a>
    {{$el->Name}}
    @endforeach

@endsection

<style>
    body {
        font-family: 'Nunito';
    }
</style>

