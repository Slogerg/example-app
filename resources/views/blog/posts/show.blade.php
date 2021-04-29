@extends('layouts.app')
@section('content')

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post</title>

    <!-- Bootstrap core CSS -->


    <!-- Custom styles for this template -->



</head>

<body>




<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{$item->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                {{$item->user->name}}
            </p>

            <hr>

            <!-- Date/Time -->
            <p>{{$item->published_at}}</p>

            <hr>
            <div class="card my-4">
                <h5 class="card-header">{{$item->category->title}}</h5>

            </div>

            @if($item->img)
                <img class="img-fluid rounded" src="{{$item->img}}" alt="">
            @endif
            <hr>

                <p class="lead">
                    {{$item->content_raw}}
                </p>

            <hr>

            <div class="card my-4">
                <h5 class="card-header">Залиште коментар:</h5>
                <div class="card-body">
                    <form method="POST" action="{{route('blog.posts.store')}}">
                        @csrf
                        <div class="form-group">

                            <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" id="blog_post_id" name="blog_post_id" value="{{$item->id}}">
                            <textarea id="text_comment" name="text_comment" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Підтвердити</button>
                    </form>
                </div>
            </div>
            <hr>
                @foreach($item->comments->reverse() as $comments)

            <div class="media mb-4">
                <hr>
                <div class="media-body">
                    <h5 class="mt-0">

                {{$comments->user->name}}

                    </h5>
                    {{$comments->text_comment}}
                </div>
            </div>
                <hr>
            @endforeach


    </div>


</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PolygonBlog 2021</p>
    </div>

</footer>



</div>
</body>

</html>
@endsection
