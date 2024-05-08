<?php
session_start();
if ($_SESSION['status_login'] == true) {
    session_destroy();
session_unset();
echo "<script>alert('Sukses untuk Log Out Silahkan Login lagi');location.href='login.php';</script>";
} else {
    echo "<script>alert('Anda belum login');location.href='login.php';</script>";
}
?>