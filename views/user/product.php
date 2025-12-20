<?php
$baseURL = "http://localhost/delina_beauty/public/";
include '../views/layout/header.php';
require '../config/database.php';
$kategori_id = $_GET['kategori_id'] ?? '';

if ($kategori_id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE kategori_id = ? ");
    $stmt->bind_param("i", $kategori_id);
} else {
    $stmt = $conn->prepare(
        "SELECT * FROM products"
    );
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Product</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<style>
    .category-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        background: #fff5f8;
        border-top: 1px solid #eee;
        border-bottom: 5px solid #eee;
    }
    .category-bar {
        display: flex;
        gap: 35px;
        padding: 12px 0;
    }
    .category-bar a{
        text-decoration: none;
        font-weight: 600;
        color: #1f2937;
    }
    .category-bar a:hover{
        color: #ec4899;
    }
</style>

<body class="bg-gray-100 p-6">

    <!-- CATEGORY BAR -->
    <div class="category-wrapper">
        <nav class="category-bar">
            <a href="#">Facial Wash</a>
            <a href="#">Toner</a>
            <a href="#">Serum</a>
            <a href="#">Moisturizer</a>
            <a href="#">Sunscreen</a>
            <a href="#">Mask</a>
        </nav>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php while ($p = $result->fetch_assoc()): ?>

            <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">

                <!-- Gambar Produk -->
                <img
                    src="../public/images/<?= $p['image'] ?>"
                    class="w-48 h-48 object-cover rounded-lg mx-auto">

                <!-- Nama Produk -->
                <h3 class="mt-3 font-semibold text-gray-800 text-sm line-clamp-2">
                    <?= $p['name'] ?>
                </h3>

                <!-- Harga -->
                <p class="text-pink-600 font-bold mt-1 text-sm">
                    Rp <?= number_format($p['price'], 0, ',', '.') ?>
                </p>

                <!-- Tombol -->
                <a href="index.php?page=detail&id=<?= $p['id'] ?>"
                    class="mt-3 inline-block w-full text-center px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 text-sm">
                    Lihat Detail
                </a>

            </div>

        <?php endwhile; ?>
    </div>

</body>

</html>