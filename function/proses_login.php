<?php

require 'config.php';
session_start();
if (!isset($_POST['login'])) {
    header('Location: ../index.php');
    exit;
} else {
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $password = hash('sha256', $password);

    $query = "SELECT * FROM akun WHERE nim = '$nim' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $_SESSION['login'] = true;
        $_SESSION['nim'] = $nim;
        header('Location: ../index.php');
        exit;
    } else {
        echo "<script>alert('NIM atau password salah!')</script>";
        echo "<script>window.location.href = '../pages/login.php'</script>";
    }
}
