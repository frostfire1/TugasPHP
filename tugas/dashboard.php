<?php
include "./component/iniadminkah.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('./admin/sidebar.php') ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h1>HALLO <?= $_SESSION['nama'] ?>👋</h1>
        <br>
        <h2>Daftar Transaksi yang Belum Diproses:</h2>
        <div class="row">
            <?php
            require_once "koneksi.php";
            $sql = "SELECT t.*, p.nama FROM transaksi t LEFT JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan WHERE t.id_petugas IS NULL";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ID Transaksi: <?= $row['id_transaksi'] ?></h5>
                                <p class="card-text">Nama Pelanggan: <?= $row['nama'] ?></p>
                                <p class="card-text">Tanggal Transaksi: <?= $row['tgl_transaksi'] ?></p>
                                <p class="card-text">Status: Menunggu Konfirmasi</p>
                                <a href="checkout_confirm.php?id_transaksi=<?= $row['id_transaksi'] ?>&id_petugas=<?= $_SESSION['id'] ?>" class="btn btn-primary">ACC</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Tidak ada transaksi yang belum diproses.</p>";
            }
            ?>
        </div>
    </main>
</body>

</html>
