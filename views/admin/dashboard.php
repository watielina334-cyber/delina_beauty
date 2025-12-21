<?php 
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../auth/admin_guard.php';

// data dashboard
$totalProduk = $conn->query("SELECT COUNT(*) total FROM products") -> fetch_assoc()['total'];
$totalOrder = $conn->query("SELECT COUNT(*) total FROM orders") -> fetch_assoc()['total'];
$totalUser = $conn->query("SELECT COUNT(*) total FROM users WHERE role='customer'") -> fetch_assoc()['total'];
$totalUang = $conn->query("SELECT SUM(total_harga) total FROM orders WHERE status='selesai'") -> fetch_assoc()['total'] ?? 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="/delina_beauty/public/style.css">
</head>
<body>
    <div class="wrapper">
        <!-- side bar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="index.php?page=admin">Dashboard</a>
            <a href="#">Produk</a>
            <a href="#">Pesanan</a>
            <a href="#">Customer</a>
            <a href="#">Logout</a>
        </div>

        <!-- content -->
        <div class="content">
            <h1>Dashboard</h1>
            <p>Selamat Datang, 
                <b><?= $_SESSION['name'] ?? $_SESSION['email'] ?? 'admin'; ?><b>
            </p>
            <div class="cards">
                <div class="card blue">
                    <h3>Total Produk</h3>
                    <p><?= $totalProduk ?></p>
                </div>

                <div class="card green">
                    <h3>Total Pesanan</h3>
                    <p><?= $totalOrder ?></p>
                </div>

                <div class="card orange">
                    <h3>Total Customer</h3>
                    <p><?= $totalUser ?></p>
                </div>

                <div class="card red">
                    <h3>Total Pendapatan</h3>
                    <p>Rp <?= number_format($totalUang) ?></p>
                </div>

                <div class="card gray">
                    <h3>Produk Terlaris</h3>
                    <p>Rp <?= number_format($totalUang) ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
