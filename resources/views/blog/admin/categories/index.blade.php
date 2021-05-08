@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('blog.admin.categories.create') }}" class="btn btn-primary">Добавити</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категорія</th>
                                <th>Батьківська категорія</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @if($item->title != 'Без категорії')
                                @php /** @var \App\Models\BlogCategory $item */ @endphp
                                <tr>
                                    <td>{{$item->id-1}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.categories.edit',$item->id)}}">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td @if(in_array($item->parent_id,[0,1])) style ="color:#ccc" @endif>
                                        @if($item->parentCategory->title == 'Без категорії')
                                            Корінь
                                        @else
                                    {{$item->parentCategory->title ?? '?'}}
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
