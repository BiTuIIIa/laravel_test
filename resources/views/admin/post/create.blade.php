@extends('layouts.admin')
@section('title-block')
    Post
@endsection
@section('content')
    <div>
        <form action="{{route('admin.post.store')}}" method="post">
            @csrf
            <div class="from-group">
                <label for="title" class="form-label">Title</label>
                <input value="{{old('title')}}"
                       type="text" name="title" class="form-control" id="title" placeholder="Title">
                @error('title')
                <p class="text-danger">{{$message}}<p>
                @enderror
            </div>
            <div class="from-group">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content"
                          placeholder="Content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}<p>
                @enderror
            </div>
            <div class="from-group">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image">
                @error('image')
                <p class="text-danger">{{$message}}<p>
                @enderror
            </div>
            <div class="from-group">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ?  'selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="from-group">
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-control" name="tags[]" id="tags">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mb-3">Create</button>
        </form>
    </div>
    <div>
        <a href="{{route('admin.post.index')}}" class="btn btn-secondary">Back</a>
    </div>
@endsection
