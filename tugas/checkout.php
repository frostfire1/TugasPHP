<?php
include "./component/iniuserkah.php";
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dapatkan data dari POST
    $list_produk = $_POST['list_produk'];
    $total = $_POST['total'];
    $id_keranjang = $_POST['id'];

    $id_pelanggan = $_SESSION['id'];

    $tgl_transaksi = date("Y-m-d H:i:s");

    $insert_transaksi_query = "INSERT INTO transaksi (id_pelanggan, tgl_transaksi) VALUES (?, ?)";
    $stmt_transaksi = $con->prepare($insert_transaksi_query);
    $stmt_transaksi->bind_param("is", $id_pelanggan, $tgl_transaksi);
    $stmt_transaksi->execute();

    if ($stmt_transaksi->affected_rows > 0) {
        $id_transaksi = $stmt_transaksi->insert_id;

        $insert_detail_query = "INSERT INTO detail_transaksi (id_transaksi, list_produk, total) VALUES (?, ?, ?)";
        $stmt_detail = $con->prepare($insert_detail_query);
        $stmt_detail->bind_param("iss", $id_transaksi, $list_produk, $total);
        $stmt_detail->execute();

        if ($stmt_detail->affected_rows > 0) {
            $delete_keranjang_query = "DELETE FROM keranjang WHERE id_keranjang = ?";
            $stmt_delete_keranjang = $con->prepare($delete_keranjang_query);
            $stmt_delete_keranjang->bind_param("i", $id_keranjang);
            $stmt_delete_keranjang->execute();
            header("Location: sukses_checkout.php");
            exit;
        } else {
            $delete_transaksi_query = "DELETE FROM transaksi WHERE id_transaksi = ?";
            $stmt_delete_transaksi = $con->prepare($delete_transaksi_query);
            $stmt_delete_transaksi->bind_param("i", $id_transaksi);
            $stmt_delete_transaksi->execute();
            echo "Gagal menyimpan detail transaksi.";
            exit;
        }
    } else {
        echo "Gagal menyimpan transaksi.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
