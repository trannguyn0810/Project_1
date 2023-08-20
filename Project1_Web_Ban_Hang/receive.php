<?php
session_start();
?>
<?php
require_once ("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$id= $_GET["id"];

    $sql = "";
    $sql .= "UPDATE orders  ";
    $sql .= "SET ";
    $sql .= "  status ='RECEIVED' ";
    $sql .= "WHERE ";
    $sql .= "  id ='$id' ";

$con->query($sql);
header("location:orders.php");
