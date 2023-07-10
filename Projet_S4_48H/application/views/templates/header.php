
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FOI</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/feather/feather.css') ; ?> ">
  <link href="<?php echo site_url('assets/css/myCss.css'); ?>" type="text/css" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/ti-icons/css/themify-icons.css') ; ?> ">
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/css/vendor.bundle.base.css') ; ?> ">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ; ?> ">
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/ti-icons/css/themify-icons.css') ; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/js/select.dataTables.min.css') ; ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo site_url('assets/css/vertical-layout-light/style.css') ; ?>">
  
    <link href="<?php echo site_url('assets/css/font-face.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/font-awesome-5/css/fontawesome-all.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/css/test.css'); ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo site_url('assets/css/style.css'); ?>" type="text/css" rel="stylesheet" />
    <!-- Bootstrap CSS-->
    <link href="<?php echo site_url('assets/vendor/bootstrap-4.1/bootstrap.min.css'); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo site_url('assets/vendor/animsition/animsition.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/vendor/wow/animate.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/vendor/css-hamburgers/hamburgers.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/vendor/slick/slick.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/vendor/select2/select2.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css'); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo site_url('assets/css/theme.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet" media="all">
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <img src="<?php echo site_url('assets/logo/5.svg'); ?>" class="logo" alt="logo" style="width: 3.5pc; height: auto;  border-radius: 20%;">
        <a class="navbar-brand brand-logo-mini" href="#"><img src="<?php echo site_url('assets/logo/5.svg'); ?>" alt="logo"/></a>
      </div>  
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('info_con/leave'); ?>" aria-expanded="false" aria-controls="charts">
              <i class="icon-home menu-icon"></i>
              <span class="menu-title">Deconnexion</span>
            </a>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
      </div>
    </nav>
        <!-- partial:partials/_sidebar.html -->
            <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('info_con/enter'); ?>" aria-expanded="false" aria-controls="icons">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Accueil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('codeJournal_con'); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Journaux</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('main/test'); ?>" aria-expanded="false" aria-controls="ui-basic"  >
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Plan Comptable general</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('main/tiers'); ?>" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Comptes auxilliaires</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('devise_con'); ?>" aria-expanded="false" aria-controls="charts">
              <i class="icon-heart menu-icon"></i>
              <span class="menu-title">Devise</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('grandLivre_con'); ?>" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Grand Livre</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('cJ_con'); ?>" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Code Journal</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('main/balance'); ?>" aria-expanded="false" aria-controls="icons">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Balance</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('bilan_con'); ?>" aria-expanded="false" aria-controls="icons">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Bilan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?php echo site_url('main/importCsv'); ?>" aria-expanded="false" aria-controls="icons">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Import</span>
            </a>
          </li>
        </ul>
      </nav>