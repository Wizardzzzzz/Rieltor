@extends('layouts.page')

@section('head')
    Головна сторінка
    @endsection
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                @endauth
            </div>
        @endif

    </div>
@endsection

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
