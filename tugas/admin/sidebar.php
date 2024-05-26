<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Sidebar</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100; 
      padding: 48px 0 0; 
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      background-color: #f8f9fa !important;
      border-right: 1px solid #dee2e6 !important;
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding: 1rem;
      overflow-x: hidden;
      overflow-y: auto; 
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar border-right">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                <i class="fa fa-dashboard"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampil_produk.php">
                <i class="fa fa-product-hunt"></i> Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">
                <i class="fa fa-exchange"></i> Transaksi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampil_pelanggan.php">
                <i class="fa fa-users"></i> Pelanggan
              </a>
            </li>
            <?php if ($_SESSION['role'] == 'FOUNDER'): ?>
            <li class="nav-item">
              <a class="nav-link" href="tampil_petugas.php">
                <i class="fa fa-user"></i> Petugas
              </a>
            </li>
            <?php endif; ?>
            <li class="nav-item mt-auto">
              <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out"></i> Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>