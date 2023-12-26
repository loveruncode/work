        @extends('admin.admin-home')
        @section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @yield('title', 'Lists')
        </div>
               <div class="table-responsive">


            {{-- day la cho th em table --}}

                <h2>Table</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th >Title</th>
                            <th>Slug</th>
                            <th>Is Featured</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Excerpt</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>Custom(Delete,Update,Views)</th>
                            <th>Category_id</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ps as $item)
                        <tr class="align-middle">
                            <td>{{$item->title}}</td>
                            <td>{{$item->slug}}</td>
                            <td>{{$item->is_featured}}</td>
                            <td>
                                @if ($item->status === 'published')
                                    <span class="badge bg-success text-white">Published</span>
                                @elseif ($item->status === 'draft')
                                    <span class="badge bg-danger text-white">Draft</span>
                                @else
                                    <span class="badge bg-secondary text-white">{{ $item->status }}</span>
                                @endif
                            </td>
                           <td><img src="{{asset('storage/images/'.$item->image)}}" alt="hinh anh" width="100px" height="100px"></td>
                            <td>{{$item->excerpt}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                 <form action="/admin/delete/{{$item->id}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger "><span class="material-icons-outlined">delete</span></button>
                                 </form>
                                <a class="btn btn-success " href="/admin/update/{{$item->id}}"><span class="material-icons-outlined">update</span></a>
                                <a class="btn btn-warning " href="#"> <span class="material-icons-outlined">visibility</span></a>
                            </td>
                            <td>{{$item->category_id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{-- select all  --}}


            </div>
             <script>
              //// this is selected all
            //   $(document).ready(function() {
            // $('#select_all').change(function() {
            //     let selectAll = $(this).prop('checked');
            //     $('.checkbox_id').prop('checked', selectAll);
            // });

            //  });
            //      $(document).ready(function() {
            //     $('#datatables').DataTable();
            //   });
         </script>
        @endsection





{{--
@foreach ($post as $value)
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
@endforeach --}}
