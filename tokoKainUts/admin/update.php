<?php
require_once("koneksi.php");
$id = $_GET['idbarang'];
$query = "SELECT * FROM tbbarang WHERE idbarang=" . $id;
$hasil = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Barang - UTS Pemrograman Web</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Update data barang</title>
</head>
<body style="margin: 5%; margin-top:2%;">
    <div class="alert alert-success text-center text-bg-warning p-3" role="alert">
        <h2>UPDATE DATA TOKO ANEKA KAIN</h2>
    </div>
    <h1 class="ml-5">Update Data Barang</h1>

    <form method="post" action="hasilupdate.php" class="ml-5">
        <?php while ($data = mysqli_fetch_array($hasil)) { ?>

            <label for="idbarang" class="col-sm-1 col-form-label"></label>
            <!-- Input tersembunyi untuk ID barang -->
            <input type="hidden" name="idbarang" value="<?php echo $data['idbarang']; ?>">

            <div class="form-group row">
                <label for="nama" class="col-sm-1 col-form-label">Nama Barang</label>
                <div class="col-sm-3">
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" placeholder="Nama kain" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-1 col-form-label">Harga</label>
                <div class="col-sm-3">
                    <input type="text" name="harga" class="form-control" value="<?php echo $data['harga'] ?>" placeholder="Harga ribu / meter" pattern="^\d+(\.\d{1,2})?$" title="Harga harus berupa angka dan dapat memiliki maksimal 2 angka di belakang koma" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="ukuran" class="col-sm-1 col-form-label">Ukuran (meter)</label>
                <div class="col-sm-3">
                    <input type="number" name="ukuran" class="form-control" value="<?php echo $data['ukuran'] ?>" placeholder="Ukuran lebar" min="1" max="20" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-1 col-form-label">Stok</label>
                <div class="col-sm-3">
                    <input type="number" name="stok" class="form-control" value="<?php echo $data['stok'] ?>" placeholder="Stok" min="0" required>
                </div>
            </div>
            <button type="submit" class="btn btn-warning btn-sm mb-3 mt-3 ml-0">Update</button>
            <a href="index.php" class="btn btn-primary btn-sm mb-3 mt-3 ml-0"><i class="fas fa-user-plus mr-0"></i> Daftar barang</a>
        <?php } ?>
    </form>
</body>
</html>
