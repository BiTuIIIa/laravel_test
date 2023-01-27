@extends('layouts.admin')
@section('title-block')
    Post
@endsection
@section('content')
    <div>
        <div>{{$post->id}}.{{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div>
        <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-warning mb-3">Edit</a>
    </div>
    <div>
        <form action="{{route('admin.post.delete',$post->id) }} " method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger mb-3">
        </form>
    </div>
    <div>
        <a href="{{route('admin.post.index')}}" class="btn btn-secondary mb-3">Back</a>
    </div>

@endsection
