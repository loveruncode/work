@extends('admin.admin-home')
@section('table')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dữ liệu Bảng</h1>
</div>
<div class="table-responsive">
    <form action="/admin/deleteSelect" method="post">
        @csrf
    <table id="datatables" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th >Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Is Featured</th>
                <th >Image</th>
                <th >Excerpt</th>
                <th>Content</th>
                <th>Created At</th>
                <th >Update</th>
                <th>Delete</th>
                <th>View Post</th>
                <th><input id="select_all" type="checkbox">Select</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $value)
            <tr>
                <td class="h5">{{ $value->title }}</td>
                <td>{{$value->slug}}</td>
                <td class="{{ $value->status == 'published' ? 'published-class' : 'draft-class' }}">
                    {{ $value->status }}
                </td>

                <td>{{ $value->is_featured ? 'Yes' : 'No' }}</td>
                <td><img src="{{asset('storage/images/' .$value->image)}}" alt="hinh anh posts" width="100px" height="100px"></td>
                <td>{{ $value->excerpt }}</td>
                <td>{!!$value->content!!}</td>
                <td>{{ $value->created_at }}</td>
               <td><a class="btn btn-primary " href='{{'/admin/update/'.$value->id}}'>Update</a></td>
                <td><form action="{{'/admin/delete/'. $value->id}}" method="post">
                    @csrf<button type="submit" class="btn btn-danger ">Delete</button>
                </form></td>
                <td><a class="btn btn-warning  " href="#">View</a></td>
                <td><input value="{{$value->id}}" class="checkbox_id" name="ids[{{$value->id}}]"  type="checkbox"></td>
            </tr>
        @endforeach
        </tbody>
        <button class=" mb-4 btn btn-danger " type="submit">Delete Seleted</button> <br>
    </table>

</form>
</div>
<script>
       $(document).ready(function(){
            $('#select_all').change(function(){
                let selectAll = $(this).prop('checked');
                $('.checkbox_id').prop('checked', selectAll);
            });

        });

        $(document).ready( function () {
        $('#datatables').DataTable();
            });
</script>
<script>

</script>

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
