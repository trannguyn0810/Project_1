<?php
session_start();
?>

    <h3>Add Session</h3>
<?php
$cart["image"] = "hoa giay.jpg";
$cart["product_name"] = "Hoa giấy";
$cart["price"] = 50000;

$_SESSION["cart"] = $cart;

