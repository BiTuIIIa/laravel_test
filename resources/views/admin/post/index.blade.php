@extends('layouts.admin')
@section('content')
    <div>
        <div>
            <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-3">Add post</a>
        </div>
        <div>
            @foreach($posts as $post)
                <div><a href="{{route('admin.post.show', $post->id)}}"> {{$post->id}}.{{$post->title}}</a></div>
            @endforeach
            <div>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
