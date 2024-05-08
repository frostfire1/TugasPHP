<?php
include "./component/iniadminkah.php";

$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
if(isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] === UPLOAD_ERR_OK) {

    $nama_file = "Foto_". $nama_produk ."_". $_FILES['foto_produk']['name'];
    $ukuran_file = $_FILES['foto_produk']['size'];
    $tmp_file = $_FILES['foto_produk']['tmp_name'];

    $direktori = 'tmp/';

    $upload_file = $direktori . $nama_file;
    move_uploaded_file($tmp_file, $upload_file);
} else {
    die("Upload file gagal atau file tidak dipilih.");
}

if (empty($deskripsi)) {
    echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
}if (empty($harga)) {
    echo "<script>alert('harga tidak boleh kosong');</script>";
}else {
    include "koneksi.php";
    $sql = "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk, stok) VALUES ('$nama_produk', '$deskripsi', '$harga', '$upload_file', '$stok')";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Produk Telah Ditambahkan');location.href='tampil_produk.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        
    }
}
?>
