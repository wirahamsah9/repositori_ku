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

	<title>delete page UTS Pemrograman Web</title>
</head>

<body style="margin: 5%; margin-top:2%">
	<div class="alert alert-success text-center text-bg-danger p-3" role="alert">
		<h2>   HAPUS DATA BARANG TOKO ANEKA KAIN</h2>
	</div>
    <a href="index.php" class="btn btn-primary btn-sm mb-3 mt-3  ml-0"><i class="fas fa-user-plus mr-0"></i> daftar barang</a>

    <!-- Form pencarian -->
    <form action="" method="GET" class="ml-5 mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari nama kain" name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

	<table class="table table-bordered table table-striped" style="text-align: center;">
		<thead class="thead-light">
			<tr>

				<!-- <th scope="col">nama</th> -->
				<th>ID</th>
                <th>NAMA</th>
				<th>HARGA</th>
				<th>UKURAN</th>
				<th>STOK</th>
                <th class="text-bg-danger">HAPUS DATA</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?php echo $data['idbarang']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['ukuran']; ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <!-- dapatkan link url idbarang -->
                    <td> <a href="delete.php?idbarang=<?php echo $data['idbarang']; ?>" class="link-danger">hapus</a> </td>
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

</body>
</html>

<?php
// Menutup koneksi
mysqli_close($koneksi);
?>
