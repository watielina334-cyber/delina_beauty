<?php 
$payment = $_POST['payment'];
$bank = $_POST['bank'] ?? null;

if($payment === 'TRANSFER' && empty ($bank)){
    echo ("Silahkan pilih bank");
}
?>