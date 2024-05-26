<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Transaksi</title>
</head>
<?php
session_start();
if(empty($_SESSION['role'])){
header("Location: login.php");
}elseif($_SESSION['role'] == "user") {
    $transaksi = "active";
    include "header.php";
?>
<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">List Transaksi</h3>
        </div>
        <table class="table table-hover table-striped" style="overflow-x:auto;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $id_pelanggan = $_SESSION['id'];
                $qry_transaksi = mysqli_query($con, "SELECT dt.id_detail_transaksi, t.id_petugas, t.tgl_transaksi, dt.total, t.id_transaksi, dt.list_produk
                                                      FROM transaksi t
                                                      LEFT JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
                                                      WHERE t.id_pelanggan = '$id_pelanggan'");
                $no = 0;
                while ($data_transaksi = mysqli_fetch_array($qry_transaksi)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_transaksi['tgl_transaksi'] ?></td>
                        <?php
                        if (empty($data_transaksi['id_petugas'])) {
                            echo "<td style='color:orange;'>Menunggu Konfirmasi</td>";
                        } else {
                            echo "<td style='color:green;'>Berhasil</td>";
                        }
                        ?>
                        <td>Rp. <?= $data_transaksi['total'] ?></td>
                        <td><a href="detail_transaksi.php?id_transaksi=<?= $data_transaksi['id_transaksi']; ?>">details</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
<?php 
}else{
    include "./admin/sidebar.php"
?>
<body>
    <?php include('./admin/sidebar.php') ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">List Transaksi</h3>
        </div>
        <table class="table table-hover table-striped" style="overflow-x:auto;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_transaksi = mysqli_query($con, "SELECT dt.id_detail_transaksi,t.id_petugas,t.tgl_transaksi, dt.total, t.id_transaksi,dt.list_produk
                                                      FROM transaksi t
                                                      LEFT JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi");
                $no = 0;
                while ($data_transaksi = mysqli_fetch_array($qry_transaksi)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_transaksi['tgl_transaksi'] ?></td>
                        <?php
                        if (empty($data_transaksi['id_petugas'])) {
                            echo "<td style='color:orange;'>Menunggu Konfirmasi</td>";
                        } else {
                            echo "<td style='color:green;'>Berhasil</td>";
                        }
                        ?>
                        <td>Rp. <?= $data_transaksi['total'] ?></td>
                        <td><a href="detail_transaksi.php?id_transaksi=<?= $data_transaksi['id_transaksi'];?>">details</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

<?php
}
include "footer.php";
?>
</html>