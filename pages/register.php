<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link
    rel="stylesheet"
    href="../assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link
    rel="stylesheet"
    href="../assets/vendors/ti-icons/css/themify-icons.css" />
  <link
    rel="stylesheet"
    href="../assets/vendors/css/vendor.bundle.base.css" />
  <link
    rel="stylesheet"
    href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css" />
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="../assets/images/logo.svg" />
              </div>
              <h4>Daftarkan akun anggota!</h4>
              <h6 class="font-weight-light">
                Perhatikan huruf besar dan kecil pada pada tiap form
              </h6>
              <form class="pt-3" method="post" action="proses_register.php">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control form-control-lg"
                    id="exampleInputUsername1"
                    placeholder="Nama Lapang" />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control form-control-lg"
                    id="exampleInputEmail1"
                    placeholder="NIM" />
                </div>
                <div class="form-group">
                  <select
                    class="form-select form-select-lg"
                    id="exampleFormControlSelect2">
                    <option>Status Anggota</option>
                    <option>Anggota Muda</option>
                    <option>Anggota Penuh</option>
                    <option>Anggota Luar Biasa</option>
                    <option>Anggota Kehormatan</option>
                    <option>Anggota Simpatisan</option>
                  </select>
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    class="form-control form-control-lg"
                    id="exampleInputPassword1"
                    placeholder="Password" />
                </div>
                <div class="mt-3 d-grid gap-2">
                  <a
                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                    href="../../index.html">Daftarkan</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/misc.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <script src="../assets/js/jquery.cookie.js"></script>
  <!-- endinject -->
</body>

</html>