<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thư Viện Trường Đại Học An Giang</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{ url('public/plugins') }}/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  
  <link rel="stylesheet" href="{{ url('public/plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

  <link rel="stylesheet" href="{{ url('public/plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('public/plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="{{ url('public/self') }}/mdb.min.css"> -->
  <link rel="stylesheet" href="{{ url('public/dist') }}/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ url('public/dist') }}/css/main.css"> 
  <link rel="stylesheet" href="{{ url('resources/css') }}/app.css">
     <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
 
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
  <style>
        input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active{
    -webkit-box-shadow: 0 0 0 30px white inset !important;
}
        </style>
</head>
<body class="hold-transition sidebar-mini sidebar-collape  sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  @isset($message)
<div class="alert alert-success">
<strong>{{@message}}</strong>
</div>
@endif
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('login') }}" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-fw fa-power-off"></i> Đăng xuất</a>
          <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
            @csrf
          </form>
        </a>
      </li>

    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('login') }}" class="brand-link">
      <img src="{{url('public/images/agulogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; float: none">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image" onerror="this.onerror=null;this.src='{{url('')}}';">
        </div>
        <div class="info">
          <a href="" class="d-block"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">Danh sách</li>
          <li class="nav-item">
            <a href="{{ route('hanghoa') }}" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Hàng hóa
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('hoadon') }}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Hóa đơn
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kho') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Kho
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('loaisp') }}" class="nav-link">
              <i class="nav-icon far fa-chart-bar"></i>
              <p>
                Loại sản phẩm
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('nguoncungcap') }}" class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                Nguồn cung cấp
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
    <!-- Content Header (Page header) -->
    @yield('tittle')

<!-- Main content -->
@yield('content')


    </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b></b>
    </div>
    <strong>Copyright &copy; 2022 <a href="https://www.facebook.com/profile.php?id=100008310814428">NHL</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<!-- ./wrapper -->
<style>
  .btn-rounded{
    border-radius: 30px;
  }
  </style>
<!-- jQuery -->
<script src="{{ url('public/plugins') }}/jquery/jquery.min.js"></script>
<script src="{{ url('public/js') }}/app.js"></script>
<script src="{{ url('public/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('public/plugins') }}/jszip/jszip.min.js"></script>
<script src="{{ url('public/plugins') }}/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('public/plugins') }}/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('public/plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('public/plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dist') }}/js/adminlte.min.js"></script>
<!-- <script src="{{ url('public/self') }}/mdb.min.js"></script> -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
<!-- Page specific script -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

<!-- <script>
    // $(document).on("click", ".modal", function () {
    // var id = $(this).data('id');
    // $(".modal-body #id").val( id );

    $('#exampleModal1').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="id"]').val(bookId);
});
</script> -->

<script type="text/javascript">
  $(function(){
    $(".open-AddBookDialog").click(function(){
      $('#bookId').val($(this).data('id'));
      $("#exampleModal1").modal("show");
    });
  });
</script>
<script>
//   (() => {
//   'use strict';

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   const forms = document.querySelectorAll('.needs-validation');

//   // Loop over them and prevent submission
//   Array.prototype.slice.call(forms).forEach((form) => {
//     form.addEventListener('submit', (event) => {
//       if (!form.checkValidity()) {
//         event.preventDefault();
//         event.stopPropagation();
//       }
//       form.classList.add('was-validated');
//     }, false);
//   });
// })();


</script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>


</body>
</html>
