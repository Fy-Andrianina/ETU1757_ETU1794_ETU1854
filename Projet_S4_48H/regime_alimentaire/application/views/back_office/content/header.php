<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Regime Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        WELCOME ADMIN
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="dropdown-item" href="<?php echo base_url() ?>admin/Admin_ctrl/deconnect">
                <i class="ti-power-off text-primary"></i>
                Deconnexion
              </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <a class="navbar-brand brand-logo-mini" ><img style="width:100%; height:100%" src="<?php echo base_url() ?>assets/image/logo.PNG" alt="logo"/></a>
        <ul class="nav">
          <li class="nav-item text-muted">
            <h4 style="margin-bottom: 20px" class="font-weight-bold text-muted">SERVICE</h4>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>admin/Admin_ctrl/">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account-multiple" style="margin-right: 5%"></i>
              <span class="menu-title"> Nos regimes </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>admin/Regime_ctrl/liste_regime"> Listes </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>admin/Regime_ctrl/regime_ajout"> Ajouter regime </a></li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-folder-image" style="margin-right: 5%"></i>
              <span class="menu-title"> Nos sports </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>admin/Sport_ctrl/liste_sport"> Listes </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>admin/Sport_ctrl/sport_ajout"> Ajouter sport </a></li>
              </ul>
            </div>
          </li>


          <!-- <li class="nav-item text-muted" style="margin-top: 20px;">
            <h4 class="font-weight-bold text-muted">CODE</h4>
          </li> -->
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic36" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-chart-gantt" style="margin-right: 5%"></i>
              <span class="menu-title"> Code </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic36">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>admin/Code_ctrl/"> Demande  <span class="badge" style="background-color:red"><?php echo count($demandes) ?></span></a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>