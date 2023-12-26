@extends('admin.admin-home')

@section('content')
@yield('title', 'Category')

<div class="container">
    <h2>Add Category</h2>
    <form action="{{route('add-category')}}" method="post">
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
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
    <div class="mt-2 container">
        @foreach ($cate as $item)
        <table class="table table-bordered ">
             <thead>
                <tr>
                    <th>Name Category:</th>
                    <th>Slug:</th>
                    <th>Status:</th>
                    <th>Custom(Update):</th>
                </tr>
             </thead>
             <tbody>
                 <tr class="align-middle">
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td> @if ($item->status === 'active')
                     <span class="badge bg-success text-white">Active</span>
                    @elseif ($item->status === 'inactive')
                    <span class="badge bg-danger text-white">Inacvive</span>
                    @else
                     <span class="badge bg-secondary text-white">{{ $item->status }}</span>
                    @endif</td>
                   <td><a href="/admin/UpdateCate/{{$item->id}}" id="showForm" class="btn btn-success "><span class="material-icons-outlined">update</span></a></td>
                 </tr>
             </tbody>
        </table>
        @endforeach
    </div>
    
@endsection

