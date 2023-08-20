<?php
    require_once("index_ConnectionInfo.php");
    $con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    if($con->connect_error){
        die("Connection error");
    }

    $sql = "SELECT * FROM customers";
    $result = $con->query($sql);
    ?>

    <h4 style="text-align: center">List Customers</h4>
            <a href='index.php?page=insert_add_customers.php'><i class="fa-solid fa-circle-plus text-success"></i></a>
            <table  class="table table-bordered table-striped">
            <thead>
              <tr>
                  <td>Id</td>
                  <td>Customer Name</td>
                  <td>Phone</td>
                  <td>Email</td>
                  <td>Password</td>
                  <td>Address</td>
                  <td>Gender</td>
                  <td></td>
                  <td></td>
              </tr>
            </thead>
            <tbody>
                <?php
                   if($result->num_rows > 0){
                       while($row=$result->fetch_assoc()){
                           echo"<tr>";

                           echo"<td>".$row["id"]."</td>";
                           echo"<td>".$row["customer_name"]."</td>";
                           echo"<td>".$row["phone"]."</td>";
                           echo"<td>".$row["email"]."</td>";
                           echo"<td>".$row["password"]."</td>";
                           echo"<td>".$row["address"]."</td>";
                           echo"<td>".$row["gender"]."</td>";
                           echo"<td><a href='customers_delete.php?id=".$row["id"]."'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";
                           echo"<td><a href='edit_add_customers.php?id=".$row["id"]."'><i class='fa-regular fa-pen-to-square'></i></a></td>";

                           echo"<tr>";
                       }
                   }
                ?>
            </tbody>
        </table>
