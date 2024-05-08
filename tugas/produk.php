<?php
include "header.php";
include "koneksi.php";
$qry_detail_produk = mysqli_query($con, "SELECT * FROM produk WHERE id_produk = '" . $_GET['id_produk'] . "'");
$dt_produk = mysqli_fetch_array($qry_detail_produk);
?>
<h2>Pinjam produk</h2>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-8">
        <form action="masukkankeranjang.php?id_produk=<?= $dt_produk['id_produk'] ?>" method="post">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= $dt_produk['foto_produk'] ?>" class="card-img-top" alt="Gambar Produk">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama produk: <?= $dt_produk['nama_produk'] ?></h5>
                            <p class="card-text">Deskripsi: <?= $dt_produk['deskripsi'] ?></p>
                            <p class="card-text">STOK: <?= $dt_produk['stok'] ?></p>
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-4 col-form-label">Jumlah Beli</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="quantity" name="kuantitas" value="1" style="width: 100px;">
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