<?php
include "./component/iniadminkah.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Display Products</title>
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
            <h3 class="mb-0">Display Products</h3>
            <button class="btn btn-primary" onclick="window.location.href='tambah_produk.php'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Add Product
            </button>
        </div>
        <table class="table table-hover table-striped" style="overflow-x:auto;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_produk = mysqli_query($con, "SELECT * FROM produk");
                $no = 0;
                while ($data_produk = mysqli_fetch_array($qry_produk)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><img src="<?= $data_produk['foto_produk'] ?>" width="30%" height="30%"></td>
                        <td><?= $data_produk['nama_produk'] ?></td>
                        <td>Rp.<?= $data_produk['harga'] ?></td>
                        <td><?= $data_produk['deskripsi'] ?></td>
                        <td><?= $data_produk['stok'] ?></td>
                        <td><a href="edit_product.php?id_produk=<?= $data_produk['id_produk'] ?>" class="btn btn-success">Edit</a>
                            |
                            <a href="delete_product.php?id_produk=<?= $data_produk['id_produk'] ?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger">Delete</a>
                        </td>
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
</html>