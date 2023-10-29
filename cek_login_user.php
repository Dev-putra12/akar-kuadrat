<?php
// mengaktifkan session
session_start();
// koneksi
include "koneksi.php";
// menambah data
$Nim = $_POST['nim'];

// menyeleksi data sesuai dengan username dan password yang sesuai

$query = "SELECT * FROM user where nim='$Nim'";
$data = mysqli_query($connect, $query);

// menghitung jumlah data yang ditemukan

$cek = mysqli_fetch_array($data);

if ($cek > 0) {
    $_SESSION['nim'] = $cek['nim'];
    header("location:index.php");
} else {
    header("location:login.php?pesan=gagal");
}
