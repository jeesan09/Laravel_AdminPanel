
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Starter</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini" >
<div   class="wrapper" id="app" >

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/flag.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Jeesan Backend</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/man.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Side effect Rezwan</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link ">
              <i class="nav-icon fas fa-anchor green"></i>
              <p style="color: white;">
                  Admin Panel
                <i class="right fa fa-angle-left "></i>
              </p>
            </a >
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <router-link to="/dashboard" class="nav-link ">

                 <i class="fas fa-tachometer-alt nav-icon yellow"></i>
                  <p>Dashboard</p>
                </router-link>
              </li>
              <li class="nav-item">

                <router-link to="/profile" class="nav-link">

                  <i class="fas fa-user-circle nav-icon yellow"></i>
                  <p>Profile</p>
                </router-link>
              </li>
              <li class="nav-item">

                <router-link to="/Users" class="nav-link ">

                <i class="fas fa-users yellow"></i>

                  <p>Users</p>
                </router-link>
              </li>              
            </ul>
          </li>

          <div class="nav-item" >
              <a class="nav-link" href="{{ route('logout') }}"
                  
            
                  
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
              

                <i class="fas fa-sign-out-alt red"></i>


                     <p>{{ __('Logout') }}</p>
              </a>



              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
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
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
   
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 



    <!-- Main content -->
    <div class="content" >
        <div class="container-fluid">

              <router-view></router-view>
               <vue-progress-bar></vue-progress-bar>

        </div>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->





  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
</body>
</html>