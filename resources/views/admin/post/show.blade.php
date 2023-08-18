@extends('layouts.admin')

@section('content')
    <x-header-navbar :title="$post->title"/>

    <div class="col-12">
        <div class="d-flex align-items-center">
            <h2 class="mr-5">Подробнее о тэге </h2>
            <a href="{{route('admin.post.edit', $post->id)}}"><i
                    class="nav-icon fas fa-solid fa-pen mr-5"></i></a>
            <form method="POST" action="{{route('admin.post.destroy', $post->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-transparent border-0">
                    <i class="nav-icon fas fa-solid fa-trash" ></i>
                </button>
            </form>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <tbody>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Created_at</td>
                    <td>Updated_at</td>
                </tr>
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

