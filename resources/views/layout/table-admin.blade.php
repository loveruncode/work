        @extends('admin.admin-home')

        @section('content')
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            </div>
            <div class="table-responsive">
                @yield('title', 'Lists')
                <h2>Table</h2>
                {!! $dataTable->table() !!}
        
            </div>


        @endsection

        @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        @endpush







            {{-- <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Is Featured</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Excerpt</th>
                            <th>Content</th>
                            <th>Posted At</th>
                            <th>Custom(Delete,Update,Views)</th>
                            <th>Category_id</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ps as $item)
                            <tr class="align-middle">
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->is_featured }}</td>
                                <td>
                                    @if ($item->status === 'published')
                                        <span class="badge bg-success text-white">Published</span>
                                    @elseif ($item->status === 'draft')
                                        <span class="badge bg-danger text-white">Draft</span>
                                    @else
                                        <span class="badge bg-secondary text-white">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td><img src="{{ asset('storage/images/' . $item->image) }}" alt="hinh anh" width="100px"
                                        height="100px"></td>
                                <td>{{ $item->excerpt }}</td>
                                <td>{!! $item->content !!}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="/admin/delete/{{ $item->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger "><span
                                                class="material-icons-outlined">delete</span></button>
                                    </form>
                                    <a class="btn btn-success " href="/admin/update/{{ $item->id }}"><span
                                            class="material-icons-outlined">update</span></a>
                                    <a class="btn btn-warning " href="#"> <span
                                            class="material-icons-outlined">visibility</span></a>
                                </td>
                                <td>{{ $item->category_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
