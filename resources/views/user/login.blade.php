@extends('layout.layout')
@section('title')
    <title>1kvik.ru - регистрация пользователя</title>
@endsection
@section('main_content')
    <div class="container text-white">
        <form method="post" action="{{route('login')}}">
            @csrf
            <div class="form-row row-cols-1">
                <div class="form-group row-cols-2 col-md-8">
                    <label for="phone">Ваш номер телефона</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="телефон 10 знаков">
                    @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group row-cols-2 col-md-8">
                    <label for="password">Введите Ваш пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль">
                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-5">
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
                <div class="form-group col-md-2">
                    <a class="text-blue-500 hover:text-white" href="{{route('register.create')}}">Регистрация</a>
                </div>
                <div class="form-group col-md-2">
                    <a class="text-blue-500 hover:text-white" href="#">Восстановить</a>
                </div>
            </div>
        </form>
    </div>
@endsection
