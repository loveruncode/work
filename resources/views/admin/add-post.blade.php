@extends('layout.app-post')


@section('title', 'Add Post')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@section('content')
<div class="container">
    <h2>Create a New Post</h2>

    <form action="{{route('insert-post')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required data-parsley-required-message="Vui lòng nhập tên tiêu đề">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" >
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="form-group">
            <label for="is_featured">Featured</label>
            <div class="form-check">
                <input value="0" type="checkbox" class="form-check-input" id="is_featured" name="is_featured">
                <label class="form-check-label" for="is_featured">Featured</label>
            </div>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" id="image" name="image"  required data-parsley-required-message="Vui lòng cung cấp hình ảnh">
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6"  required data-parsley-required-message="Vui lòng nhập nội dung"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
        <a class="btn btn-success " href="{{route('dashboard')}}">Back To DashBoard</a>
    </form>

    @if(session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function(){}
        }).showToast();
    </script>
@endif

@endsection
