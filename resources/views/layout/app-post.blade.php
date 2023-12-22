<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('bootstrap-4.0.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <title>@yield('title')</title>
</head>
<body>
     @yield('content')
</body>


</html>
