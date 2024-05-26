<?php
session_start();
if ($_SESSION['role'] !== 'FOUNDER') {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tampil Pelanggan</title>
    <style>
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <?php include('./admin/sidebar.php') ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Tampil Pelanggan</h3>
            <button class="btn btn-primary" onclick="window.location.href='tambah_pelanggan.php'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Add Pelanggan
            </button>
        </div>
        <table class="table table-hover table-striped" style="overflow-x:auto;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>TELP</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_pelanggan = mysqli_query($con, "SELECT * FROM pelanggan");
                $no = 0;
                while ($data_pelanggan = mysqli_fetch_array($qry_pelanggan)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_pelanggan['nama'] ?></td>
                        <td><?= $data_pelanggan['alamat'] ?></td>
                        <td><?= $data_pelanggan['telp'] ?></td>
                        <td><a href="ubah_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan'] ?>" class="btn btn-success">Ubah</a>
                            |
                            <a href="hapus_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </main>
</body>

</html>