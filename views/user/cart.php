<?php
session_start();
require '../../config/database.php';

$user_id = $_SESSION['users']['id'];

$sql = "
SELECT 
    c.quantity,
    p.name,
    p.price,
    p.image
FROM cart c
JOIN products p ON c.product_id = p.id
WHERE c.user_id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
<title>Keranjang</title>
<style>
body { font-family: Arial; background:#f5f5f5; }
.cart {
    max-width: 800px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
}
.item {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}
img { width: 80px; }
.price { color:#ff4b8a; font-weight:bold; }
</style>
</head>

<body>
<div class="cart">
    <h2>Keranjang Belanja</h2>

    <?php while($row = $result->fetch_assoc()): ?>
        <div class="item">
            <img src="../../public/images/<?= $row['image'] ?>">
            <div>
                <b><?= $row['name'] ?></b><br>
                Qty: <?= $row['quantity'] ?><br>
                <span class="price">
                    Rp <?= number_format($row['price'] * $row['quantity'],0,',','.') ?>
                </span>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</body>
</html>
