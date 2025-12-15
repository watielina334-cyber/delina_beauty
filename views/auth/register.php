<?php
require '../config/database.php';

if (isset($_POST['register'])) {

    $email = trim($_POST['email']);
    $name  = trim($_POST['name']);
    $password = $_POST['password'];

    // 1️⃣ CEK EMAIL SUDAH ADA ATAU BELUM
    $cek = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $cek->bind_param("s", $email);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar!');history.back();</script>";
        exit;
    }

    // 2️⃣ HASH PASSWORD
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // 3️⃣ INSERT USER BARU
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password_hash);

    if ($stmt->execute()) {
        echo "<script>alert('Register berhasil! Silakan menjelajahi website kami');window.location='index.php?page=user';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<style>
body { font-family: Arial; background: #f2f2f2; }
form { background: #fff; padding: 20px; max-width: 400px; margin: 50px auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
input { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
button { padding: 10px; width: 100%; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
button:hover { background: #45a049; }
</style>
</head>
<body>
<h2 style="text-align:center;">Register</h2>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required>
    <input type="name" name="name" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Register</button>
</form>
</body>
</html>
