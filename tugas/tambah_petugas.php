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
    <title>Tambah Petugas</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Tambah Petugas</h3>
                        <form action="proses_tambah_petugas.php" method="post">
                            <div class="mb-3">
                                <label for="nama_petugas" class="form-label">Nama Petugas:</label>
                                <input type="text" name="nama_petugas" id="nama_petugas" value="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" name="username" id="username" value="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" id="password" value="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Level:</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="STAFF" selected>STAFF</option>
                                    <option value="FOUNDER">Admin</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="simpan" value="Tambah Petugas" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>