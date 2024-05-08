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
    <title>Tampil Petugas</title>
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
        <h3>Tampil Petugas</h3>
        <table class="table table-hover table-striped" style="overflow-x:auto;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>LEVEL</th>
                    <th>USERNAME</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_petugas = mysqli_query($con, "SELECT * FROM petugas");
                $no = 0;
                while ($data_petugas = mysqli_fetch_array($qry_petugas)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_petugas['nama_petugas'] ?></td>
                        <td><?= $data_petugas['level'] ?></td>
                        <td><?= $data_petugas['username'] ?></td>
                        <td><a href="ubah_petugas.php?id_petugas=<?= $data_petugas['id_petugas'] ?>" class="btn btn-success">Ubah</a>
                            |
                            <a href="hapus_petugas.php?id_petugas=<?= $data_petugas['id_petugas'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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