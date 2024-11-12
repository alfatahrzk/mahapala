<?php
// Database connection settings
require '../../function/config.php';

// Cek apakah data sudah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $nama_lapang = $_POST['lapang'];
    $arti_nim = $_POST['arti'];
    $angkatan_gp = $_POST['gp'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['telp'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload file foto
    $foto = "";
    if (isset($_FILES['img']) && $_FILES['img']['error'][0] == UPLOAD_ERR_OK) {
        $file_name = $_FILES['img']['name'][0];
        $file_tmp = $_FILES['img']['tmp_name'][0];
        $file_size = $_FILES['img']['size'][0];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = array("jpg", "jpeg", "png");

        // Batas ukuran file dalam byte (1MB = 1 * 1024 * 1024 byte)
        $max_size = 1 * 1024 * 1024;

        // Validasi ekstensi file
        if (!in_array($file_ext, $allowed_ext)) {
            die("Ekstensi file tidak diperbolehkan. Hanya jpg, jpeg, dan png.");
        }

        // Validasi ukuran file
        if ($file_size > $max_size) {
            die("Ukuran file terlalu besar. Maksimal 1MB.");
        }

        // Jika valid, simpan file dengan nama sesuai NIM
        $foto = $nim . "." . $file_ext;
        $upload_path = "../../assets/images/member/" . $foto;

        // Pindahkan file yang diunggah ke direktori tujuan
        if (!move_uploaded_file($file_tmp, $upload_path)) {
            die("Gagal mengunggah foto.");
        }
    }


    // SQL untuk memasukkan data ke tabel anggota
    $sql = "INSERT INTO anggota (nama, nim, nama_lapang, arti_nim, angkatan_gp, status, alamat, no_telp, deskripsi, foto)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Siapkan pernyataan SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $nama, $nim, $nama_lapang, $arti_nim, $angkatan_gp, $status, $alamat, $no_telp, $deskripsi, $foto);

    // Eksekusi pernyataan SQL
    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan, anda akan dialihkan ke halaman list anggota.";
        header("refresh:1;url=?pages=anggota/list-anggota");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
} else {
    echo "Metode pengiriman data tidak valid.";
}
