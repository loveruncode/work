@extends('admin.admin-home')


@section('content')
    <h3>@yield('title', 'Views')</h3>
    {{-- day la con container --}}
             @foreach ($posts as $item)
            <article class="  post vt-post">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                        <div class="post-type post-img">
                            <a href="#"><img src="{{asset('storage/images/'.$item->image)}}"
                                  height="50%" width="50%"  class="img-responsive" alt="image post"></a>
                        </div>
                        <div class="author-info author-info-2">
                            <ul class="list-inline">
                                <li>
                                    <div class="info">
                                        <p> Created at :{{$item->created_at}}</p>
                                        <strong>{{$item->slug}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <p>Status:</p>
                                        <strong>
                                            @if ($item->status === 'published')
                                            <span class="badge bg-success text-white">Published</span>
                                        @elseif ($item->status === 'draft')
                                            <span class="badge bg-danger text-white">Draft</span>
                                        @else
                                            <span class="badge bg-secondary text-white">{{ $item->status }}</span>
                                        @endif
                                        </strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                        <div class="caption">
                            <h2>Danh Mục:{{$item->category->name}}</h2>
                            <h3>Title:{{$item->title}}</h3>
                            <h5>Content: {!!$item->content!!}</h5>
                            <p>Excerpt: {{$item->excerpt}}</p>
                            <strong>Featured: {{$item->is_featured}}</strong>
                        </div>
                    </div>
                </div>
            </article>


            @endforeach





            {{-- page --}}
            {{--
        <div class="pagination-wrap">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div> --}}


            {{-- end of contaner  --}}
        @endsection
