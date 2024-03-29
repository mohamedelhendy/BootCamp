<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" />
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}" />
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.min.css')}}" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <h4>Shop AdminPanel</h4>
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
              alt="User Image" />
          </div>
          <div class="info">
            <a href="{{url('admin')}}" class="d-block">
              <h5>Mohamed Elhendy</h5>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{url('admin/categories')}}" class="nav-link">
                <i class="fas fa-bars"></i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/products')}}" class="nav-link">
                <i class="fas fa-bars"></i>
                <p>Products</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/users')}}" class="nav-link">
                <i class="fas fa-bars"></i>
                <p>Users</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/sizes')}}" class="nav-link">
                <i class="fas fa-bars"></i>
                <p>Sizes</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/colors')}}" class="nav-link">
                <i class="fas fa-bars"></i>
                <p>Colors</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @yield('content')

    <!-- /.content-wrapper -->
<footer class="main-footer">
  
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
</body>

</html>