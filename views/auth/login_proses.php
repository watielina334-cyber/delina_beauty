<?php
include '../config/database.php'; // koneksi database

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    echo "Email atau password tidak boleh kosong";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Pastikan hanya 1 user ditemukan
if ($result->num_rows === 1) {
    $users = $result->fetch_assoc();

    // Cek password
    if (password_verify($password, $users['password'])) {
        // Login berhasil, simpan session
        $_SESSION['user_id'] = $users['user_id'];
        $_SESSION['email'] = $users['email'];
        $_SESSION['name'] = $users['name'];
        $_SESSION['role'] = $users['role'];

        if ($users['role'] === 'admin') {
            header("location: index.php?page=admin");
        } else {
            header("Location: index.php?page=home");
        }
        exit;
    } else {
        echo "Password salah";
        exit;
    }
} else {
    echo "Email tidak ditemukan";
    exit;
}
?>
