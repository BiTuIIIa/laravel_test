@extends('layouts.main')
@section('title-block')
    Post
@endsection
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="from-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="from-group">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content" placeholder="Content"></textarea>
            </div>
            <div class="from-group">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image">
            </div>
            <button type="submit" class="btn btn-success mb-3">Create</button>
        </form>
        <div>
            <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
