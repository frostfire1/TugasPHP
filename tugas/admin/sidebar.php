<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Sidebar</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100; 
      padding: 48px 0 0; 
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: .5rem;
      overflow-x: hidden;
      overflow-y: auto; 
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampil_produk.php">
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">
                Transaksi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampil_pelanggan.php">
                Pelanggan
              </a>
            </li>
            <?php if ($_SESSION['role'] == 'FOUNDER'): ?>
            <li class="nav-item">
              <a class="nav-link" href="tampil_petugas.php">
                Petugas
              </a>
            </li>
            <?php endif; ?>
          </ul>
          <ul class="nav flex-column mt-auto"> <!-- mt-auto untuk spasi di bagian bawah -->
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                Log Out
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
