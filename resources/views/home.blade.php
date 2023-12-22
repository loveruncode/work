    @include('layout.cdn')
    <title>@yield('title')</title>
</head>
<body>
    @include('layout.navbar')
  @yield('content')
    <div class="container">
     <form action="#" method="post">
        @csrf
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
            {{ session()->get('error') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Login
                </div>

                <div class="card-body">
                    <form action="{{route('login-submit')}}" method="post">
                         @csrf
                        <div class="form-group">
                            <label for="username">Email:</label>
                            <input name="email" type="text" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
     </form>
    </div>

</body>
</html>
