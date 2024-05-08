<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST["id_produk"];
    $jumlah = $_POST["jumlah"];

    $query_update = "UPDATE keranjang SET list_keranjang = JSON_SET(list_keranjang, '$.[$id_produk].kuantitas', $jumlah) WHERE id_keranjang = ?";
    $stmt = $con->prepare($query_update);
    $stmt->bind_param("i", $id_keranjang);
    $id_keranjang = $_SESSION['id_keranjang']; 
    $stmt->execute();


    if ($stmt->affected_rows > 0) {
        echo "Jumlah produk berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui jumlah produk.";
    }

    $stmt->close();
    $con->close();
} else {
    echo "Akses tidak sah.";
}
?>
