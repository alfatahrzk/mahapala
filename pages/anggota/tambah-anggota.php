<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Tambah Anggota</title>
</head>

<body>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Tambah Anggota</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?req=anggota&pages=list">Anggota</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Anggota Baru</h4>
            <form class="forms-sample" method="POST" action="pages/anggota/proses_register.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="lapang">Nama Lapang</label>
                <input type="text" class="form-control" id="lapang" name="lapang" placeholder="Nama Lapang">
              </div>
              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
              </div>
              <div class="form-group">
                <label for="arti">Arti 2 Huruf Akhir pada NIM</label>
                <input type="text" class="form-control" id="arti" name="arti" placeholder="Arti NIM">
              </div>
              <div class="form-group">
                <label for="gp">Angkatan GP</label>
                <input type="text" class="form-control" id="gp" name="gp" placeholder="Angkatan Gladian Petualang">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select" id="status" name="status">
                  <option>Anggota Muda</option>
                  <option>Anggota Penuh</option>
                  <option>Anggota Luar Biasa</option>
                  <option>Anggota Kehormatan</option>
                  <option>Anggota Simpatisan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
              </div>
              <div class="form-group">
                <label for="telp">No. Telp</label>
                <input type="number" class="form-control" id="telp" name="telp" placeholder="Nomor Telepon Aktif">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi Tambahan</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Gunakan tanda hubung ' - ' untuk memisahkan antara kegiatan"></textarea>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Ukuran Max 1mb, Ekstensi yang diterima hanya: jpg, jpeg, png">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-info py-3" type="button">Unggah</button>
                  </span>
                </div>
              </div>
              <button type="submit" class="btn btn-gradient-info me-2">Submit</button>
              <button type="reset" class="btn btn-light">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
<script>
  document.querySelector('.file-upload-browse').addEventListener('click', function() {
    document.querySelector('input[type="file"]').click();
  });
  document.querySelector('input[type="file"]').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : '';
    document.querySelector('.file-upload-info').value = fileName;
  });
</script>

</html>