@extends('layouts.admin')

@section('content')

    <x-header-navbar :title="'Теги'"/>

    <div class="col-1 mb-3">
        <a href="{{route('admin.tag.create')}}" type="button" class="btn btn-block btn-primary">Добавить</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Дата создания</th>
                    <th>Дата последнего обновления</th>
                    <th colspan="3" class="text-center">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->title}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>{{$tag->updated_at}}</td>
                        <td class="text-center"><a href="{{route('admin.tag.show', $tag->id)}}"><i
                                    class="nav-icon fas fa-eye"></i></a></td>
                        <td class="text-center"><a href="{{route('admin.tag.edit', $tag->id)}}"><i
                                    class="nav-icon fas fa-solid fa-pen"></i></a></td>
                        <td class="text-center">
                            <form method="POST" action="{{route('admin.tag.destroy', $tag->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-transparent border-0">
                                <i class="nav-icon fas fa-solid fa-trash" ></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

