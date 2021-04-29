@extends('layouts.app')
@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home</title>
    <!-- Favicon-->

</head>
<body>
<!-- Navigation-->


<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-8">
            <h1 class="my-4">
                Статті блогу

            </h1>

            @foreach($items as $item)
                @if($item->is_published)
            <div class="card mb-4">
                @if($item->img)
                    <img class="img-fluid rounded" src="{{$item->img}}" alt="">
                @else
                    <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Card image cap" />
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{$item->title}}</h2>
{{--                    <p class="card-title">{{$item->content_raw}}</p>--}}
                    <a class="btn btn-primary" href="{{route('blog.posts.show',$item->id)}}">Переглянути →</a>
                </div>
                <div class="card-footer text-muted">
                    {{$item->created_at}}

                </div>
            </div>
                @endif
            @endforeach
        </div>

        <div class="col-md-4">

            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." />
                        <span class="input-group-append"><button class="btn btn-secondary" type="button">Go!</button></span>
                    </div>
                </div>
            </div>

            <!-- Side widget-->
            <div class="card my-4">
                <h5 class="card-header">Всі статті блогу</h5>
                <div class="card-body">Тут ви можете отримати доступ до всіх статей блогу</div>
            </div>
        </div>
    </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>


{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h1>Всі статті блогу</h1>--}}
{{--                    <table class="table table-hover">--}}
{{--                <tr>--}}
{{--                    <td>ID поста</td>--}}
{{--                    <td>Заголовок</td>--}}
{{--                    <td>Категорія</td>--}}
{{--                    <td>Дата публікації</td>--}}
{{--                </tr>--}}

{{--        @foreach($items as $item)--}}
{{--        @if($item->is_published)--}}
{{--            <tr>--}}
{{--                <td>{{$item->id}}</td>--}}
{{--                <td><a href="{{route('blog.posts.show',$item->id)}}">{{$item->title}}</a></td>--}}
{{--                <td>{{$item->category->title}}</td>--}}
{{--                <td>{{$item->created_at}}</td>--}}
{{--            </tr>--}}
{{--        @endif--}}
{{--        @endforeach--}}
{{--        </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




@endsection
