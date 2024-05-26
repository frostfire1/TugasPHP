<?php
include "./component/iniadminkah.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('./admin/sidebar.php') ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <h1>Hello, <?= htmlspecialchars($_SESSION['nama']) ?>👋</h1>
        <br>
        <h2>Unprocessed Transactions:</h2>
        <div class="row">
            <?php
            require_once "koneksi.php";
            $sql = "SELECT t.*, p.nama FROM transaksi t LEFT JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan WHERE t.id_petugas IS NULL";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Transaction ID: <?= htmlspecialchars($row['id_transaksi']) ?></h5>
                                <p class="card-text">Customer Name: <?= htmlspecialchars($row['nama']) ?></p>
                                <p class="card-text">Transaction Date: <?= htmlspecialchars($row['tgl_transaksi']) ?></p>
                                <p class="card-text">Status: Awaiting Confirmation</p>
                                <a href="checkout_confirm.php?id_transaksi=<?= htmlspecialchars($row['id_transaksi']) ?>&id_petugas=<?= htmlspecialchars($_SESSION['id']) ?>" class="btn btn-primary">Accept</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No unprocessed transactions.</p>";
            }
            ?>
        </div>
    </main>
</body>

</html>