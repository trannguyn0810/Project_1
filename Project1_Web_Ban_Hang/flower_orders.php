<?php
require_once ('index_ConnectionInfo.php');
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die ("Connection error");
}

     $ids = $_POST["ids"];
     $customer_ame = $_POST["customer_name"];
     $phone = $_POST["phone"];
     $address = $_POST["address"];
     $email = $_POST["email"];
     $gender = $_POST["gender"];

     date_default_timezone_set("Asia/Bangkok");
     $date_buy = date("Y-m-d H:i-s");
     var_export($date_buy);
     echo "<br>";

     $sql = "";
     $sql .="INSERT INTO customers(customer_name,phone,address,email,gender) ";
     $sql .=" VALUE ('$customer_ame','$phone','$address','$email','$gender')";
     $con->query($sql);

     $insertedID = $con->insert_id;
     $sqlOrders = "";
    $sqlOrders .="INSERT INTO orders(date_buy,customer_id, status) ";
    $sqlOrders .=" VALUE ('$date_buy','$insertedID','PENDING')";
    $con->query($sqlOrders);
    var_export($sqlOrders);
    echo "<br>";

    $orderID = $con->insert_id;
    $arrID = explode(",", $ids);
    $sqlOrderDetail = "";
    $sqlOrderDetail .="INSERT INTO order_details(flower_id,quantity,order_id) ";
    $sqlOrderDetail .=" VALUE ";
    for ($i = 0; $i< count($arrID); $i++){
        if ($i != count($arrID) - 1){
            $sqlOrderDetail .="(".$arrID[$i].", 1, $orderID), ";
        } else {
            $sqlOrderDetail .="(".$arrID[$i].", 1, $orderID) ";
        }
    }
    $con->query($sqlOrderDetail);
     var_export($sqlOrderDetail);

     echo "<br>Đặt Hàng Thành Công";

header("Location: orders_customer.php");