<?php
session_start();

function renderTransactionDetails($con, $id_transaksi) {
    $qry_transaksi = mysqli_query($con, "SELECT * FROM transaksi WHERE id_transaksi = '" . $id_transaksi . "'");
    $dt_transaksi = mysqli_fetch_array($qry_transaksi);
    $qry_detail_transaksi = "SELECT * FROM detail_transaksi WHERE id_transaksi = '$id_transaksi'";
    $dt_detail_transaksi = mysqli_query($con, $qry_detail_transaksi);

    if (mysqli_num_rows($dt_detail_transaksi) > 0) {
        $row_detail_transaksi = mysqli_fetch_assoc($dt_detail_transaksi);
        $cart_items = json_decode($row_detail_transaksi['list_produk'], true);

        if (count($cart_items) > 0) {
            $total = 0;
            $items_array = array();

            echo "<h2 class='mt-5 mb-4'>Transaksi Belanja</h2>";
            echo "<div class='row'>";

            foreach ($cart_items as $item) {
                $id_produk = $item['id_produk'];
                $jumlah = $item['kuantitas'];

                $query_produk = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
                $result_produk = mysqli_query($con, $query_produk);

                if (mysqli_num_rows($result_produk) > 0) {
                    $row_produk = mysqli_fetch_assoc($result_produk);
                    $nama_produk = $row_produk['nama_produk'];
                    $harga = $row_produk['harga'];
                    $gambar_produk = $row_produk['foto_produk'];
                    $subtotal = $harga * $jumlah;

                    $total += $subtotal;

                    $items_array[] = array(
                        'id_produk' => $id_produk,
                        'nama_produk' => $nama_produk,
                        'harga' => $harga,
                        'jumlah' => $jumlah,
                        'subtotal' => $subtotal
                    );

                    echo "<div class='col-md-4'>
                        <div class='card'>
                            <img src='$gambar_produk' class='card-img-top' alt='$nama_produk'>
                            <div class='card-body'>
                                <h5 class='card-title'>$nama_produk</h5>
                                <p class='card-text'>Harga: $harga</p>
                                <p class='card-text'>Jumlah: $jumlah</p>
                                <p class='card-text'>Subtotal: Rp. $subtotal</p>
                            </div>
                        </div>
                    </div>";
                }
            }

            echo "</div>";
            echo "<h3>Total  : Rp. $total</h3>";
            if (empty($dt_transaksi['id_petugas'])) {
                echo "<h3>STATUS : <span style='color:orange;'>Menunggu Konfirmasi</span></h3>";
            } else {
                $id_petugas = $dt_transaksi['id_petugas'];
                $qry_petugas = mysqli_query($con, "SELECT nama_petugas FROM petugas WHERE id_petugas = '$id_petugas'");
                $petugas_data = mysqli_fetch_assoc($qry_petugas);
                $nama_petugas = $petugas_data['nama_petugas'];
                echo "<h3>STATUS : <span style='color:green;'>Berhasil</span></h3>
                   <h3>Telah Dikonfirmasi oleh $nama_petugas</h3>";
            }
        } else {
            echo "<p>Transaksi belanja anda kosong.</p>";
        }
    } else {
        echo "<p>Transaksi belanja anda kosong.</p>";
    }
}

if(empty($_SESSION['role'])){
    header("Location: login.php");
} elseif($_SESSION['role'] == "user") {
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
</head>
<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="container">
            <?php
            include "koneksi.php";
            $id_transaksi = $_GET['id_transaksi'];
            renderTransactionDetails($con, $id_transaksi);
            ?>
        </div>
    </main>
</body>
</html>
<?php
} else {
    include "admin/sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="container">
            <?php
            include "koneksi.php";
            $id_transaksi = $_GET['id_transaksi'];
            renderTransactionDetails($con, $id_transaksi);
            ?>
        </div>
    </main>
</body>
</html>
<?php
}
include "footer.php";
?>