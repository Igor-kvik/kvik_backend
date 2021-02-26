@extends('layout.layout')
@section('title')
    <title>1kvik.ru - регистрация пользователя</title>
@endsection
@section('main_content')
<div class="container text-white">
    <form method="post" action="{{route('register.store')}}">
        @csrf
        <div class="form-row row-cols-1">
            <div class="form-group col-md-3">
                <label for="name">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Введите Ваше имя" >
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="phone">Телефон</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Введите номер телефона">
                @error('phone')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group row-cols-2 col-md-8">
                <label for="password">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Введите Пароль">
            </div>
            <div class="form-group row-cols-2 col-md-8">
                <label for="password_confirmation">Подтвердите Пароль</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Подтвердите Пароль">
            </div>
            @error('password')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-5">Зарегистрироваться</button>
    </form>
</div>
@endsection
