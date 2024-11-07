<?php

session_start();
//pengecekan session login
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}

$nim = $_SESSION['nim'];


require 'function/config.php';
// mengambil query data anggota
$query = "SELECT * FROM jabatan JOIN pengurus ON jabatan.id_jabatan = pengurus.id_jabatan JOIN anggota ON pengurus.id_anggota = anggota.id_anggota WHERE anggota.nim = '$nim'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Mahapala Hub</title>
  <!-- plugins:css -->
  <link
    rel="stylesheet"
    href="assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/ti-icons/css/themify-icons.css" />
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link
    rel="stylesheet"
    href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- Start Navbar -->
    <nav
      class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <!-- Start Logo Navbar-->
      <div
        class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <!-- End Logo Navbar-->

      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button
          class="navbar-toggler navbar-toggler align-self-center"
          type="button"
          data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">

          <!-- start nav profil -->
          <li class="nav-item nav-profile dropdown">
            <a
              class="nav-link dropdown-toggle"
              id="profileDropdown"
              href="#"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="nav-profile-img">
                <img src="assets/images/member/<?= $row['foto'] ?>.png" alt="image" />
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?= $row['nama'] ?></p>
              </div>
            </a>
            <div
              class="dropdown-menu navbar-dropdown"
              aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="function/proses_keluar.php">
                <i class="mdi mdi-logout me-2 text-danger"></i> Keluar
              </a>
            </div>
          </li>
          <!-- end nav profil -->

          <!-- start fitur fullscreen -->
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <!-- end fitur fullscreen -->

          <!-- start fitur notifikasi -->
          <li class="nav-item dropdown">
            <a
              class="nav-link count-indicator dropdown-toggle"
              id="notificationDropdown"
              href="#"
              data-bs-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div
              class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div
                  class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">
                    Event today
                  </h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
            </div>
          </li>
          <!-- end fitur notifikasi -->

          <!-- start fitur logout -->
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="function/keluar.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <!-- end fitur logout -->

        </ul>
        <button
          class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
          type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid page-body-wrapper">
      <!-- start sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <!-- start sidebar profil -->
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/member/<?= $row['foto'] ?>.png" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?= $row['nama'] ?></span>
                <span class="text-secondary text-small"><?= $row['nama_jabatan'] ?></span>
              </div>
            </a>
          </li>
          <!-- end sidebar profil -->

          <!-- start sidebar beranda -->
          <li class="nav-item">
            <a class="nav-link" href="?pages=beranda">
              <span class="menu-title">Beranda</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <!-- end sidebar beranda -->

          <!-- start sidebar anggota-->
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#anggota"
              aria-expanded="false"
              aria-controls="icons">
              <span class="menu-title">Anggota</span>
              <i class="fa fa-group menu-icon"></i>
            </a>
            <div class="collapse" id="anggota">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="?pages=anggota/list-anggota">List Anggota</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- end sidebar anggota-->

          <!-- start sidebar inventaris -->
          <!-- end sidebar inventaris -->

          <!-- start sidebar logistik -->
          <!-- end sidebar logistik -->

          <!-- start sidebar keuangan -->
          <!-- end sidebar keuangan -->

          <!-- start sidebar program kerja -->
          <!-- end sidebar program kerja -->

          <!-- start sidebar reformasi -->
          <!-- end sidebar reformasi -->
        </ul>
      </nav>
      <!-- end sidebar -->

      <!-- main panel start -->
      <div class="main-panel">
        <?php
        require 'function/config.php';
        if (!isset($_GET['pages'])) {
          $pages = 'pages/beranda';
        } else {
          $pages = 'pages/' . $_GET['pages'];
        }

        include $pages . '.php';



        ?>
        <!-- main-panel ends -->

        <!-- start footer -->
        <footer class="footer">
          <div
            class="d-sm-flex justify-content-center justify-content-sm-between">
            <span
              class="text-muted text-center text-sm-left d-block d-sm-inline-block">Hak Cipta © 2024
              <a href="?pages/anggota/detail-anggota" target="_blank">M-555-GJ</a> & Humas Mahapala.</span>
            <span
              class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made with
              <i class="mdi mdi-heart text-info"></i></span>
          </div>
        </footer>
        <!-- end footer -->

      </div>
    </div>
  </div>

  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>