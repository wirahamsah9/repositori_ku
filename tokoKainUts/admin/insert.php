<!DOCTYPE html>
<html>

<head>
    <title>Insert Barang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=devicewidth, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Tambah Barang UTS Pemrograman Web</title>
</head>

<body style="margin: 5%; margin-top:2%;">
    <div class="alert alert-success text-center text-bg-success p-3" role="alert">
        <h2>DATA TOKO ANEKA KAIN</h2>
    </div>
    <h1 class="ml-5">Tambah Barang</h1>
    <form method="post" action="hasilinsert.php">
        <div class="form-group row">
            <label for="nama" class="col-sm-1 col-form-label">Nama Barang</label>
            <div class="col-sm-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama kain" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-1 col-form-label">Harga</label>
            <div class="col-sm-3">
                <input type="text" name="harga" class="form-control" placeholder="Harga ribu / meter" pattern="[0-9]+(\.[0-9]+)?" title="Harga harus dalam format angka" required>
                <!-- Patern adalah sebuah atribut dalam tag HTML yang digunakan untuk menentukan pola atau format yang harus diikuti oleh nilai yang dimasukkan ke dalam suatu input. Ini biasanya digunakan dalam elemen input dengan tipe data tertentu, seperti text, email, atau number, untuk memastikan bahwa pengguna memasukkan data yang sesuai dengan format yang diharapkan. -->
            </div>
        </div>
        <div class="form-group row">
            <label for="ukuran" class="col-sm-1 col-form-label">Ukuran (meter)</label>
            <div class="col-sm-3">
                <input type="number" name="ukuran" class="form-control" placeholder="Ukuran lebar" min="1" max="20" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="stok" class="col-sm-1 col-form-label">Stok</label>
            <div class="col-sm-3">
                <input type="number" name="stok" class="form-control" placeholder="Stok atau jumlah" min="0" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm mb-3 mt-3 ml-0 mr-0">Kirim</button>
        <a href="index.php" class="btn btn-primary btn-sm mb-3 mt-3 ml-0"><i class="fas fa-user-plus mr-0"></i> Daftar barang</a>
    </form>
</body>

</html>
