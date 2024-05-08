<?php 
session_start();
    if($_POST){
        include "koneksi.php";
        
        $qry_get_buku=mysqli_query($con,"select * from buku where id = '".$_GET['id_buku']."'");
        $dt_buku=mysqli_fetch_array($qry_get_buku);
        $_SESSION['cart'][]=array(
            'id'=>$dt_buku['id'],
            'nama'=>$dt_buku['nama'],
            'kuantitas'=>$_POST['jumlah_pinjam']
        );
    }
    header('location: keranjang.php');
?>
