<?php 
$baseURL= "/delina_beauty/public/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="w-full bg-white shadow-md py-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4">

            <!-- logo -->
            <img src="../public/images/logo_delina.png" alt="Logo" class="h-20 w-auto">

            <!-- menu navigasi -->
            <nav class="hidden md:flex items-center gap-6 text-gray-700">
                <a href="<?= $baseURL ?>index.php?page=home" class="hover:text-pink-500"> Home </a>
                <a href="<?= $baseURL ?>index.php?page=about" class="hover:text-pink-500"> About </a>
                <a href="<?= $baseURL ?>index.php?page=products" class="hover:text-pink-500"> Product </a>
                <a href="<?= $baseURL ?>index.php?page=contact_user" class="hover:text-pink-500"> Contact </a>

                <!-- icon kanan -->
            <div class="flex items-center gap-4">
                <?php if(!isset($_SESSION['users'])): ?>
                    <!--customer belom login  -->
                    <a href="<?= $baseURL ?>index.php?page=login" class="font-semibold">Log In</a>
                    <a href="<?= $baseURL ?>index.php?page=register" class="font-semibold">Sign Up</a>

                    <?php else: ?>
                        <!-- customer sudah login -->
                        <div class="flex items-center gap-4">
                            <!-- logo search -->
                            <div class="flex items-center border rounded-full px-3 py-1">
                                <img src="../public/images/search.png" alt="" class="w-4 h-4 mr-2">
                                <input type="text" placeholder="Cari Produk Favorit Anda" class="outline-none text-sm w-36">
                            </div>
                            <!-- logo cart / keranjang -->
                            <a href="<?= $baseURL ?>index.php?page=cart">
                                <img src="../public/images/cart.png" alt="" class="w-5 h-5">
                            </a>

                            <!-- logout -->
                            <a href="<?= $baseURL ?>index.php?page=logout" class="text-sm text-red-500">Logout</a>
                        </div>
                <?php endif ;?>
            </div>
            </nav>
        </div> 
    </header>
</body>
</html>