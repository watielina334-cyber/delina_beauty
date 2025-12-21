<?php
$baseURL = "/delina_beauty/public/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  
    .header {
      width: 100%;
      background: white;
      border-bottom: 1px solid #eee;
    }
  
    .header-container {
      max-width: 1200px;
      margin: auto;
      padding: 16px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }
  
    .logo img {
      height: 70px;
    }
  
    .nav-menu {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 24px;
    }
  
    .nav-menu a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
    }
  
    .nav-menu a:hover {
      color: #ec4899;
    }
  
    .nav-right {
      display: flex;
      gap: 8px;
      align-items: center;
      white-space: nowrap;
    }
  
    .nav-right a {
      text-decoration: none;
      font-weight: 600;
      color: #333;
    }
  
    .logout {
      color: red;
    }
  
    .search-box {
      display: flex;
      align-items: center;
      border: 1px solid #ddd;
      border-radius: 20px;
      padding: 5px 10px;
    }
  
    .search-box img {
      width: 15px;
      margin-right: 5px;
    }
  
    .search-box input {
      border: none;
      outline: none;
      font-size: 14px;
    }
  
    .icon {
      width: 20px;
    }
  </style>

<body>

  <header class="header">
    <div class="header-container">

      <!-- LOGO -->
      <div class="logo">
        <img src="../public/images/logo_delina.png" alt="Logo">
      </div>

      <!-- MENU TENGAH -->
      <nav class="nav-menu">
        <a href="<?= $baseURL ?>index.php?page=home">Home</a>
        <a href="<?= $baseURL ?>index.php?page=about">About</a>
        <a href="<?= $baseURL ?>index.php?page=products">Product</a>
        <a href="<?= $baseURL ?>index.php?page=contact_user">Contact</a>
      </nav>

      <!-- KANAN -->
      <div class="nav-right">
        <?php if (!isset($_SESSION['user_id'])): ?>
          <a href="<?= $baseURL ?>index.php?page=login">Log In</a>
          <a href="<?= $baseURL ?>index.php?page=register">Sign Up</a>
        <?php else: ?>
          <div class="search-box">
            <img src="../public/images/search.png">
            <input type="text" placeholder="Cari produk">
          </div>
          <a href="<?= $baseURL ?>index.php?page=cart">
            <img src="../public/images/cart.png" class="icon">
          </a>
          <a href="<?= $baseURL ?>index.php?page=logout" class="logout">Logout</a>
        <?php endif; ?>
      </div>
  </header>
</body>
</html>
