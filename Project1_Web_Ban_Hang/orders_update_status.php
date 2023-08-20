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

$sql = "SELECT id,status FROM orders WHERE id=$id";
$result = $con->query($sql);
$objn=null;
if($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $objn=$row;
    }
}
        ?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
    <form action="update_customers.php" method="post">
        <h3>Trạng thái đơn hàng</h3>
        <input type="text" name="id" value="<?php echo $objn['id']; ?>" />
        <div class="mb-3 mt-3">
            <label for="status">Trạng thái</label>
            <input type="button" style="display: block;float: left;" class="form-control form-control-sm" name="status" value="<?php echo $objn['status'];?>" id="status">

        </div>
        </div>
    </form>
<?php
        if($objn["status"]=="PENDING"){
            echo "<a href='update_orders.php?id=".$objn['id']."' class='btn btn-info'style='font-family: Arial;font-size: smaller'>ACCEPTED</a>";
            echo '<button disabled style="font-family: Arial;font-size: smaller" >SHIPPING</button>';
            echo '<button disabled style="font-family: Arial;font-size: smaller" >RECEIVED</button>';
            echo "<a href='delete.php?id=".$objn['id']."' class='btn btn-info'style='font-family: Arial;font-size: smaller'>CANCEL</a>";
        }

        else if($objn["status"]=="ACCEPTED"){
            echo '<button disabled style="font-family: Arial;font-size: smaller" >ACCEPTED</button>';
            echo "<a href='ship.php?id=".$objn['id']."' class='btn btn-info'style='font-family: Arial;font-size: smaller'>SHIPPING</a>";
            echo '<button disabled style="font-family: Arial;font-size: smaller" >RECEIVED</button>';
            echo '<button disabled style="font-family: Arial;font-size: smaller" >CANCEL</button>';

        }else if($objn["status"]=="SHIPPING"){
            echo '<button disabled style="font-family: Arial;font-size: smaller" >ACCEPTED</button>';
            echo '<button disabled style="font-family: Arial;font-size: smaller" >SHIPPING</button>';
            echo "<a href='receive.php?id=".$objn['id']."' class='btn btn-info'style='font-family: Arial;font-size: smaller'>RECEIVED</a>";
            echo '<button disabled style="font-family: Arial;font-size: smaller" >CANCEL</button>';
        }
echo "<br><br>";
        ?>
<a href="orders.php" class="btn btn-outline-primary"><i class="fa-solid fa-truck"></i> Orders</a>


