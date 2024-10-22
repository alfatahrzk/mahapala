<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <i class="fa fa-vcard text-info"></i> Detail Anggota
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Anggota</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          List Anggota
        </li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <?php
          // mengambil parameter dari get
          if (isset($_GET['nim'])) {
            $nim = $_GET['nim'];
          } else {
            header("Location: ?pages=anggota/list-anggota");
          }

          // Query untuk mengambil data dari tabel anggota
          $sql = "SELECT * FROM anggota WHERE nim = '$nim'";
          $result = $conn->query($sql);

          // Memeriksa apakah ada data yang ditemukan
          if ($result->num_rows > 0) {
            // Menampilkan data
            $row = $result->fetch_assoc();

          ?>
            <div class="row">
              <div class="col-sm-4 text-center">
                <div class="avatar">
                  <img
                    src="assets/images/member/<?= $row['foto'] ?>.png"
                    alt="<?= htmlspecialchars($row['foto']) ?>"
                    class="img-fluid rounded mx-auto d-block"
                    style="width: 20rem" />
                </div>
              </div>
              <div class="col-sm">
                <div class="d-flex justify-content-start pt-4">
                  <div class="pe-5">
                    <h3 class="fs-2">
                      <?= $row['nama'] ?>
                      <span class="fs-5 fw-medium text-success">(<?= $row['nama_lapang'] ?>)</span>
                    </h3>
                    <!-- nama -->
                    <p class="mt-1 mb-4">
                      <?= $row['nim'] ?> (<span class="text-success fw-bold"><?= $row['arti_nim'] ?></span>)
                    </p>
                  </div>
                  <div class="deskripsi">
                    <p class="fs-6">
                      <?= $row['status'] ?>
                      <!-- status -->
                      <br />
                      <?= $row['no_telp'] ?>
                      <!-- no hp -->
                      <br />
                      <?= $row['alamat'] ?>
                      <!-- alamat -->
                    </p>
                  </div>
                </div>
                <div class="d-flex justify-content-start pt-5">
                  <!-- kembali -->
                  <div class="p-1">
                    <a
                      href="?pages=anggota/list-anggota"
                      class="btn btn-sm btn-outline-primary">Kembali</a>
                  </div>
                  <!-- edit -->
                  <div class="p-1">
                    <a
                      href="?pages=anggota/edit-anggota&nim=<?= $row['nim'] ?>"
                      class="btn btn-sm btn-outline-warning">Edit</a>
                  </div>
                  <!-- hapus -->
                  <div class="p-1">
                    <a
                      href="?pages=anggota/hapus-anggota&nim=<?= $row['nim'] ?>"
                      class="btn btn-sm btn-outline-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>

          <?php

          } else {
            echo "alert('Data tidak ditemukan')";
            header("Location: ?pages=anggota/list-anggota");
          }


          ?>
        </div>
      </div>
    </div>
  </div>