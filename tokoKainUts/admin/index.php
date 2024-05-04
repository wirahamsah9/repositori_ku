<?php
require_once("koneksi.php");

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// paging
$banyak = 5;

// Menentukan halaman saat ini
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Menghitung posisi data awal untuk setiap halaman
$mulai = ($page - 1) * $banyak;

// Cek apakah form pencarian telah dikirim
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $query = "SELECT * FROM tbbarang WHERE nama LIKE '%$keyword%' LIMIT $mulai, $banyak";
} else {
    $query = "SELECT * FROM tbbarang LIMIT $mulai, $banyak";
}

$hasil = mysqli_query($koneksi, $query);

$jumlahdata = mysqli_num_rows(mysqli_query($koneksi, "SELECT idbarang FROM tbbarang"));
$halaman = ceil($jumlahdata / $banyak);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <title>UTS Pemrograman Web</title>
</head>

<body style="margin: 5%; margin-top:2%">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="alert alert-success text-center text-bg-primary p-3" role="alert">
                    <h2>DATA TOKO ANEKA KAIN</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col md-6">
                <!-- tombol insert -->
                <a href="insert.php" class="btn btn-secondary btn-sm mb-2 mt-3"><i class="fas fa-user-plus mr-2"></i>tambah barang</a>
                <a href="indexforupdate.php" class="btn btn-secondary btn-sm mb-2 mt-3  btn-warning"><i class="fas fa-user-plus mr-2"></i>update data</a>
                <a href="indexforhapus.php" class="btn btn-secondary btn-sm mb-2 mt-3  btn-danger"><i class="fas fa-user-plus mr-2"></i>hapus barang</a>
            </div>
            <div class="col md-6">
                <div class="float-end : right">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="btn btn-dark btn-sm mb-2 mt-3 fas fa-user-plus mr-2">
                            <?php echo "Jumlah item saat ini: " . $jumlahdata; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <!-- Form pencarian -->
                <form action="" method="GET" class="ml-5 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari nama kain" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table table-striped " style="text-align: center;">
                    <thead class="thead-light">
                        <tr>
                            <th>NO.</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>UKURAN (lebar)</th>
                            <th>STOK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = $mulai + 1;
                        while ($data = mysqli_fetch_array($hasil)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['harga'] . " ribu"; ?></td>
                                <td><?php echo $data['ukuran'] . " meter"; ?></td>
                                <td><?php echo $data['stok']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Tombol untuk navigasi halaman -->
                <div class="text-center">
                    <?php for ($i = 1; $i <= $halaman; $i++) { ?>
                        <a href="?page=<?php echo $i; ?>" class="btn btn-primary"><?php echo $i; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
            </div>

            <div class="col-md-4">
                <div class="float-end : right">
                    <a href="bantuan.php" class="btn btn-secondary btn-sm mb-1 mt-3  btn-success  "><i class="fas fa-user-plus mr-2"></i> bantuan</a>
                    <!-- <button type="button" class="btn btn-secondary btn-sm">Small button</button> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
// Menutup koneksi
mysqli_close($koneksi);
?>