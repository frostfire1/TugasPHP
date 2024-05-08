<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    if(isset($_SESSION['id'])){
        $id_pelanggan = $_SESSION['id'];

        $query_keranjang = "SELECT * FROM keranjang WHERE id_pelanggan = '$id_pelanggan'";
        $result_keranjang = mysqli_query($con, $query_keranjang);

        if(mysqli_num_rows($result_keranjang) > 0){
            $row_keranjang = mysqli_fetch_assoc($result_keranjang);
            $cart_items = json_decode($row_keranjang['list_keranjang'], true);

            if(count($cart_items) > 0){
                $total = 0;
                $items_array = array();

                echo "<h2 class='mt-5 mb-4'>Keranjang Belanja</h2>";
                echo "<div class='row'>";

                foreach($cart_items as $item){
                    $id_produk = $item['id_produk'];
                    $jumlah = $item['kuantitas'];

                    $query_produk = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
                    $result_produk = mysqli_query($con, $query_produk);

                    if(mysqli_num_rows($result_produk) > 0){
                        $row_produk = mysqli_fetch_assoc($result_produk);
                        $nama_produk = $row_produk['nama_produk'];
                        $harga = $row_produk['harga'];
                        $gambar_produk = $row_produk['foto_produk'];
                        $subtotal = $harga * $jumlah;

                        $total += $subtotal;
                        $items_array[] = array(
                            'id_produk' => $id_produk,
                            'nama_produk' => $nama_produk,
                            'harga' => $harga,
                            'jumlah' => $jumlah,
                            'subtotal' => $subtotal
                        );

                        echo "<div class='col-md-4'>
                                <div class='card'>
                                    <img src='$gambar_produk' class='card-img-top' alt='$nama_produk'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$nama_produk</h5>
                                        <p class='card-text'>Harga: $harga</p>
                                        <p class='card-text'>Jumlah: 
                                            <span id='jumlah_$id_produk'>$jumlah</span>
                                            <button class='btn btn-sm btn-success' onclick='increment($id_produk)'>+</button>
                                            <button class='btn btn-sm btn-danger' onclick='decrement($id_produk)'>-</button>
                                        </p>
                                        <p class='card-text'>Subtotal: Rp. $subtotal</p>
                                    </div>
                                </div>
                            </div>";
                    }
                }

                echo "</div>";
                echo "<h1>Total: Rp. $total</h1>";

                // Hidden input moment
                echo "<form action='checkout.php' method='post' class='mt-4'>
                        <input type='hidden' name='list_produk' value='".htmlspecialchars(json_encode($cart_items))."'>
                        <input type='hidden' name='total' value='".$total."'>
                        <input type='hidden' name='id' value='".$row_keranjang['id_keranjang']."'>
                        <button type='submit' name='checkout' class='btn btn-primary'>Checkout</button>
                    </form>";
            } else {
                echo "<p>Keranjang belanja anda kosong.</p>";
            }
        } else {
            echo "<p>Keranjang belanja anda kosong.</p>";
        }
    } else {
        echo "<p>Silakan login terlebih dahulu.</p>";
    }
    ?>
</div>
<script>
    function increment(id_produk) {
        var jumlahElement = document.getElementById('jumlah_'+id_produk);
        var jumlah = parseInt(jumlahElement.textContent);
        jumlah++;
        jumlahElement.textContent = jumlah;
        updateQuantity(id_produk, jumlah);
    }

    function decrement(id_produk) {
        var jumlahElement = document.getElementById('jumlah_'+id_produk);
        var jumlah = parseInt(jumlahElement.textContent);
        if(jumlah > 1) {
            jumlah--;
            jumlahElement.textContent = jumlah;
            updateQuantity(id_produk, jumlah);
        }
    }

    function updateQuantity(id_produk, jumlah) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
            }
        };
        xhr.open("POST", "update_quantity.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id_produk=" + id_produk + "&jumlah=" + jumlah);
    }
</script>
</body>
</html>
<?php
include "footer.php";
?>
