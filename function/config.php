<?php

$username = "root";
$password = "";
$database = "db_mahapala";
$host = "localhost";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// qr code
$link = "https://intern.mahapala.org/";
