@extends('layouts.app')

@section('content')
{{--<div class="container">--}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Всі статті блогу</h1>
                    <table class="table table-hover">
                <tr>
                    <td>ID поста</td>
                    <td>Заголовок</td>
                    <td>Категорія</td>
                    <td>Дата публікації</td>
                </tr>
        @foreach($items as $item)
        @if($item->is_published)
            <tr>
                <td>{{$item->id}}</td>
                <td><a href="{{route('blog.posts.show',$item->id)}}">{{$item->title}}</a></td>
                <td>{{$item->category->title}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
        @endif





        @endforeach
        </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
