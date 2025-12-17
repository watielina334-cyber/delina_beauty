<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $role = 'customer';
        $insert = $conn->prepare(
            "INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)"
        );
        $insert->bind_param("ssss", $name, $email, $password_hashed, $role);
        $insert->execute();

        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = $role;

        header("Location: index.php?page=user");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Sign Up | Delina Beauty</title>

<style>
body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #ffd1dc, #ffe6f0);
}

.register-box{
    width: 380px;
    margin: 80px auto;
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(255,105,180,0.25);
}

.register-box h2{
    text-align:center;
    color:#ff4f9a;
    margin-bottom:25px;
}

.register-box label{
    font-size:14px;
    color:#555;
}

.register-box input{
    width:100%;
    padding:12px;
    margin-top:6px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #ffc1d6;
    outline:none;
}

.register-box input:focus{
    border-color:#ff4f9a;
}

.register-box button{
    width:100%;
    padding:12px;
    background:#ff4f9a;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

.register-box button:hover{
    background:#ff2f84;
}

.error{
    background:#ffe1ea;
    color:#d6336c;
    padding:10px;
    border-radius:8px;
    margin-bottom:15px;
    text-align:center;
}

.login-link{
    text-align:center;
    margin-top:15px;
}

.login-link a{
    color:#ff4f9a;
    text-decoration:none;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="register-box">
    <h2>Sign Up</h2>

    <?php if (isset($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        
        <label>Email</label>
        <input type="email" name="email" placeholder="Email aktif" required>
        
        <label>Nama</label>
        <input type="name" name="name" placeholder="Nama lengkap" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Daftar Sekarang</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="index.php?page=login">Login</a>
    </div>
</div>

</body>
</html>
