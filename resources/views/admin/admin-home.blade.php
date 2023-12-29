<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="/bootstrap-5.3.2-dist/css/bootstrap.min.css"></script>
    <script src="/jquery.js"></script>
    {{-- Toast js and toast css --}}
    <link rel="stylesheet" href="/toast.css">
    <script src="/toastjs.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="/ckfinder/ckfinder.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    {{-- ------ --}}

    <title>Admin Dashboard</title>
    <!-- Open Sans Font -->
    <link href="/font.css" rel="stylesheet">

    <!-- Material Icons -->
    <link href="/icon.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="/icon2.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/app.css">
</head>

<body>
    <div class="grid-container">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
            </div>
            <div class="header-right">
                {{-- <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span> --}}

                <p><span class=" m-1 material-icons-outlined">account_circle</span></p>

            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">mood</span> ADMIN
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="{{ route('getvalue-table-admin') }}">
                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="{{ route('add-post') }}">
                        <span class="material-icons-outlined">add</span> Add New Post
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="/admin/category">
                        <span class="material-icons-outlined">category</span> Category
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="/admin/account">
                        <span class="material-icons-outlined">person</span> Profile
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="{{ route('views') }}">
                        <span class="material-icons-outlined">visibility</span> Views
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#">
                        <span class="material-icons-outlined">poll</span> Reports
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#">
                        <span class="material-icons-outlined">settings</span> Settings
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger " type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <h2>@yield('title', 'DASHBOARD')</h2>
            </div>
            @yield('content')
            {{-- day la phan them vao  datatablse --}}

        </main>
        <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- Custom JS -->
    <script src="{{asset('parsley.js')}}"></script>
    <script src="/scripts.js"></script>
    @if (session('success'))
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
                onClick: function() {}
            }).showToast();
        </script>
    @endif
    @if (session('error'))
        <script>
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff4500, #ff0000)",
                    color: "#ffffff" // Chữ màu trắng
                },
                onClick: function() {}
            }).showToast();
        </script>
    @endif
    @stack('scripts')
</body>

</html>
