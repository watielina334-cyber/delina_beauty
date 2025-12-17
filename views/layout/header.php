<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
            </nav>
            

            <!-- icon kanan -->
            <div class="flex items-center gap-4"> 
            </div>
        </div> 
    </header>
</body>
</html>