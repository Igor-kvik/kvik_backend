@extends('layout.layout')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('main_content')
    <div class="container text-white">

{{--        <p style="margin: 0">Страна: {{$geo->country}}</p><br/>--}}
{{--        <p style="margin: 0">Город: {{$geo->city}}</p>--}}

{{--    @foreach($air as $rec)--}}
{{--        <hr style="background-color: #fff">--}}
{{--        <p style="margin: 0">--}}
{{--            {{$rec->aircraft_code}}--}}
{{--        </p>--}}
{{--        <p style="margin: 0">--}}
{{--            {{$rec->model}}--}}
{{--        </p>--}}
{{--        <p style="margin: 0">--}}
{{--            {{$rec->range}}--}}
{{--        </p>--}}
{{--    @endforeach--}}
{{--        <p>Проверка вставки</p>--}}
        <button class="text-white font-bold bg-purple-700 hover:bg-purple-800 my-5 py-2 px-4 rounded">
            Проверка Tailwind CSS
        </button>
        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </div>
@endsection

