<?php

//pengecekan session login
if (!isset($_SESSION['login'])) {
    header('Location: pages/login.php');
    exit;
}

// mengecek apakah ada request get
if (isset($_GET['req'])) {
    // menangkap get
    $pages = $_GET['req'];
    if (isset($_GET['pages'])) {
        $subpages = $_GET['pages'];
        switch ($pages) {
            case 'akun':
                switch ($subpages) {
                    case 'list':
                        include 'akun/list-akun.php';
                        break;
                    case 'edit':
                        include 'akun/edit-akun.php';
                        break;
                    case 'daftar':
                        include 'akun/register.php';
                        break;

                    default:
                        include 'beranda.php';
                        break;
                }
                break;

            case 'anggota':
                switch ($subpages) {
                    case 'list':
                        include 'anggota/list-anggota.php';
                        break;

                    case 'daftar':
                        include 'anggota/tambah-anggota.php';
                        break;

                    case 'detail':
                        include 'anggota/detail-anggota.php';
                        break;

                    default:
                        include 'beranda.php';
                        break;
                }
        }
    } else {
        include 'beranda.php';
    }
} else {
    include 'beranda.php';
}
