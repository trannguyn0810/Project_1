<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}

if (isset($_POST["id"]))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $price_sale = $_POST['price_sale'];
    $quantity_flower = $_POST['quantity_flower'];
    $type_id = $_POST['type_id'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    $file = $_FILES['image'];
    $fileName = $file["name"];
    // $fileNameInfo: 111, jpg, size
    $fileNameInfo = pathinfo($fileName);
    $fileNameEnd = $fileNameInfo["filename"]."_".date("Y_m_d_H_i_s").".".$fileNameInfo["extension"];

    $sql = "INSERT INTO flowers(id,name,color,price,price_sale,quantity_flower,type_id,category_id,description, image) VALUES
      ('$id','$name','$color','$price','$price_sale','$quantity_flower','$type_id','$category_id','$description', '".$fileNameEnd."')";
    $fileUpload = "image_product/".$fileNameEnd;

    if (move_uploaded_file($file['tmp_name'], $fileUpload)) {
        echo "Upload Successfully<br>";
    } else {
        echo "Upload Failed<br>";
    }

    if($con->query($sql) === TRUE){
        echo "Insert Success";
    }else{
        echo "Insert Error<br>". $con->error;
    }
}
header("Location: index.php?page=flowers.php");

