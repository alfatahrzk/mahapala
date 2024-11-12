<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <i class="fa fa-group text-info"></i> List Inventaris Mahapala
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    List Inventaris
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
                                    placeholder="Cari Inventaris" />
                            </div>
                        </form>
                    </div>
                    <p class="card-description">
                        Inventaris bertambah? klik
                        <a href="?pages=inventaris/tambah-inventaris">Tambah Inventaris</a>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- list anggota -->
                            <?php

                            // Query untuk mengambil data dari tabel anggota
                            $sql = "SELECT * FROM inventaris";
                            $result = $conn->query($sql);

                            // Memeriksa apakah ada data yang ditemukan
                            if ($result->num_rows > 0) {
                                // Menampilkan data
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td class="py-1">';
                                    echo $row['kode_inventaris'];
                                    echo '</td>';
                                    echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                                    echo '<td>';
                                    echo '<a href="?pages=anggota/detail-anggota&nim=' . $row['kode_inventaris'] . '" class=""><i class="fa fa-external-link"></i></a>'; // Menampilkan tombol aksi
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "Tidak ada data inventaris.";
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