<?php
include "header.php";
include "koneksi.php";

$id_produk = $_GET['id_produk'] ?? null;

if (!$id_produk) {
    echo "Product not found!";
    exit;
}

$qry_detail_produk = mysqli_query($con, "SELECT * FROM produk WHERE id_produk = '" . $id_produk . "'");
$dt_produk = mysqli_fetch_array($qry_detail_produk);
?>

<h2 class="my-4 text-center ">Beli Produk</h2>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <form action="masukkankeranjang.php?id_produk=<?= $dt_produk['id_produk'] ?>" method="post">
            <div class="card mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= $dt_produk['foto_produk'] ?>" class="card-img-top" alt="<?= $dt_produk['nama_produk'] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $dt_produk['nama_produk'] ?></h5>
                            <p class="card-text"><?= $dt_produk['deskripsi'] ?></p>
                            <p class="card-text">STOK: <?= $dt_produk['stok'] ?></p>
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-4 col-form-label">Jumlah Beli</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="quantity" name="kuantitas" value="1" min="1" max="<?= $dt_produk['stok'] ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Masukkan Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>