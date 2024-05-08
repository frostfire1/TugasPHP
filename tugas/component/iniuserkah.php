<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


if (!($_SESSION['role'] == 'user')) {
    echo "<script>alert('Admin Gak boleh disini 😅🙏, belum buat sistem Preview😢😢');location.href='dashboard.php';</script>";
    exit;
}
if (empty($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}
?>