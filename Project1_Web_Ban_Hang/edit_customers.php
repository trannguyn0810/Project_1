<?php
$con=new mysqli("localhost","root" ,"root","flower");
if($con->connect_errno){
    die("connection error");
}
$id= $_POST["id"];
$name= $_POST["customer_name"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$password= $_POST["password"];
$address= $_POST["address"];
$gender= $_POST["gender"];

$sql = "";
$sql .= "UPDATE customers";
$sql .= "SET ";
$sql .= "  customer_name ='$name', ";
$sql .= "  phone ='$phone', ";
$sql .= "  email ='$email', ";
$sql .= "  password ='$password', ";
$sql .= "  address ='$address', ";
$sql .= "  gender ='$gender' ";
$sql .= "WHERE ";
$sql .= "  id ='$id' ";

$con->query($sql);
header("Location: index.php?page=customers.php");