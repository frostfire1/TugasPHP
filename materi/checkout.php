<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        $lama_pinjam=5; 
        $tgl_harus_kembali=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_pinjam),date('Y')));
        mysqli_query($con,"insert into peminjaman_buku (id_siswa,tanggal_pinjam,tanggal_kembali) value('".$_SESSION['id_siswa']."','".date('Y-m-d')."','".$tgl_harus_kembali."')");
         $id=mysqli_insert_id($con);

        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($con,"insert into detail_peminjaman_buku (id_peminjaman_buku,id_buku,qty) value('".$id."','".$val_produk['id']."','".$val_produk['kuantitas']."')");
        }


        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil meminjam buku");location.href="histori_peminjaman.php"</script>';
    }
?>
