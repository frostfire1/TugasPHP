<?php
include "koneksi.php";

if(isset($_GET['id_transaksi']) && isset($_GET['id_petugas'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $id_petugas = $_GET['id_petugas'];

    $sql_update_transaksi = "UPDATE transaksi SET id_petugas='$id_petugas' WHERE id_transaksi='$id_transaksi'";
    if ($con->query($sql_update_transaksi) === TRUE) {
        // Cek dan update stok
        $query_detail_transaksi = "SELECT * FROM detail_transaksi WHERE id_transaksi = '$id_transaksi'";
        $dt_detail_transaksi = mysqli_query($con, $query_detail_transaksi);

        while ($row_detail_transaksi = mysqli_fetch_assoc($dt_detail_transaksi)) {
            $cart_items = json_decode($row_detail_transaksi['list_produk'], true);

            foreach ($cart_items as $item) {
                $id_produk = $item['id_produk'];
                $jumlah = $item['kuantitas'];

                // Ambil stok produk saat ini
                $query_produk = "SELECT stok FROM produk WHERE id_produk = '$id_produk'";
                $result_produk = mysqli_query($con, $query_produk);

                if(mysqli_num_rows($result_produk) > 0) {
                    $row_produk = mysqli_fetch_assoc($result_produk);
                    $stok_produk = $row_produk['stok'];

                    $new_stok = $stok_produk - $jumlah;
                    if ($new_stok < 0) {
                        $new_stok = 0;
                    }

                    $sql_update_stok = "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'";
                    mysqli_query($con, $sql_update_stok);
                }
            }
        }

        echo "<script>alert('Transaksi berhasil di ACC');</script>";
    } else {
        echo "<script>alert('Gagal mengkonfirmasi transaksi');</script>";
    }
} else {
    echo "<script>alert('Parameter tidak lengkap');</script>";
}

echo "<script>window.location.href='dashboard.php';</script>";
?>
