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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <?php
    include "koneksi.php";
    $qry_get_petugas = mysqli_query($con, "select * from petugas where 
id_petugas = '" .$_GET['id_petugas']. "'");
    $dt_petugas = mysqli_fetch_array($qry_get_petugas);
    ?>
    <h3>Ubah petugas</h3>
    <form action="proses_ubah_petugas.php" method="post">
        <input type="hidden" name="id_petugas" value="<?= $dt_petugas['id_petugas'] ?>">
        Nama Petugas :
        <input type="text" name="nama" value="<?= $dt_petugas['nama_petugas'] ?>" class="form-control">
        Level :
        <select name="level" class="form-control">
            <?php
            if($dt_petugas['role'] == 'STAFF'){$selekSTAFF = "selected";}
            if($dt_petugas['role'] == 'FOUNDER'){$selekFOUNDER = "selected";}
            echo '<option value="STAFF" ' . $selekSTAFF . '>STAFF</option>';
            echo '<option value="FOUNDER" ' . $selekFOUNDER . '>Admin</option>';
            ?>
        </select>
        Username :
        <input type="text" name="username" value="<?= $dt_petugas['username'] ?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Ubah petugas" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>