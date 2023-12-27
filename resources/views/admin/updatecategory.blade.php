@extends('admin.admin-home')

@section('content')
@yield('title', ' Update Category')

<div class="container">
    <h2> Update Category</h2>

    <form action="/admin/update-category/{{$id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name Category:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div> <br>
       <button type="submit" class="btn btn-primary">Update Category</button>
       <a href="{{route('viewCategory')}}" class="btn btn-success ">Back to Category</a>
    </form>

</div>

@endsection
