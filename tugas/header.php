<?php
include "component/iniuserkah.php"
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">TOKO ONLINE</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="<?=$homeactive?>"><a href="home.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
      <li class="<?=$transaksi?>"><a href="transaksi.php"><span class="glyphicon glyphicon-credit-card"></span>Transaksi</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?></a></li>
      <li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
</body>
</html>
