<?php
session_start();
require_once '../../config/database.php';

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $users = $result->fetch_assoc();

        if (password_verify($password, $users['password'])) {

            $_SESSION['users'] = [
                'user_id'    => $users['user_id'],
                'email' => $users['email'],
                'role'  => $users['role']
            ];

            // ✅ REDIRECT BENAR
            header("Location: ../user/home.php");
            exit;

        } else {
            echo "<script>alert('Password salah');history.back();</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan');history.back();</script>";
    }
}
