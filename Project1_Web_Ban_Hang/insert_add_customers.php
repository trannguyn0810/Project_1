<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$sql = "SELECT * FROM customers";
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
    <h3 class="text-primary">Thêm Khách Hàng</h3>
    <form action="insert_customers.php" method="post">
        <div class="mb-3 mt-3">
            <label for="Id" class="form-label">Id</label>
            <input type="text" required class="form-control" name="id" id="id"><br>
            <label for="Customer Name" class="form-label">Customer Name</label>
            <input type="text" required class="form-control" name="customer_name" id="customer_name"><br>
            <label for="Phone" class="form-label">Phone</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="phone" id="phone">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Email" class="form-label">Email</label>
            <input type="text" required class="form-control" name="email" id="email"><br>
            <label for="Password" class="form-label">Password</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="password" id="password">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Address" class="form-label">Address</label>
            <input type="text" required class="form-control" name="address" id="address"><br>
            <label for="Gender" class="form-label">Gender</label>
            <input type="text" required class="form-control" name="gender" id="gender">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
</body>
</html>