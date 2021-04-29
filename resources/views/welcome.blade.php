@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Frontpage - Start Bootstrap Template</title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body>

<header class="bg-primary py-5 mb-5">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-white mt-5 mb-2">Polygon Blog</h1>
                <p class="lead mb-5 text-white-50">Ми являємось найбільшими архітектурним блогом у місті Хмельницький.</p>
            </div>
        </div>
    </div>
</header>


<div class="container">

    <div class="row">
        <div class="col-md-8 mb-5">
            <h2>Що ми даємо</h2>
            <hr>
            <p>Ми даємо широкий спектр інформації про того чи іншого архітектурного витрвору</p>
            <p>Збагачуйтесь культурно або переймайте певні навики описані у цьому блогу професіоналами</p>
            @guest()
                <a class="btn btn-primary btn-lg" href="{{route('register')}}">Зареєструватись &raquo;</a>
            @else
                <a class="btn btn-primary btn-lg" href="{{route('blog.posts.index')}}">Перейти до статей &raquo;</a>
            @endguest

        </div>
        <div class="col-md-4 mb-5">
            <h2>Зв'язок</h2>
            <hr>
            <address>
                <strong>Хмельницький</strong>
                <br>район Думка
                <br>Зарічанська 10, 29000
                <br>
            </address>
            <address>
                <abbr title="Phone">Телефон:</abbr>
                (380) 228-1234
                <br>
                <abbr title="Email">E:</abbr>
                <a href="mailto:#">antonslogerg@gmail.com</a>
            </address>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="https://placehold.it/300x200" alt="">
                <div class="card-body">
                    <h4 class="card-title">Замовити архітектора</h4>
                    <p class="card-text">Для того, щоб замовити архітектора до свого адресу, будь ласка, зателефонуйте за номером вказаним на цій сторінці або нижче.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Зателефонувати!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="https://placehold.it/300x200" alt="">
                <div class="card-body">
                    <h4 class="card-title">Замовити послуги редактора</h4>
                    <p class="card-text">Редактор допоможе у вашому сайті розмістити певний матеріал який буде притягувати клієнтів</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Зателефонувати!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="https://placehold.it/300x200" alt="">
                <div class="card-body">
                    <h4 class="card-title">Замовити послуги програміста</h4>
                    <p class="card-text">По нашому адресу ви знайдете офіс з дуже талановитими програмістами, які допоможуть вам створити і підтримати свій проект.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Зателефонувати!</a>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PolygonBlog 2021</p>
    </div>
</footer>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
@endsection
