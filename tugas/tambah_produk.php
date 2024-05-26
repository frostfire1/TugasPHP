<?php
include "./component/iniadminkah.php";
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Add Product</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Add Product</h3>
                        <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Product Name:</label>
                                <input type="text" name="nama_produk" id="nama_produk" value="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Description:</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Price:</label>
                                <input type="number" name="harga" id="harga" value="" class="form-control" min="0" step="0.01">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stock:</label>
                                <input type="number" name="stok" id="stok" value="" class="form-control" min="0">
                            </div>
                            <div class="mb-3">
                                <label for="foto_produk" class="form-label">Product Photo:</label>
                                <input type="file" accept="image/*" name="foto_produk" id="foto_produk" class="form-control">
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="simpan" value="Add Product" class="btn btn-primary">
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