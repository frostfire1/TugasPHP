<?php
include "component/iniuserkah.php";

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'));

    $id_produk = $data->id_produk;
    $kuantitas = $data->kuantitas;

    $check_query = "SELECT * FROM keranjang WHERE id_produk = $id_produk AND id_pelanggan = $id_pelanggan";
    $check_result = $con->query($check_query);

    if ($check_result && $check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        $existing_qty = $row['qty'];
        $new_qty = $existing_qty + $kuantitas;
        $update_query = "UPDATE keranjang SET qty = $new_qty WHERE id_produk = $id_produk AND id_pelanggan = $id_pelanggan";
        if ($con->query($update_query)) {
            echo "Produk berhasil ditambahkan ke keranjang.";
        } else {
            echo "Error: " . $update_query . "<br>" . $con->error;
        }
    } else {    
        $insert_query = "INSERT INTO keranjang (list_keranjang, id_pelanggan) VALUES ('[{\"id_produk\": $id_produk, \"qty\": $kuantitas}]', $id_pelanggan)";
        if ($con->query($insert_query)) {
            echo "Produk berhasil ditambahkan ke keranjang.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $con->error;
        }
    }
}
?>
