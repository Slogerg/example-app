@extends('layouts.app')

@section('content')

        <div class="col-sm-10">

            <h1 style="color: gray">{{$item->title}}</h1><br>
            <h3 style="background-color: lightgray">{{$item->category->title}}</h3>
            <h4>{{$item->content_raw}}</h4>
            <br><br><br><br><br><br><br>
            <h5 style="color: gray">{{$item->published_at}}</h5>
        </div>

@endsection
