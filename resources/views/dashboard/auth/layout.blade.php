<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- jQuery -->
<script src="{{asset('AdminLTE-master')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE-master')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('AdminLTE-master')}}/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-master')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
