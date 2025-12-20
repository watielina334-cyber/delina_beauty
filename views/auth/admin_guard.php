<?php 
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("location: /../index.php?page=login");
    exit;
}
?>