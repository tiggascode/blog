<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="icon" href="{{ asset('assets\images\icon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('main.index')}}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.index')}}">Categories</a>
                        </li>
                        <li class="nav-item">
                            @auth()
                            <a class="nav-link" href="{{route('personal.main.index')}}">Personal Dashbord</a>
                            @endauth
                            @guest()
                                <a class="nav-link" href="{{route('personal.main.index')}}">Login</a>
                            @endguest
                        </li>
                        <li class="nav-item">
                            @auth()
                            @if(auth()->user()->isAdmin())
                            <a  class="nav-link" href="{{ route('admin.main.index') }}">Admin Dashboard</a>
                            @endif
                            @endauth
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')
 
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
      <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
    });
  });
  $(function () {
    bsCustomFileInput.init();
  });
  $('.select2').select2()
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>

</body>

</html>