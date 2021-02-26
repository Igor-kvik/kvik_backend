@extends('layout.layout')
@section('title')
    <title>1kvik.ru - подтверждение пользователя</title>
@endsection
@section('main_content')
    <div class="container text-white">
      <form method="post" action="{{route('register.numberConfirm')}}">
        @csrf
        <div class="form-group">
          <label for="inputNumber" class="col-sm-8 col-form-label row">Введите последние четыре цифры проверочного звонка</label>
          <div class="col-sm-4 row">
            <input type="text" class="form-control" name="inputNumber" placeholder="1234">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Подтвердить</button>
          </div>
        </div>
      </form>
    </div>
@endsection
