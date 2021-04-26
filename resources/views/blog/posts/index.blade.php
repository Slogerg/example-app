@extends('layouts.app')

@section('content')
{{--<div class="container">--}}

{{--</div>--}}
<div align="center">
    <table>
        @foreach($items as $item)

            <tr>
                <td>{{$item->id}}</td>
                <td><a href="{{route('blog.posts.show',$item->id)}}">{{$item->title}}</a></td>

                <td>{{$item->created_at}}</td>
            </tr>



        @endforeach
    </table>

</div>
@endsection
