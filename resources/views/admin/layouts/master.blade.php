<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Banco de Horas</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
  <!-- Data Table-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />

  @yield('css')

</head>
<body>

  <div class="container-scroller">

    @include('admin.layouts.header')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    @include('admin.layouts.sidebar')


      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- content-wrapper ends -->

        @include('admin.layouts.footer')

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset("assets/vendors/base/vendor.bundle.base.js")}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset("assets/vendors/chart.js/Chart.min.js")}}"></script>
  <script src="{{asset("assets/vendors/datatables.net/jquery.dataTables.js")}}"></script>
  <script src="{{asset("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js")}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset("assets/js/off-canvas.js")}}"></script>
  <script src="{{asset("assets/js/hoverable-collapse.js")}}"></script>
  <script src="{{asset("assets/js/template.js")}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset("assets/js/dashboard.js")}}"></script>
  <script src="{{asset("assets/js/data-table.js")}}"></script>
  <script src="{{asset("assets/js/jquery.dataTables.js")}}"></script>
  <script src="{{asset("assets/js/dataTables.bootstrap4.js")}}"></script>
  <!-- End custom js for this page-->
  <script src="{{asset("assets/js/jquery.cookie.js")}}" type="text/javascript"></script>
  <!-- Data Table-->

  @stack('scripts')


</body>

</html>

