<?php

require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}

if (isset($_GET["id"]))
{
    $sql="UPDATE flowers SET 
    name='". $_GET["name"] . "',color='". $_GET["color"] . "',price='" . $_GET["price"] . "',price_sale='" . $_GET["price_sale"] . "',quantity_flower='" . $_GET["quantity_flower"] . "',type_id='" . $_GET["type_id"] . "',category_id='" . $_GET["category_id"] . "',description='" . $_GET["description"] . "' 
    WHERE id='" . $_GET["id"] . "' ";
    $con->query($sql);
}
header("Location: index.php?page=flowers.php");