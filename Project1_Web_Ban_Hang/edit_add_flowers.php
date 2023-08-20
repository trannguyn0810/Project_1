<?php
    $id=$_GET["id"];
    $sql = "SELECT * FROM flowers WHERE id=$id";

    require_once ("index_ConnectionInfo.php");
    $con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    if($con->connect_error){
        die("Connection error");
    }

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

    <h3 class="text-primary">Edit Sản Phẩm</h3>
<form action="edit_flowers.php" method="get">
    <div class="mb-3 mt-3">
    id <input type="text" required class="form-control" name="id" value="<?php echo $obj['id']; ?>"><br>
    name <input type="text" required class="form-control" name="name" value="<?php echo $obj['name']; ?>"><br>
    color <input type="text" required class="form-control" name="color" value="<?php echo $obj['color']; ?>"><br>
        price <input type="number" required class="form-control" name="price" value="<?php echo $obj['price']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    price_sale <input type="number" required class="form-control" name="price_sale" value="<?php echo $obj['price_sale']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    quantity_flower <input type="number" required class="form-control" name="quantity_flower" value="<?php echo $obj['quantity_flower']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    type_id <input type="number" required class="form-control" name="type_id" value="<?php echo $obj['type_id']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    category_id <input type="number" required class="form-control" name="category_id" value="<?php echo $obj['category_id']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    description <input type="text" required class="form-control" name="description" value="<?php echo $obj['description']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>
</div>