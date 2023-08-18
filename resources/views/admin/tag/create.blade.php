@extends('layouts.admin')

@section('content')

    <x-header-navbar :title="'Создание тегов'"/>

    <div class="col-12">
        <form method="POST" action="{{route('admin.tag.store')}}" class="col-4">
            @csrf
            <div class="form-group">
                <label for="title">Название тега</label>
                <input name="title" type="text" placeholder="Название тега" id="title"/>
                @error('title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Добавить">
        </form>
    </div>
@endsection

