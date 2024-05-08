<?php
    $con =mysqli_connect("localhost","root","", "toko");
    if (!$con) {
        die("Erro: ". mysqli_connect_error());
    }
?>