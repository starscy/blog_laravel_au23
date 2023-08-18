@extends('layouts.admin')

@section('content')

    <x-header-navbar :title="'Редактирование тега'"/>

    <div class="col-12">
        <form method="POST" action="{{route('admin.tag.update', $tag->id)}}" class="col-4">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Название тега</label>
                <input name="title" type="text" placeholder="Название тега" id="title" value="{{$tag->title}}"/>
                @error('title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Редактировать">
        </form>
    </div>
@endsection

