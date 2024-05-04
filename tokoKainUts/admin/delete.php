<?php
require_once("koneksi.php");
$idbarang = $_GET['idbarang'];
$query = "delete from tbbarang where idbarang=$idbarang";
$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    header('location:index.php');
} else {
    echo "Hapus Data Gagal";
}
?>
