<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span>
      Beranda
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview
          <i
            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">

    <!-- start card jumlah anggota -->
    <div class="col-sm-4 grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img
            src="assets/images/dashboard/circle.svg"
            class="card-img-absolute"
            alt="circle-image" />
          <h4 class="font-weight-normal mb-3">
            Jumlah Anggota
            <i class="fa fa-group fa-24px float-end"></i>
          </h4>
          <h2 class="mb-5">620</h2>
          <h6 class="card-text">Anggota Aktif 120</h6>
        </div>
      </div>
    </div>
    <!-- end card jumlah anggota -->

    <!-- start grafik jumlah anggota -->
    <div class="col-sm grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grafik Anggota</h4>
          <div class="doughnutjs-wrapper d-flex justify-content-center">
            <canvas id="traffic-chart"></canvas>
          </div>
          <div
            id="traffic-chart-legend"
            class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
        </div>
      </div>
    </div>
    <!-- end grafik jumlah anggota -->

  </div>
  <div class="row">
    <div class="col-md grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Progress Program Kerja</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Nama Proker</th>
                  <th>Sie</th>
                  <th>Deadline</th>
                  <th>Progress</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Pengenalan Divisi</td>
                  <td>Pendidikan Kurikulum</td>
                  <td>15 November 2024</td>
                  <td>
                    <div class="progress">
                      <div
                        class="progress-bar bg-gradient-success"
                        role="progressbar"
                        style="width: 50%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>