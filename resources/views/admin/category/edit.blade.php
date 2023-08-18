@extends('layouts.admin')

@section('content')

    <x-header-navbar :title="'Редактирование категории'"/>

    <div class="col-12">
        <form method="POST" action="{{route('admin.category.update', $category->id)}}" class="col-4">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Название категории</label>
                <input name="title" type="text" placeholder="Название категории" id="title" value="{{$category->title}}"/>
                @error('title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Редактировать">
        </form>
    </div>
@endsection

