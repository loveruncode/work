@extends('layout.app-post')


@section('title', 'Update Post')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@section('content')
<div class="container">
    <h2>Update Post</h2>

    <form action="/admin/updateForm/{{$id}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
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
            <input type="file" class="form-control" id="image" name="image" >
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
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
