<?php
$homeactive = "active";
include "header.php";
?>

<div class="container content">
    <h2>Daftar produk</h2>

    <div class="row">
        <?php
        include "koneksi.php";
        $qry_produk = mysqli_query($con,  "SELECT * FROM produk");
        while ($dt_produk = mysqli_fetch_array($qry_produk)) {
            ?>
            <div class="col-md-3">
                <div class="card" style="overflow: hidden;">
                    <div style="width: 100%; height: 200px; overflow: hidden;">
                        <img src="<?=$dt_produk['foto_produk'] ?>" class="card-img-top" style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $dt_produk['nama_produk'] ?></h5>
                        <p class="card-text"><?= substr($dt_produk['deskripsi'], 0, 32) ?>....</p>
                        <p class="card-text">Rp. <?= $dt_produk['harga'] ?></p>
                        <a href="produk.php?id_produk=<?= $dt_produk['id_produk'] ?>" class="btn btn-primary">beli</a>
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
