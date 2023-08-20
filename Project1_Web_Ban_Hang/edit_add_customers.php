<?php
$con=new mysqli("localhost","root" ,"root","flower");
if($con->connect_errno){
    die("connection error");
}
$id= $_GET["id"];
$sql = "";
$sql .= "SELECT * ";
$sql .= "FROM customers ";
$sql .= "WHERE  ";
$sql .= "  id ='$id' ";
$result = $con->query($sql);

$obj = null;
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $obj = $row;
    }
}
?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<div class="container">
<form action="edit_customers.php" method="post">
    <h3>Sửa Khách Hàng</h3>
    <input type="text" name="id" value="<?php echo $obj['id']; ?>" />
    <div class="mb-3 mt-3">
        <label for="">Customer Name</label>
        <input type="text" class="form-control form-control-sm" name="customer_name" id="customer_name" value="<?php echo $obj['customer_name']; ?>"><br>
    </div>
    <div class="mb-3 mt-3">
        <label for="">Phone</label>
        <input type="text" class="form-control form-control-sm" name="phone" id="phone" value="<?php echo $obj['phone']; ?>"><br>
    </div>
    <div class="mb-3 mt-3">
        <label for="">Email</label>
        <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?php echo $obj['email']; ?>"><br>
    </div>
    <div class="mb-3 mt-3">
        <label for="">Password</label>
        <input type="text" class="form-control form-control-sm" name="password" id="password" value="<?php echo $obj['password']; ?>"><br>
    </div>
    <div class="mb-3 mt-3">
        <label for="">Address</label>
        <input type="text" class="form-control form-control-sm" name="address" id="address" value="<?php echo $obj['address']; ?>"><br>
    </div>
    <div class="mb-3 mt-3">
        <label for="">Gender</label>
        <input type="text" class="form-control form-control-sm" name="gender" id="gender" value="<?php echo $obj['gender']; ?>"><br>
    </div>

    <div class="mb-3 mt-3">
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </div>
    </div>

</form>
