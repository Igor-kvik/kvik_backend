<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="2d867abae3e079c1" />
    <meta name="google-site-verification" content="C_RGMOtcNg93AcZsAXNUb2ltP387Avx3LuZ4CdodTs8">
    @section('title')
    <title>1kvik.ru - бесплатная доска объявлений в Челябинске</title>
    @show
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
</head>
<body class="bg-dark">

<!-- header -->
<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark text-white border-bottom shadow-sm">
        <h2 class="my-0 mr-md-auto font-weight-normal"><a class="text-white text-decoration-none" href='{{route('home')}}'><img src="/images/logo.png" alt="" width="120" height="50"></a></h2>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-white text-decoration-none" href='{{route('about')}}'>О компании</a>
            <a class="p-2 text-white text-decoration-none" href='{{route('demo')}}'>Объявления</a>
            <a class="p-2 text-white text-decoration-none" href="#">Помощь</a>
        </nav>
        @if (auth()->check())
            <a class="p-2 text-white text-decoration-none" href="#">{{auth()->user()->name}}</a>
            <a class="p-2 text-white" href="{{route('logout')}}" title="Выйти"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        @else
            <a class="btn btn-warning" href="{{route('login')}}">Войти/Зарегистрироваться</a>
        @endif
    </div>
{{--    @php--}}
{{--      dump(auth()->check());--}}
{{--    @endphp--}}
</header>
@include('layout.alerts')

@yield('main_content')

<!-- footer -->
<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top text-white">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/images/logo.png" alt="" width="100" height="40">
                <small class="d-block mb-3 text-muted"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">© 2020-2021</span></span></small>
            </div>
            <div class="col-6 col-md">
                <h5><span style="vertical-align: inherit;">Центр поддержки</span></h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href='{{route('about')}}'><span style="vertical-align: inherit;">О компании</span></a></li>
                    <li><a class="text-muted" href="#"><span style="vertical-align: inherit;">Обратная связь</span></a></li>
                    <li><a class="text-muted" href="#"><span style="vertical-align: inherit;">Оферта</span></a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5><span style="vertical-align: inherit;">Приложения</span></h5>
                <ul class="list-unstyled my-2">
                    <a class="text-muted" href="#"><span style="vertical-align: inherit;"><i class="fab fa-android mr-10 fa-2x"></i></span></a>
                    <a class="text-muted" href="#"><span style="vertical-align: inherit;"><i class="fab fa-apple fa-2x"></i></span></a>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5><span style="vertical-align: inherit;">Социальные сети</span></h5>
                <ul class="list-unstyled my-2">
                    <a class="text-muted" target="_blank" href="https://www.facebook.com/1kvik/"><span style="vertical-align: inherit;"><i class="fab fa-facebook-f mr-2 fa-2x"></i></span></a>
                    <a class="text-muted" target="_blank" href="https://vk.com/1kvik_ru"><span style="vertical-align: inherit;"><i class="fab fa-vk mr-2 fa-2x"></i></span></a>
                    <a class="text-muted" target="_blank" href="https://ok.ru/kvik1"><span style="vertical-align: inherit;"><i class="fab fa-odnoklassniki mr-2 fa-2x"></i></span></a>
                    <a class="text-muted" target="_blank" href="https://www.instagram.com/kvik.ru/"><span style="vertical-align: inherit;"><i class="fab fa-instagram fa-2x"></i></span></a>
                </ul>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('js/script.js') }}" ></script>
</body>
</html>
