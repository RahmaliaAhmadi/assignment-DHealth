<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
         
        </form>
        <ul class="navbar-nav navbar-right">
         
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"> {{ Session::get('name') }}</div>
            <div class="dropdown-menu dropdown-menu-right">
        
              <div class="dropdown-divider"></div>
              <a href="{{ url('/logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('/dashboard' )}}">Resep Obat Digital</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/dashboard' )}}">ROD</a>
          </div>
          <ul class="sidebar-menu">
          <li class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                        <a href="{{ url('/dashboard' )}}" >
              <i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            
          
              <li class="menu-header">Resep Obat</li>
              <li class="{{ Request::segment(1) === 'transaction' ? 'active' : null }}">
                <a href="{{ url('/transaction') }}"><i class="fas fa-plus"></i> <span>Data Transaksi</span></a>
                
              </li>
            
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
      @yield('content') 
        <section class="section">
      
       
          <div class="section-body">
       
          </div>
         
        </section>
        
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> D'Health-Test
        </div>
        <div class="footer-right">
          V.1.0
        </div>
      </footer>
    </div>
    </div>
 

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/demo/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('assets/js/demo/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/demo/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/demo/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('assets/js/demo/moment.min.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('ckeditor5/ckeditor.js')}}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>


  @yield('js-custom')

  @if(Session::get('message') == 'update')
    <script type="text/javascript">
        swal.fire({
            title: "Good Job!",
            text: "Your Data Has Been Updated!",
            type: "success",
            icon: 'success',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'error')
    <script type="text/javascript">
        swal.fire({
            title: "Error 404 Not Found!",
            text: "Data is Broke!",
            type: "warning",
            icon: 'warning',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'insert')
    <script type="text/javascript">
        swal.fire({
            title: "Good Job!",
            text: "Your Data Has Been Inserted!",
            type: "success",
            icon: 'success',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'data_ada')
    <script type="text/javascript">
        swal.fire({
            title: "Sorry!",
            text: "Your Input Email/Username is Available on Database, Please Input Some Else!",
            type: "warning",
            icon: 'warning',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'password_sama')
    <script type="text/javascript">
        swal.fire({
            title: "Sorry!",
            text: "Your Input Password Not Same with Input Confirm Password, Please Try Again!",
            type: "warning",
            icon: 'warning',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'delete')
    <script type="text/javascript">
        swal.fire({
            title: "Deleted!",
            text: "Your Data Has Been Deleted!",
            type: "success",
            icon: 'success',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'login1')
    <script type="text/javascript">
        swal.fire({
            title: "Login Gagal",
            text: "Email tidak ditemukan",
            type: "warning",
            icon: 'warning',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'login2')
    <script type="text/javascript">
        swal.fire({
            title: "Login Gagal",
            text: "Password salah",
            type: "warning",
            icon: 'warning',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@elseif(Session::get('message') == 'prohibited')
    <script type="text/javascript">
        swal.fire({
            title: "Akses Ditolak",
            text: "Anda Tidak Diizinkan Mengakses Modul Ini",
            type: "warning",
            icon: 'warning',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        });
    </script>
@endif
  <!-- Page Specific JS File -->
</body>
</html>

