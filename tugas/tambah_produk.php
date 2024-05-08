<?php
include "./component/iniadminkah.php";
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tambah Produk</title>
</head>
<body>
    <h3>Tambah Produk</h3>
    <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
        nama produk :
        <input type="text" name="nama_produk" value="" class="form-control">
        deskripsi : 
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        Harga : 
        <input type="number" name="harga" value="" class="form-control">
        Stok :
        <input type="number" name="stok" value="" class="form-control">
        foto produk :
        <br>
        <input type="file" accept="image/*" name="foto_produk" />
        <br>
        <br>
        <input type="submit" name="simpan" value="Tambah Petugas" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
