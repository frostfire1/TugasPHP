<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if ($_SESSION['role'] == 'user') {
    header('Location: 404.php');
    exit;
}
if (empty($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}
?>