<?php
session_start();
require_once '../../config/database.php';

// cek login
if(!isset($_SESSION['users'])) {
    header("location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['users']['user_id'];
$id = (int) $_POST['id'];
$qty = (int) ($_POST['quantity'] ?? 1);

// validasi data
if ($id <= 0 || $qty <= 0) {
    echo "data tidak valid";
    exit;
}

// cek produk & stok
$stmt = $conn -> prepare(
    "SELECT stock FROM products WHERE id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt -> get_result();

if($result ->num_rows === 0) {
    echo " produk tidak ditemukan";
    exit;
}

$products = $result->fetch_assoc();
$stock = (int) $products['stock'];

if($qty > $stock) {
    echo "<script>alert('stok tidak ditemukan'); history.back(); </script)";
    exit;
}

// cek apakah sudah ada di cart
$stmt = $conn->prepare(
    "SELECT quantity FROM carts WHERE user_id = ? AND id = ?"
);
$stmt ->bind_param("ii", $user_id, $id);
$stmt -> execute();
$cartsResult = $stmt->get_result();

if($cartsResult -> num_rows === 1) {
    $carts = $cartsResult -> fetch_assoc();
    $newQty = $carts['quantity'] + $qty;

    if ($newQty > $stock) {
        echo "<script>alert('jumlah melebihi stok'); history.back();</script>";
        exit;
    }

    $stmt = $conn -> prepare(
        "UPDATE carts SET quantity = ? WHERE user_id = ? and id = ?"
    );
    $stmt->bind_param("iii", $newQty, $user_id, $id);

}else {
    $stmt = $conn->prepare(
        "INSERT INTO carts(user_id, id, quantity) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("iii", $user_id, $id, $qty);
}

if ($stmt->execute()) {
    header("location: index.php?page=cart");
    exit;
} else {
    echo "gagal menambahkan ke keranjang";
}
?>