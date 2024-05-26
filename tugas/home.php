<?php
$homeactive = "active";
include "header.php";
?>

<div class="container content">
    <h2 class="my-4">Daftar Produk</h2>

    <div class="row">
        <?php
        include "koneksi.php";
        $qry_produk = mysqli_query($con,  "SELECT * FROM produk");
        while ($dt_produk = mysqli_fetch_array($qry_produk)) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="<?=$dt_produk['foto_produk'] ?>" alt="<?=$dt_produk['nama_produk'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dt_produk['nama_produk'] ?></h5>
                        <p class="card-text"><?= substr($dt_produk['deskripsi'], 0, 32) ?>....</p>
                        <h6>Rp. <?= number_format($dt_produk['harga'], 0, ',', '.') ?></h6>
                        <a href="produk.php?id_produk=<?= $dt_produk['id_produk'] ?>" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>