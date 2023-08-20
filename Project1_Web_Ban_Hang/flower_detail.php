<?php
session_start();
?>
<?php
$id=$_GET["id"];
//var_dump($id);
//die();
require_once ('index_ConnectionInfo.php');
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die ("Connection error");
}
$sql= "SELECT * FROM flowers where id=$id";

$result=$con->query($sql);
$obj = null;
if($result-> num_rows > 0) {
    while ($row= $result->fetch_assoc()){
        $obj = $row;
    }
}
?>

<link rel="stylesheet" href="Trang_chủ.css">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/all.css">
<form action="">
    <div class="header-top" style="color:#fd2b67;">
    <img src="image_product/<?php echo $obj['image']; ?>" alt="" width=300 style="margin-left: 200px; margin-top: 50px">
    <div style="font-size: 30px; margin-left: 40px">

<!--        //         <span class="fa fa-star checked"></span>-->
<!--        //         <span class="fa fa-star checked"></span>-->
<!--        //         <span class="fa fa-star checked"></span>-->
<!--        //         <span class="fa fa-star checked"></span>-->
<!--        //         <span class="fa fa-star checked"></span>-->
<!--        //         <span>(2 nhận xét)</span>-->
    <span><?php echo $obj['name']; ?></span> <br>
    <span style="color: pink"><strike><?php echo $obj['price']; ?><u>đ</u></strike></span>
        <span><b><?php echo $obj['price_sale']; ?><u>đ</u></b></span><br>
    <span>Số lượng: <?php echo $obj['quantity_flower']; ?></span><br>
    <span><?php echo $obj['description']; ?></span><br>

<!--       <div>-->
<!--           <span>Số lượng <input type="number" required class="form-control" name="quantity" value="--><?php //echo $obj['quantity']; ?><!--"> </span><br>-->
<!--       </div>-->

        <div>
            <a href="flower_cart.php?id=<?php echo $obj['id'] ?>"
               class="btn " type="button" style="background-color: rgba(255,87,34,.1);color: red; border-color: red; height: 40px;width: 200px; font-size: 18px">
                    <span>Thêm Vào Giỏ Hàng</span>
            </a>

            <a href="session_show.php?id=<?php echo $obj['id'] ?>"
            <button class="btn btn-danger" type="button" style="color: white; margin-right: 10px; height: 40px;width: 150px; font-size: 18px">
                <span >Mua Ngay</span>
            </button>
            </a>
        </div>

        </div>
    </div>

</form>



