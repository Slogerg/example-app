@php
/** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубліковано
                @else
                    Чорновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role = "tablist">
                    <li class="nav-item">
                        <a href="#maindata" role="tab" data-toggle="tab" class="nav-link">Основні дані</a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" role="tab" data-toggle="tab" class="nav-link">Додаткові дані</a>
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
                            <label for="content_raw">Стаття</label>
                            <textarea class="form-control" name="content_raw" id="content_raw" rows="20">{{ old('content_raw',$item->content_raw) }}
                            </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категорія</label>
                            <select name="category_id" id="category_id"
                            class="form-control"
                                    placeholder="Виберіть категорію"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
{{--                                        УВАГА!!!!--}}
{{--                                        УВАГА!!!!--}}
{{--                                        УВАГА!!!!--}}
                                        {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Ідентифікатор</label>
                            <input type="text"
                                    id="slug"
                                    name="slug"
                                    class="form-control"
                            value="{{ $item->slug }}">
                        </div>

                        <div class="form-group">
                            <label for="img">Витримка</label>
                            <textarea name="img" id="img" rows="2" class="form-control">
                                {{  $item->excerpt }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Картинка</label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="form-control">
                                {{ old('excerpt', $item->excerpt) }}
                            </textarea>
                        </div>


                        <div class="form-check">
                            <input type="hidden"
                                   value="0"
                                   name="is_published">
                            <input type="checkbox" name="is_published" class="form-check-input"
                                    value="1"
                                    @if($item->is_published)
                                        checked="checked"
                                    @endif>
                            <label for="is_published" class="form-check-label">Опубліковано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
