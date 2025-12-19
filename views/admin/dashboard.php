<?php
require_once '../config/database.php';

// cek login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header ("location: index.php?page=login");
    exit;

$totalOrder = $conn -> query("SELECT COUNT(*) AS total FROM orders") -> fetch_assoc()['total'];

// pesanan hari ini
$todayOrder = $conn -> query("
SELECT COUNT(*) AS total FROM orders WHERE DATE (created_at) = CURDATE()") -> fetch_assoc()['total'];

// total pendapatan
$totalIncome = $conn->query("
SELECT SUM(total_price) AS total FROM orders") -> fetch_assoc()['total'];

// pesanan pending
$pending = $conn->query("
SELECT orders.order_id, users.name, orders.total_price ORDER BY orders.created_at DESC LIMIT 5");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
</head>
<body>
    <div class="cards">
        <div class="card">
            <h3>Total Pemesanan</h3>
            <p><?= $totalOrder ?></p>
        </div>
        <div class="card">
            <h3>Pesanan Hari Ini</h3>
            <p><?= $todayOrder ?></p>
        </div>
        <div class="card">
            <h3>Pendapatan</h3>
            <p><?= number_format($totalIncome) ?></p>
        </div>
        <div class="card">
            <h3>Menuggu</h3>
            <p><?= $pending ?></p>
        </div>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
        </tr>

        <?php while ($row = $orders -> fetch_assoc()): ?>
            <tr>
                <td><?= ($row['order_id']) ?></td>
                <td><?= $row['name'] ?></td>
                <td>Rp <?= number_format($row['total_price']) ?></td>
                <td><?= ucfirst(($row['status'])) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
