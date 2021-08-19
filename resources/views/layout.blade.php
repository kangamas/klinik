<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>klinik</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    @stack('css')
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('menu')
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><span
                            class="navbar-toggler-icon"></span></button>
                </div>
            </nav>
            <div class="container-fluid">
                {{-- content  --}}
                @yield('content')

            </div>

        </div>
    </div>
    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @stack('js')
</body>

</html>
