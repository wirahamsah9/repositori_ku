<?php
require_once("koneksi.php");
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$ukuran = $_POST['ukuran'];
$stok = $_POST['stok'];
$query = "INSERT INTO tbbarang (nama,harga,ukuran,stok) VALUE ('$nama','$harga','$ukuran','$stok')";
$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    header('location:index.php');
} else {
    echo "input data tidak berhasil";
}
