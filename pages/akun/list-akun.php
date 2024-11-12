<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <i class="fa fa-group text-info"></i> List Seluruh Akun
            Anggota
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?req=akun&pages=list">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    List Akun
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="search-field">
                        <form
                            class="d-flex align-items-center h-100 mb-1"
                            action="#">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i
                                        class="input-group-text border-0 mdi mdi-magnify"></i>
                                </div>
                                <input
                                    type="text"
                                    class="form-control bg-transparent border-0"
                                    placeholder="Cari Akun" />
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- list anggota -->
                            <?php

                            // Query untuk mengambil data dari tabel anggota
                            $sql = "SELECT * FROM akun JOIN anggota ON akun.nim = anggota.nim JOIN pengurus ON anggota.id_anggota = pengurus.id_anggota JOIN jabatan ON pengurus.id_jabatan = jabatan.id_jabatan";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada data yang ditemukan
                            if ($result->num_rows > 0) {
                                // Menampilkan data
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['nama_jabatan'] ?></td>
                                        <td><a href="?req=akun&pages=edit&nim=<?= $row['nim'] ?>" class=""><i class="mdi mdi-account-edit text-primary"></i> Edit</a></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "Tidak ada data anggota.";
                            }

                            ?>
                            <!-- list anggota -->
                        </tbody>
                    </table>
                    <br />
                    <div
                        class="btn-group btn-group-sm"
                        role="group"
                        aria-label="Basic example">
                        <button type="button" class="btn btn-outline-secondary">
                            << Prev
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    Next >>
                                </button>
                    </div>
                </div>
            </div>
        </div>
    </div>