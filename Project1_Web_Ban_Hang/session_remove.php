<?php
session_start();

require_once("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}
$_SESSION["cart"]=[];
header("Location: cart_show.php");



