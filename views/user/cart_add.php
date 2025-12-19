<?php
require '../config/database.php';
// pastikan user login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}

$user_id = $_SESSION['user_id'];
$id = intval($_POST['id'] ?? 0);
$quantity = intval($_POST['qty'] ?? 1);
$action = $_POST['action'] ?? '';

if ($id<=0) {
    echo "Produk tidak valid";
    exit;
}

// cek apakah produk sudah ada di cart
$check = $conn->prepare("SELECT * FROM carts WHERE user_id=? AND id=?");
$check->bind_param("ii", $user_id, $id);
$check->execute();
$res_check = $check->get_result();

if ($res_check->num_rows > 0) {
    $row = $res_check->fetch_assoc();
    $new_qty = $row['quantity'] + $quantity;
    $update = $conn->prepare("UPDATE carts SET quantity=? WHERE id=?");
    $update->bind_param("ii", $new_qty, $row['id']);
    $update->execute();
} else {
    $insert = $conn->prepare("INSERT INTO carts(user_id, id, quantity) VALUES(?,?,?)");
    $insert->bind_param("iii", $user_id, $id, $quantity);
    $insert->execute();
}

// redirect sesuai action
if ($action === 'cart') {
    header("Location: index.php?page=cart");
    exit;
} elseif ($action === 'buy') {
    // simpan data buy now di session
    $_SESSION['buy_now'] = [
        'id' => $id,
        'quantity' => $quantity
    ];
    header("Location: index.php?page=cekout");
    exit;
}
?>
