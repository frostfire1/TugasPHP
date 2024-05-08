<?php
include "./component/iniadminkah.php";

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// Cek apakah ada file yang diupload
if(isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] === UPLOAD_ERR_OK) {
    // Hapus foto lama dari server
    include "koneksi.php";
    $sql_select = "SELECT foto_produk FROM produk WHERE id_produk='$id_produk'";
    $result = $con->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto_lama = $row['foto_produk'];
        unlink($foto_lama);
    }
    $nama_file = "Foto_". $nama_produk ."_". $_FILES['foto_produk']['name'];
    $ukuran_file = $_FILES['foto_produk']['size'];
    $tmp_file = $_FILES['foto_produk']['tmp_name'];
    $direktori = 'tmp/';

    $upload_file = $direktori . $nama_file;
    move_uploaded_file($tmp_file, $upload_file);
} else {
    $upload_file = $_POST['foto_lama'];
}

if (empty($deskripsi)) {
    echo "<script>alert('Deskripsi tidak boleh kosong');location.href='ubah_produk.php?id=$id_produk';</script>";
} elseif (empty($harga)) {
    echo "<script>alert('Harga tidak boleh kosong');location.href='ubah_produk.php?id=$id_produk';</script>";
} else {
    include "koneksi.php";
    $sql = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', foto_produk='$upload_file', stok='$stok' WHERE id_produk='$id_produk'";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Produk Telah Diubah');location.href='tampil_produk.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
