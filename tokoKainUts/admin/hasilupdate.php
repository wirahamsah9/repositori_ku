 <?php
    require_once("koneksi.php");
    $idbarang = $_POST['idbarang'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $stok = $_POST['stok'];
    $query = "UPDATE tbbarang SET nama='$nama',harga='$harga',ukuran='$ukuran',stok='$stok' WHERE idbarang=$idbarang";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        header('location:index.php');
    } else {
        echo "Update data gagal";
    }
?>