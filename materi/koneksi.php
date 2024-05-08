<?php
    $con =mysqli_connect("localhost","root","", "escoters");
    if (!$con) {
        die("Erro: ". mysqli_connect_error());
    }
?>