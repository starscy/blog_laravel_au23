@extends('layouts.admin')

@section('content')

    <x-header-navbar :title="'Создание поста'"/>

    <div class="col-12">
        <form method="POST" action="{{route('admin.post.store')}}" class="col-4" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Название поста</label>
                <input name="title" type="text" placeholder="Название поста" id="title" value="{{old('title')}}"/>
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="summernote">Контент</label>
                <textarea id="summernote" name="content">{{old('content')}}</textarea>
                @error('content')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            {{--            category--}}
            <div class="form-group">
                <label for="category">Выберите категорию</label>
                @if(!empty($categories))
                    <select id="category" class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->title}}</option>
                        @endforeach
                    </select>
                @endif
                @error('category_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            {{--            tags--}}
            <div class="form-group">
                @if(!empty($tags))
                    <label>Теги</label>
                    <select multiple="multiple" name="tag_ids[]" class="custom-select">
                        @foreach($tags as $tag)
                            <option
                                value="{{$tag->id}}">{{$tag->title}}
                                {{ is_array(old('tag_ids') && in_array($tag->id, old('tag_ids'))) ? 'selected' : ''}}>
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>
            {{--            images--}}
            <div class="form-group">
                <label for="exampleInputFile1">Загрузка превью</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile1" name="preview_image">
                        <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                    </div>
                </div>
                @error('preview_image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile2">Загрузка изображения</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile2" name="image">
                        <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                    </div>
                </div>
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Добавить">
        </form>
    </div>
@endsection

