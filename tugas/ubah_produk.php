<?php
include "./component/iniadminkah.php";

$id_produk = $_GET['id_produk'];
include "koneksi.php";
$sql_select = "SELECT * FROM produk WHERE id_produk='$id_produk'";
$result = $con->query($sql_select);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_produk = $row['nama_produk'];
    $deskripsi = $row['deskripsi'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $foto_produk = $row['foto_produk'];
} else {
    echo "Produk tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ubah Produk</title>
</head>
<body>
    <h3>Ubah Produk</h3>
    <form action="proses_ubah_produk.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk:</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $nama_produk; ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?php echo $deskripsi; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?php echo $harga; ?>" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" name="stok" id="stok" class="form-control" value="<?php echo $stok; ?>" required>
        </div>
        <div class="mb-3">
            <label for="foto_produk" class="form-label">Foto Produk:</label>
            <input type="file" accept="image/*" name="foto_produk" id="foto_produk" />
            <input type="hidden" name="foto_lama" value="<?php echo $foto_produk; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
