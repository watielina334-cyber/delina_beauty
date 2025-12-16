<?php
session_start();
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // cek apakah email sudah terdaftar
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $role = 'customer';
        $insert = $conn->prepare("INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)");
        $insert->bind_param("ssss", $name, $email, $password_hashed, $role);
        $insert->execute();

        // otomatis login
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = $role;

        header("Location: ../../public/index.php?page=home");
        exit;
    }
}
?>

<h2>Sign Up</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    <div>
        <label>Nama:</label>
        <input type="name" name="name" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Sign Up</button>
</form>
<p>Sudah punya akun? <a href="index.php?page=login">Login</a></p>
