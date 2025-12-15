<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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

if (!$products) {
    die("Produk tidak ada");
}
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
.container {
    width: 900px;
    margin: 40px auto;
    background: #fff;
    padding: 20px;
    display: flex;
    gap: 30px;
}
.image img {
    width: 350px;
    border-radius: 10px;
}
.info h2 {
    margin: 0;
}
.price {
    color: #e53935;
    font-size: 22px;
    margin: 15px 0;
}
.desc {
    margin: 15px 0;
    color: #555;
}
.qty input {
    width: 60px;
    padding: 5px;
}
.actions {
    margin-top: 20px;
}
.actions button {
    padding: 12px 20px;
    border: none;
    cursor: pointer;
    font-size: 14px;
}
.cart {
    background: #ff9800;
    color: white;
}
.buy {
    background: #e53935;
    color: white;
}
</style>
</head>

<body>

<div class="container">

    <!-- GAMBAR -->
    <div class="image">
        <img src="../../public/images/<?= $products['image'] ?>" alt="">
        <div class="tumbnail">
            <img src="../../public/images/<?= $products['image'] ?>" alt="">
            <img src="../../public/images/<?= $products['image'] ?>" alt="">
            <img src="../../public/images/<?= $products['image'] ?>" alt="">
        </div>
    </div>

    <!-- INFO produk -->
    <div class="info">
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
        <form action="../cart/cart_add.php" method="POST">
            <input type="hidden" name="id" value="<?= $products['id'] ?>">

            <div class="qty">
                Jumlah :
                <input type="number" name="qty" value="1" min="1" max="<?= $products['stock'] ?>">
            </div>

            <div class="actions">
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
