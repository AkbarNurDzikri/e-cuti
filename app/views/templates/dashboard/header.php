<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- My CSS -->
  <!-- <link rel="stylesheet" href="<?= BASEURL;?>/assets/css/dashboard_style.css"> -->
  <link rel="icon" href="<?= BASEURL; ?>/assets/img/navbar-brand.png">
  <title>E-Cuti BFI</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/fontawesome-free-6.1.1/css/all.css">
  <!-- Font Awesome Template Admin -->
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/AdminLTE-master/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/AdminLTE-master/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= BASEURL;?>/vendor/select2-4.1.0-rc.0/dist/css/select2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= BASEURL; ?>/assets/img/navbar-brand.png" alt="Blasfolie Logo" height="150" width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#userSettingModal" href="#" role="button">
          <i class="far fa-user-circle"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= BASEURL; ?>/assets/img/navbar-brand.png" alt="Brand Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blasfolie</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-0 mb-3 d-flex">
        <div class="image mt-3">
            <?php if($_SESSION['user']['gender'] == 'L') : ?>
              <img src="<?= BASEURL; ?>/assets/vector/logo-user-man.png" class="img-circle elevation-2" alt="user-image">
            <?php  else : ?>
              <img src="<?= BASEURL; ?>/assets/vector/logo-user-woman.png" class="img-circle elevation-2" alt="user-image">
            <?php endif; ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['user']['nama_user']; ?></a>
          <p><a href="" class="dblock"><?= $_SESSION['user']['nama_jabatan'] . ' ' . $_SESSION['user']['nama_dept'] ?></a></p>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <?php if($_SESSION['user']['nama_dept'] == 'HRD' || $_SESSION['user']['nama_dept'] == 'Admin Sistem') : ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="fas fa-layer-group"></i>
                <p class="ml-1">
                  Grouping Karyawan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/karyawan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Karyawan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/group" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Group</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="<?=  BASEURL; ?>/transcuti" class="nav-link">
                <i class="fas fa-feather-alt"></i>
                <p class="ml-2">
                  Trans Cuti
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-file-alt ml-1"></i>
                <p class="ml-2">
                  Post Manager
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-database"></i>
                <p class="ml-2">
                  Master Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/pendidikan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendidikan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/jurusan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jurusan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/dept" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Department</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/jabatan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/cuti" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cuti</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL; ?>/user" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php else : ?>
              <li class="nav-item">
                <a href="<?=  BASEURL; ?>/transcuti" class="nav-link">
                  <i class="fas fa-feather-alt"></i>
                  <p class="ml-2">
                    Trans Cuti
                  </p>
                </a>
              </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <!-- page title -->
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><b>Breadcrumb</b></li>
              <li class="breadcrumb-item active"><b>Judul</b></li>
            </ol>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Parent Breadcrumb</li>
                <li class="breadcrumb-item active">Judul</li>
            </ol>
          </div> -->
        </div>
        <hr>

          <?php if(isset($_SESSION['flash'])) : ?>
              <?php Flasher::flash(); ?>
          <?php endif;?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- Main row -->
        <!-- Content here -->
        <!-- /.row (main row) -->
      