<?php

session_start();
//pengecekan session login
if (!isset($_SESSION['login'])) {
  header('Location: pages/login.php');
  exit;
}

$nim = $_SESSION['nim'];


require 'function/config.php';
// mengambil query data anggota
$query = "SELECT * FROM anggota JOIN pengurus ON anggota.id_anggota = pengurus.id_anggota JOIN jabatan ON pengurus.id_jabatan = jabatan.id_jabatan WHERE anggota.nim = '$nim'";
// pengecekan apakah pengurus atau anggota biasa
if (mysqli_num_rows(mysqli_query($conn, $query)) < 1) {
  $query = "SELECT * FROM anggota WHERE nim = '$nim'";
}
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if (!isset($row['nama_jabatan'])) {
  $status = $row['status'];
} else {
  $status = $row['nama_jabatan'];
}

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
                <img src="assets/images/member/<?= $row['foto'] ?>" alt="image" />
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
              <a class="dropdown-item" href="?req=akun&pages=edit&nim=<?= $nim ?>">
                <i class="mdi mdi-account-box-edit-outline me-2 text-primary"></i> Edit Akun
              </a>
              <a class="dropdown-item" href="function/keluar.php">
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
                <img src="assets/images/member/<?= $row['foto'] ?>" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2" style="font-size: 0.7rem;"><?= $row['nama'] ?></span>
                <span class="text-secondary text-small"><?= $status ?></span>
              </div>
            </a>
          </li>
          <!-- end sidebar profil -->

          <!-- start sidebar beranda -->
          <li class="nav-item">
            <a class="nav-link" href="?req=beranda">
              <span class="menu-title">Beranda</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <!-- end sidebar beranda -->

          <!-- start sidebar akun-->
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#akun"
              aria-expanded="false"
              aria-controls="icons">
              <span class="menu-title">Akun</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="akun">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="?req=akun&pages=list">List Akun</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?req=akun&pages=daftar">Daftarkan Akun</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- end sidebar akun-->

          <!-- start sidebar anggota-->
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#anggota"
              aria-expanded="false"
              aria-controls="icons">
              <span class="menu-title">Anggota</span>
              <i class="mdi mdi-account-group menu-icon"></i>
            </a>
            <div class="collapse" id="anggota">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="?req=anggota&pages=list">List Anggota</a>
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

        <?php include 'pages/pages.php' ?>
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