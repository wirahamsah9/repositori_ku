<?php
// mysqli_connect untuk menghubungkan PHP dengan MySQL
$host = "localhost";
$user = "root";
$password = "";
$database = "dbutsweb";
//dbutsweb

// Koneksi ke MySQL
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else{}
