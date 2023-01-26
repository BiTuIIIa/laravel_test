@extends('layouts.main')
@section('title-block')
    Post
@endsection
@section('content')
    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Add post</a>
    </div>
    <div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}"> {{$post->id}}.{{$post->title}}</a></div>
        @endforeach
    </div>
@endsection
