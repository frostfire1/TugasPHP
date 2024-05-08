<?php
if($_POST){
    $nama=$_POST['nama'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }if(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }if(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }if(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($con,"insert into pelanggan (nama, telp, alamat, username, password) value ('".$nama."','".$telp."','".$alamat."','".$username."','".md5($password)."')") or die(mysqli_error($con));
        if($insert){
            echo "<script>alert('Sukses menambahkan Pelanggan');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Pelanggan);location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>
