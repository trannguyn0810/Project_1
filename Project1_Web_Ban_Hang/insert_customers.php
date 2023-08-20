<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}

$id= $_POST["id"];
$name= $_POST["customer_name"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$password= $_POST["password"];
$address= $_POST["address"];
$gender= $_POST["gender"];

$sql= "INSERT INTO customers(id, customer_name, phone, email, password, address, gender)  VALUES('$id','$name','$phone','$email','$password','$address','$gender')";
$con->query($sql);

header("Location: index.php?page=customers.php");