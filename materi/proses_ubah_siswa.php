<?php
if($_POST){
    $id_siswa=$_POST['id_siswa'];
    $nama_siswa=$_POST['nama_siswa'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id_kelas=$_POST['id_kelas'];
    $role=$_POST['role'];    
    if(empty($nama_siswa)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";

    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($con,"update siswa set nama_siswa='".$nama_siswa."',tanggal_lahir='".$tanggal_lahir."', gender='".$gender."', alamat='".$alamat."', username='".$username."', id_kelas='".$id_kelas."', role='".$role."'where id_siswa = '".$id_siswa."' ") or die(mysqli_error($con));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_data.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
            }
        } else {
            $update=mysqli_query($con,"update siswa set nama_siswa='".$nama_siswa."',tanggal_lahir='".$tanggal_lahir."', gender='".$gender."', alamat='".$alamat."', username='".$username."', password='".md5($password)."', id_kelas='".$id_kelas."', role='".$role."'where id_siswa = '".$id_siswa."'") or die(mysqli_error($con));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_data.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
            }
        }
        
    } 
}
?>
