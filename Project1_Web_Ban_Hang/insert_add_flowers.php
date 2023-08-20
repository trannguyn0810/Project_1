<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$sql = "SELECT * FROM flowers";
$result = $con->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h3 class="text-primary">Thêm Sản Phẩm</h3>
    <form action="insert_flowers.php" method="post">
        <div class="mb-3 mt-3">
            <label for="Id" class="form-label">Id</label>
            <input type="text" required class="form-control" name="id" id="id"><br>
            <label for="Name" class="form-label">Name</label>
            <input type="text" required class="form-control" name="name" id="name"><br>
            <label for="Color" class="form-label">Color</label>
            <input type="text" required class="form-control" name="color" id="color"><br>
            <label for="Price" class="form-label">Price</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="price" id="price">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Price_sale" class="form-label">Price Sale</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="price_sale" id="price_sale">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Quantity_flower" class="form-label">Quantity_flower</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="quantity_flower" id="quantity_flower">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Type_id" class="form-label">Type_id</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="type_id" id="type_id">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Category_id" class="form-label">Category_id</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="category_id" id="category_id">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Description" class="form-label">Description</label>
            <input type="text" required class="form-control" name="description" id="description"><br>
            <label for="Image" class="form-label">Image</label>
            <input type="file" required class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
</body>
</html>