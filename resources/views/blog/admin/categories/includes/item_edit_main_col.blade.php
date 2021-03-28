@php
/** @var \App\Models\BlogCategory $item */
/** @var \Illuminate\Support\Collection $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link" data-toggle="tab" role="tab">Основні дані</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">

                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{$item->title}}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Ідентифікатор</label>
                            <input type="text"
                                    name="slug"
                                    value="{{$item->slug}}"
                                    id="slug"
                                    class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Батько</label>
                            <select name="parent_id"
                                    id="parent_id"
                                    class="form-control"
                                    placeholder="Виберіть категорію"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                    @if($categoryOption->id == $item->parent_id) selected @endif>
{{--                                        {{$categoryOption->id}}.{{$categoryOption->title}}--}}
                                        {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Опис</label>
                            <textarea name="description" id="description" class="form-control" rows="3">
                                {{old('description',$item->description)}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
