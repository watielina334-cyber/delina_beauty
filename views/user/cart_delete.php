<?php 
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("location: index.php?page=login");
    exit;
}

$cart_id = $_GET['id'] ?? 0;
$stmt = $conn -> prepare("DELETE FROM carts WHERE card_id = ?");
$stmt->bind_param("i", $cart_id);
$stmt->execute();

header("location: index.php?page=cart");
exit;
?>