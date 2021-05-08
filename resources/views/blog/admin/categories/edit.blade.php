@extends('layouts.app')

@section('content')

    @php
        /** @var \App\Models\BlogCategory $item */
    @endphp

    @if($item->exists)
    <form method="POST" action="{{route('blog.admin.categories.update', $item->id)}}">
        {{--додаємо директиву, щоб ларавель зрозумів, що метод відправки форми - PATCH--}}
        @method('PATCH')

        @else
            <form method="POST" action="{{ route('blog.admin.categories.store') }}">
                @endif


{{--        відправляємо токен для захисту форму від різних підлогів--}}
        @csrf
        <div class="container">
            @php
            /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp

            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif


            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col_md_3">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
<div class="container">
    @if($item->exists)
        <br>
        <form method="POST" action= "{{ route('blog.admin.categories.destroy' , $item->id) }}">
            @method('DELETE')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-block">
                        <div class="card-body ml-auto">
                            <button type="submit" class="btn btn-link">Видалити</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    @endif
</div>
@endsection
