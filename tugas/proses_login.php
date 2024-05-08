<?php 

    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            $qry_login=mysqli_query($con,"select * from pelanggan where username = '".$username."' and password = '".md5($password)."'");
            $qry_login_admin=mysqli_query($con,"select * from petugas where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>=1){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id']=$dt_login['id_pelanggan'];
                $_SESSION['nama']=$dt_login['nama'];
                $_SESSION['role']="user";
                $_SESSION['status_login']=true;
                header("location: home.php");
            }elseif(mysqli_num_rows($qry_login_admin)>=1){
                $dt_login=mysqli_fetch_array($qry_login_admin);
                session_start();
                $_SESSION['id']=$dt_login['id_petugas'];
                $_SESSION['nama']=$dt_login['nama_petugas'];
                $_SESSION['role']=$dt_login['level'];
                $_SESSION['status_login']=true;
                header("location: dashboard.php");
            }else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>
