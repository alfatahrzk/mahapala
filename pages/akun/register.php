<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <i class="fa fa-group text-info"></i> Register Akun
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?req=akun&pages=list"">Akun</a></li>
        <li class=" breadcrumb-item active" aria-current="page">
            Register Akun
        </li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Registrasi Akun Anggota</h4>
          <p class="card-description"> Mohon perhatikan besar kecilnya karakter </p>
          <form class="forms-sample" action="pages\akun\proses_register.php" method="POST">
            <div class="form-group">
              <label for="exampleInputName1">NIM</label>
              <input type="text" class="form-control" id="exampleInputName1" name="nim" placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Buat</button>
            <button type="reset" class="btn btn-light">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>