@extends('layouts.admin')

@section('content')

    <x-header-navbar :title="'Создание категории'"/>

    <div class="col-12">
        <h2>Добавление категории </h2>
        <form method="POST" action="{{route('admin.category.store')}}" class="col-4">
            @csrf
            <div class="form-group">
                <label for="title">Название категории</label>
                <input name="title" type="text" placeholder="Название категории" id="title"/>
                @error('title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Добавить">
        </form>
    </div>
@endsection

