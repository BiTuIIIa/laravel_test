@extends('layouts.main')
@section('title-block')
    Post
@endsection
@section('content')
    <div>
        <form action="{{route('post.update',$post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="from-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{$post->title}}">
            </div>
            <div class="from-group">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content"
                          placeholder="Content">{{$post->content}}</textarea>
            </div>
            <div class="from-group">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                       value="{{$post->image}}">
            </div>
            <div class="from-group">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option
                            {{$category->id == $post->category->id ? 'selected' : ''}}

                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="from-group">
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-control" name="tags[]" id="tags">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{$tag->id == $postTag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mb-3">Update</button>
        </form>
        <div>
            <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
