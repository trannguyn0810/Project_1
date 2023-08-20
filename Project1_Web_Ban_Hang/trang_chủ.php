<?php
    session_start();
?>
<?php
    $email ="";
    if (isset($_SESSION["email"])){
            $email =$_SESSION["email"];
        }

    require_once ("index_ConnectionInfo.php");
    $con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    if($con->connect_error){
        die("Connection error");
}

$sql = "SELECT * FROM flowers";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ - Galilove</title>
    <link rel="stylesheet" href="Trang_chủ.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="header">
    <div class="header-top" style="height: 40px">

        <div class="nav" style="font-size: 16px; width: 100%; margin-left: 18px"><b>Chào mừng bạn đến thế giới hoa sáp, hoa giấy Galilove</b></div>
        <div style="width: 127%"></div>
        <div class="nav-divided">
            <span style="color:white; font-size: 16px" href="mailto:trannguyn1008@gmail.com">
                <i style="font-size: 16px" class="fa-regular fa-envelope"></i>
                <span>trannguyn1008@gmail.com </span>  </span>
            <i style="border-left: 1px solid;height: 550px; color:darkgray"></i>
            <i style="margin-left: 10px;  font-size: 15px"  class="fa-solid fa-phone" ></i>
            <span style="color:white; font-size: 15px" href="tel:0966331980">
            <span> 0966331980 </span> </span>
            <i style="color:white; font-size: 17px;margin-left: 10px" class="fa-brands fa-facebook" ></i>
            <i style="color:white; font-size: 17px;margin-left: 7px" class="fa-brands fa-instagram"></i>
            <i style="color:white; font-size: 17px;margin-left: 7px" class="fa-brands fa-twitter" ></i>
            <i style="color:white; font-size: 17px;margin-left: 7px" class="fa-regular fa-envelope"></i>
        </div>

    </div>

    <div class="flex" >
        <a><img src="hoa.jpg" alt=""></a>
        <span>
         <span style="margin-left: 210px; font-size: 27px; color: #4eb512">DỊCH VỤ HOA UY TÍN TẠI HÀ NỘI</span>
            <div class="wide" style="margin-top: 20px; font-size: 16px">
                <span style="margin-left: 90px">TRANG CHỦ</span>
                <span style="margin-left: 30px">HOA SÁP THƠM</span>
                <span style="margin-left: 30px">HOA GIẤY</span>
                <span style="margin-left: 30px">QUÀ TẶNG</span>
                <span style="margin-left: 30px">TIN TỨC</span>
                <span style="margin-left: 30px">LIÊN HỆ</span>
            </div> </span>
        <div>
            <div>
            <?php
            if ($email != ""){
//                echo "Xin chào $customer_name ";
                echo "<a href='cart_show.php' class='btn btn-outline-danger'><i class='fa-solid fa-cart-shopping'></i>Xem giỏ hàng</a>";
                echo '<a href="logout.php" class="btn btn-outline-danger">Đăng Xuất</a>';
            } else{
                ?>
                <a href="register.php" class="btn btn-outline-danger" ><i class="fa-regular fa-user"></i>Đăng Ký</a>
                <a href="login.php" class="btn btn-outline-danger"><i class="fa-solid fa-user"></i>Đăng Nhập</a>
                <a href="login_admin.php" class="btn btn-outline-primary"><i class="fa-solid fa-circle-user"></i>Admin</a>
                <?php
            }
            ?> </div>
            <button class="btn" style="margin-left: 190px; margin-top: 20px;background-color: pink; border-color: #fd2b67">
                <input style=" background-color: pink; border-color: pink; border: 1px" class="input" type="search" placeholder="Search...">
                <i style="width: 50px;font-size: 20px;color:#fd2b67;" class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>

</header>
<div>
    <img src="hoa1.jpg" alt="" height="650px" width="100%">
</div>

<div style="margin-top: 30px">
    <img src="image_product/T.jpg" alt="" height="250px" width="20%" style=" margin-left: 133px">
    <img src="image_product/H.jpg" alt="" height="250px" width="18%" style=" margin-left: 30px">
    <img src="image_product/Y.jpg" alt="" height="250px" width="19%" style=" margin-left: 30px">
    <img src="image_product/A.jpg" alt="" height="250px" width="20%" style=" margin-left: 30px">
</div>


<div class="container" >
    <div style="margin-left: 500px;margin-top: 50px;margin-bottom: 10px;font-family: 'Charmonman', sans-serif; text-transform: none; font-weight: bold; font-size: 34px; color: #fd2b67">Hoa Hồng Sáp Thơm</div>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-3">';
                echo '<div class="card" style="width:300px">';
                echo "<a href='flower_detail.php?id=".$row["id"]."'><img class='card-img-top' src='image_product/".$row["image"]."' alt='' style>";

                echo ' <div class="card-body">';
                echo ' <h4 class="card-title" style="color: black">'.$row["name"].'</h4>';
                echo ' <p class="card-text" style="font-size: 20px"><b>'.$row["price_sale"].'<u>đ</u></b></p>';
                echo ' <p class="card-text" style="font-size: 20px; color: #fd2b67;">'.$row["description"].'</p>';

                echo '</div>';

                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>

</div>

</div>
</body>
</html>
