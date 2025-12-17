<?php
require_once __DIR__ . '/../../config/database.php';

// ambil id produk dari URL
if (!isset($_GET['id'])) {
    die("Produk tidak ditemukan");
}

$id = $_GET['id'];

// ambil data produk
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$products = $stmt->get_result()->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<title><?= $products['name'] ?></title>
<style>
body {
    font-family: Arial;
    background: #f5f5f5;
}
.detail-container {
    max-width: 1000px;
    margin: 40px auto;
    background: #fff;
    padding: 20px;
    display: flex;
    gap: 40px;
    font-family: Arial, sans-serif;
}
.product-image img {
    width: 350px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgb(0,0,0,.1);
}
.btn-group button {
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
}
.qty {
    margin-bottom: 10px;
}
.cart {
    background: #ff9800;
}
.buy {
    background: #e53935;
}
</style>
</head>

<body>

<div class="detail-container">

    <!-- GAMBAR -->
    <div class="product-image">
        <img src="../public/images/<?= $products['image'] ?>" alt="">
    </div>

    <!-- INFO produk -->
    <div class="product-info">
        <h2><?= $products['name'] ?></h2>
        <div class="price">
            Rp <?= number_format($products['price']) ?>
        </div>
        <div>
            Stok Tersedia: <?= $products['stock'] ?>
        </div>
        <div class="desc">
            <?= nl2br($products['description']) ?>
        </div>

        <!-- FORM -->
        <form action="index.php?page=cart_add" method="POST">
            <input type="hidden" name="id" value="<?= $products['id'] ?>">
            <div class="qty">
                <label>Jumlah :</label>
                <input type="number" name="qty" value="1" min="1" max="<?= $products['stock'] ?>">
            </div>

            <div class="btn-group">
                <button type="submit" name="action" value="cart" class="cart">
                    🛒 Tambah ke Keranjang
                </button>

                <button type="submit" name="action" value="buy" class="buy">
                    ⚡ Beli Sekarang
                </button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
