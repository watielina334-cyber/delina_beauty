<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pesan = trim($_POST['pesan']);

    $stmt = $conn ->prepare(
        "INSERT INTO contacts (name, email, pesan) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $pesan);

    if($stmt->execute()) {
        echo"<script> alert('pesan berhasil dikirim');
        window.location='index.php?page=contact_user';
        </script>";
    } else {
        echo "gagal mengirim pesan";
    }
}
?>