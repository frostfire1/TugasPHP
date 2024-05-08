<?php

if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama=$_POST['nama'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($con,"update pelanggan set nama='".$nama."',telp='".$telp."', alamat='".$alamat."', username='".$username."', password='".$password."' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($con));
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        } else {
            $update=mysqli_query($con,"update pelanggan set nama='".$nama."',telp='".$telp."', alamat='".$alamat."', username='".$username."', password='".md5($password)."' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($con));
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        }
        
    } 
}
?>
