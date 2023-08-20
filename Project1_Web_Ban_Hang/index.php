<?php
    session_start();
?>
<?php
    $email ="";
    if (isset($_SESSION["email"])){
            $email =$_SESSION["email"];
        }

    $page= null;
    if(isset($_GET["page"])) {
        $page = $_GET["page"];
}
//    var_export($page);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
<a href="trang_chủ.php" class="btn btn-outline-danger"><i class="fa-solid fa-house-chimney-window"></i>Trang chủ</a>
 <h3>Trang chủ Admin</h3>
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
   <div class="container-fluid">
     <a class="navbar-brand" href="index.php">Logo</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="mynavbar">
       <ul class="navbar-nav me-auto">
         <li class="nav-item">
           <a class="nav-link" href="index.php?page=flowers.php">Flowers</a>
         </li>
           <li class="nav-item">
               <a class="nav-link" href="index.php?page=customers.php">Customers</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="index.php?page=orders.php">Orders</a>
           </li>
       </ul>

     </div>
   </div>
 </nav>

<div class="container">
    <?php
    if($page == null){
        require_once ("flowers.php");
        require_once("customers.php");
        require_once("orders.php");
    }
    if($page == "flowers.php"){
        require_once ("flowers.php");
    }else if($page == "insert_add_flowers.php") {
        require_once("insert_add_flowers.php");
    }else if($page == "edit_add_flowers.php") {
        require_once("edit_add_flowers.php");
    }else if($page == "edit_add_customers.php") {
        require_once("edit_add_customers.php");
    }else if($page == "customers.php") {
        require_once("customers.php");
    } else if($page == "insert_add_customers.php") {
        require_once("insert_add_customers.php");
    } else if($page == "orders.php") {
        require_once("orders.php");
    }
    ?>
</div>

</body>
</html>