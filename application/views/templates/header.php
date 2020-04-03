<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="x-ua-compatible" content="ie=edge">

     <title>Inventaris</title>
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="<?php echo base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
     <!-- Ionicons -->
     <link rel="stylesheet" href="<?php echo base_url('asset/plugins/ionicons/css/ionicons.min.css') ?>">
     <!-- DataTables -->
     <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
     <!-- Theme style -->
     <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/adminlte.min.css') ?>">
     <!-- Tempusdominus Bbootstrap 4 -->
     <link rel="stylesheet" href="<?php echo base_url('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
     <!-- Select2 -->
     <link rel="stylesheet" href="<?php echo base_url('asset/plugins/select2/css/select2.min.css') ?>">
     <link rel="stylesheet" href="<?php echo base_url('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
     <!-- jQuery -->
     <script src="<?php echo base_url('asset/plugins/jquery/jquery.min.js') ?>"></script>
     <!-- jQuery Migrate-->
     <script src="<?php echo base_url('asset/plugins/jquery-migrate/jquery-migrate-3.1.0.min.js') ?>"></script>

     <!-- Bootstrap 4 -->
     <script src="<?php echo base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
     <!-- AdminLTE App -->
     <script src="<?php echo base_url('asset/dist/js/adminlte.min.js') ?>"></script>
</head>

<body class="hold-transition sidebar-mini">
     <div class="wrapper">

          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
               <!-- Left navbar links -->
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url('inventaris/dashboard') ?>"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                         <a href="<?php echo base_url('inventaris/dashboard') ?>" class="nav-link">Home</a>
                    </li>
               </ul>

               <!-- SEARCH FORM -->
               <!--  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                         <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                         <div class="input-group-append">
                              <button class="btn btn-navbar" type="submit">
                                   <i class="fas fa-search"></i>
                              </button>
                         </div>
                    </div>
               </form> -->

               <!-- Right navbar links -->
               <form action="<?= base_url("auth/logOut") ?>" method="post">
                    <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Log Out</button>
               </form>
          </nav>
          <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
               <!-- Brand Logo -->
               <a href="" class="brand-link text-center">

                    <span class="brand-text font-weight-light">Inventaris LAZ Harfa</span>
               </a>

               <!-- Sidebar -->
               <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                         <div class="image">
                              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                         </div>
                         <div class="info">
                              <a href="#" class="d-block"><?= $this->fungsi->user_login()->nama ?></a>
                         </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                              <li class="nav-item">
                                   <a href="<?php echo base_url('inventaris/dashboard'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? "active" : ''; ?>">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                             Dashboard
                                        </p>
                                   </a>
                              </li>
                              <li class="nav-item has-treeview <?php echo $this->uri->segment(2) == 'data' || $this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'jenis' || $this->uri->segment(2) == 'kondisi' ? "menu-open" : ''; ?>">
                                   <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'data' || $this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'jenis' || $this->uri->segment(2) == 'kondisi' ? "active" : ''; ?>">
                                        <i class="nav-icon fas fa-boxes"></i>

                                        <p>
                                             Inventaris
                                             <i class="right fas fa-angle-left"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url("inventaris/data") ?>" class="nav-link <?php echo $this->uri->segment(2) == 'data' ? "active" : ''; ?>"></i>
                                                  <p>Data</p>
                                             </a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="<?= base_url("inventaris/jenis") ?>" class="nav-link <?php echo $this->uri->segment(2) == 'jenis' ? "active" : ''; ?>"></i>
                                                  <p>Jenis</p>
                                             </a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="<?= base_url("inventaris/kondisi") ?>" class="nav-link <?php echo $this->uri->segment(2) == 'kondisi' ? "active" : ''; ?>"></i>
                                                  <p>Kondisi</p>
                                             </a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="<?= base_url("inventaris/kategori") ?>" class="nav-link <?php echo $this->uri->segment(2) == 'kategori' ? "active" : ''; ?>"></i>
                                                  <p>Kategori</p>
                                             </a>
                                        </li>

                                   </ul>
                              </li>
                         </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
               </div>
               <!-- /.sidebar -->
          </aside>