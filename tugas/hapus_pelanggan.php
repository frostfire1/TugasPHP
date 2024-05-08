
<?php 
    include "./component/iniadminkah.php";
    if($_GET['id_pelanggan']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($con,"delete from pelanggan where id_pelanggan='".$_GET['id_pelanggan']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        }
    }
?>