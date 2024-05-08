<?php 
include "./component/iniadminkah.php";
    if($_GET['id_produk']){
        include "koneksi.php";
        $data_produk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM produk"));
        
        $qry_hapus=mysqli_query($con,"delete from produk where id_produk='".$_GET['id_produk']."'");
        if($qry_hapus){
            unlink($data_produk['foto_produk']);
            echo "<script>alert('Sukses hapus produk');location.href='tampil_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus produk');location.href='tampil_produk.php';</script>";
        }
    }
?>