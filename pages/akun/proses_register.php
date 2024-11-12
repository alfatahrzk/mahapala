<?php

require '../../function/config.php';
error_reporting(E_ALL && ~E_NOTICE);
ini_set('display_errors', 1);
// cek apakah tombol register sudah di klik atau belum
if (isset($_POST['submit'])) {
    $namaLapang = $_POST['namaLapang'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    // memproses hash password
    $password = hash('sha256', $password);

    // mengecek apakah yang akan dibuatkan akun merupakan anggota
    $query = "SELECT * FROM anggota WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if (!$result->num_rows > 0) {
        echo "<script>alert('NIM ini tidak terdaftar sebagai anggota!')</script>";
        echo "<script>window.location.href = '../../?req=akun&pages=daftar'</script>";
    } else {
        $sql = "INSERT INTO akun (nim, password) VALUES ('$nim', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $nim = '';
            $password = '';
            echo "<script>alert('Akun berhasil dibuat!')</script>";
            echo "<script>window.location.href = '../../?req=akun&pages=daftar'</script>";
        } else {
            $nim = '';
            $password = '';
            echo "<script>alert('Akun gagal dibuat!')</script>";
            echo "<script>window.location.href = '../../?req=akun&pages=daftar'</script>";
        }
    }
}
