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
        <form action="/admin/deleteSelect"  method="post">
            @csrf
        @foreach ($cate as $item)
        <table class="table table-bordered ">
             <thead>
                <tr>
                    <th>Name Category:</th>
                    <th>Slug:</th>
                    <th>Status:</th>
                    <th>Custom(Update):</th>
                    <th><input id="select_all" type="checkbox">Selected :</th>
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
                    <td><input value="{{$item->id}}" class="checkbox_id" name="ids[{{$item->id}}]" type="checkbox"></td>
                 </tr>
             </tbody>
        </table>
        @endforeach
        <button class=" mb-4 btn btn-danger " type="submit">Delete Seleted</button> <br>
    </form>
    </div>
 <script>
      $(document).ready(function(){
            $('#select_all').change(function(){
                let selectAll = $(this).prop('checked');
                $('.checkbox_id').prop('checked', selectAll);
            });

        });
       
</script>
@endsection

