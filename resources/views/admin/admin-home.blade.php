<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('bootstrap-4.0.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="/admin/public/ckeditor/ckeditor.js"></script>
    <style>
         .nav-item a {
        font-size: 1.5rem;
        display: block;
        padding: 0.5rem 1rem;
        color: #000;
        text-decoration: none;
    }
    .published-class {
    color: rgb(46, 203, 73);
}
.draft-class {
    color: rgb(230, 56, 56);
}
.position-sticky ul li a:hover{
     background: rgb(228, 227, 227);
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">DASHBOARD</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="{{route('dashboard')}}">Quản trị</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('getvalue-table-admin') }}">Bảng Dữ Liệu</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
                <img class="m-2 " src="{{asset('storage/images/solana.png')}}" alt="anh dai dien" height="50px" width="50px">
                <p class="m-1">Name....</p>
          </form>
        </div>
      </nav>





<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2  bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column px-3">
                    <li class="mt-2 nav-item">
                        <a class="mt-3" href="#">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" >
                        Danh Mục Sản Phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Loading ...
                        </a>
                    </li>
                    <li class=" mt-4 nav-item">
                        <div>
                            <a style="width:120px" class=" btn btn-primary " href="{{route('add-post')}}">Add Post</a>
                         </div>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class=" mt-3 btn-lg btn btn-danger" type="submit">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-8 ms-sm-auto col-lg-10 px-md-5">
            @yield('table')
        </main>
    </div>
</div>
<script>
@if(session('success'))
    Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "top",
        position: "left",
        stopOnFocus: true,
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){}
    }).showToast();
@endif
</script>


</body>
</html>




