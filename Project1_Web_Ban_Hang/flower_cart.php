<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/all.css">
<?php
session_start();
$id=$_GET["id"];
//var_export($id);

require_once ('index_ConnectionInfo.php');
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die ("Connection error");
}
$sql= "SELECT * FROM flowers WHERE id = $id";
$result=$con->query($sql);
$obj = null;
if($result-> num_rows > 0) {
    while ($row= $result->fetch_assoc()){
        $obj = $row;
    }
}

//echo "<pre>";
//var_export($obj);
//echo "</pre>";

$obj["quantity"] = 1;
$_SESSION["cart"][$obj["id"]] = $obj;
//echo "<h4 class='alert alert-danger'>Thêm Vào Giỏ Hàng Thành Công</h4>";
header("Location: cart_show.php");
 ?>



