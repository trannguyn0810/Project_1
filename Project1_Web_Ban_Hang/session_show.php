<?php
session_start();
?>
    <h3>Show Cart</h3>

<?php

$cart=$_SESSION["cart"];
echo "<pre>";
var_export($cart);
echo "</pre>";
?>


