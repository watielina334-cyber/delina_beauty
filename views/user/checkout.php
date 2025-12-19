<?php
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("location: index.php?page=login");
    exit;
}

$items = $_SESSION['checkout_items'] ?? [];
if (empty($items)) {
    echo ("tidak ada produk checkout");
}

$subtotal = 0;
foreach ($items as $item) {
    $subtotal += $item['price'] * $item['qty'];
}

$ongkir = 15000;
$total = $subtotal + $ongkir;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
    body {
        font-family: Arial;
        background: #f5f5f5;
    }
    .container {
        width: 800px;
        margin: 40px auto;
        background: #fff;
        padding: 20px;
        border-radius: 15px;
    }
    .section{
        margin-bottom: 25px;
    }
    .section h3 {
        border-bottom: 1px solid #ddd;
        padding-bottom: 8px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td, th {
        padding: 10px;
        border-bottom: 2px solid #eee;
    }
    input, textarea, select {
        width: 100%;
        padding: 8px;
        margin-top: 6px;
    }
    .total {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
    .btn {
        background: #e63946;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <div class="section">
            <h3>Produk Dibeli</h3>
            <table>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td>
                        <img src="../public/images/<?= $item['image']; ?>" alt="" width="60">
                        <?= $item['name']; ?>
                    </td>
                    <td><?= $item['qty']; ?>x Rp <?= number_format($item['price']); ?></td>
                    <td>Rp <?= number_format($item['price'] * $item['qty']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- format alamat -->
        <div class="section">
            <h3>Alamat Pengiriman</h3>
            <textarea name="address" placeholder="Masukan alamat lengkap anda"></textarea>
        </div>
        <!-- format pembayaran -->
        <div class="section">
            <h3>Metode Pembayaran</h3>
            <select name="payment".required>
                <option value="">---Pilih Metode--</option>
                <option value="COD">COD</option>
                <option value="Transfer bank">Transfer Bank</option>
            </select>
            <div id="bankWrapper" style="display: none; margin-top: 15px;">
                <label>Pilih Bank</label>
                <select name="bank">
                    <option value="">--Pilih Bank --</option>
                    <option value="BRI"></option>
                    <option value="BCA"></option>
                    <option value="Mandiri"></option>
                    <option value="Seabank"></option>
                </select>
            </div>
        </div>
        <!-- format ringkasan -->
        <div class="section">
            <h3>Ringkasan Pembayaran</h3>
            <p>Subtotal: Rp <?= number_format($subtotal); ?></p>
            <p>Ongkir: Rp <?= number_format($ongkir); ?></p>
            <div class="total">Total: Rp <?= number_format($total); ?></div>
        </div>

        <form action="index.php?page=cekout_proses.php">
            <input type="hidden" name="total" value="<?= $total ?>">
            <button class="btn">Buat Pesanan</button>
        </form>
    </div>
</body>
<script>
    function toggleBank(value) {
        const bank = document.getElementById('bankWrapper');
        bank.style.display = value === 'TRANSFER' ? 'block': 'none';
    }
</script>
</html>
