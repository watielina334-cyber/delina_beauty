<?php
require_once '../config/database.php';

// proteksi login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}

$user_id = $_SESSION['user_id'];

// ambil cart dari database
$stmt = $conn->prepare("
    SELECT 
        carts.cart_id,
        carts.quantity AS qty,
        products.name,
        products.price,
        products.image
    FROM carts
    JOIN products ON carts.id = products.id
    WHERE carts.user_id = ?
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart = [];
while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
}

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
<script>
document.addEventListener('DOMContentLoaded', function () {

    const checks = document.querySelectorAll('.item-check');
    const totalHarga = document.getElementById('totalHarga');

    function updateTotal() {
        let total = 0;

        checks.forEach(cb => {
            if (cb.checked) {
                total += parseInt(cb.dataset.subtotal);
            }
        });

        totalHarga.textContent = total.toLocaleString('id-ID');
    }

    checks.forEach(cb => {
        cb.addEventListener('change', updateTotal);
    });

});
</script>
<body>
<form action="index.php?page=checkout" method="POST" id="cartFrom"></form>
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
                <th>Aksi</th>
            </tr>

            <?php
            $total = 0;
            foreach ($cart as $item):
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            ?>
            <tr>
                <td class="product">
                    <input type="checkbox" name="cart_ids[]" value="<?= $item['cart_id']; ?>"
                    class="item-check" data-subtotal="<?= $subtotal; ?>">
                </td>
                <td class="product">
                    <img src="../public/images/<?= $item['image']; ?>">
                    <?= $item['name']; ?>
                </td>
                <td>Rp <?= number_format($item['price']); ?></td>
                <td><?= $item['qty']; ?></td>
                <td>Rp <?= number_format($subtotal); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="total">
            Total: Rp <span id="totalPrice">0</span>
        </div>
        
        <!-- icon hapus -->
        <td>
            <a href="index.php?page=cart_delete&id=<?= $item['cart_id']; ?>"
            onclick="return confirm('hapus produk ini?')" style="color:red; font-size:18px; text-decoration:none;">🗑️</a>
        </td>
        <a href="index.php?page=cekout" class="btn">
            Checkout
        </a>

        <?php endif; ?>
    </div>
</body>
</html>
