<?php

$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background: #f1f1f1;
        }

        .product {
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: left;
        }

        .product img {
            width: 60px;
            border-radius: 6px;
        }

        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 20px;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #e63946;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🛒 Keranjang Belanja</h2>

    <?php if (empty($cart)): ?>
        <div class="empty">
            Keranjang masih kosong
        </div>
    <?php else: ?>

    <table>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $total = 0;
        foreach ($cart as $item):
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;
        ?>
        <tr>
            <td class="product">
                <img src="../assets/img/<?= $item['image']; ?>">
                <?= $item['name']; ?>
            </td>
            <td>Rp <?= number_format($item['price']); ?></td>
            <td><?= $item['qty']; ?></td>
            <td>Rp <?= number_format($subtotal); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="total">
        Total: Rp <?= number_format($total); ?>
    </div>

    <a href="index.php?page=checkout" class="btn">
        Checkout
    </a>

    <?php endif; ?>
</div>

</body>
</html>
