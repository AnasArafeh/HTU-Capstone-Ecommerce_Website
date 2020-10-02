<?php
    ob_start();
    include_once("project/header.php");
    require("project/connection.php");
?>
    
 
<div class="static-table-area ">
            <div class="container-fluid " style="margin-left:250px;margin-right:250px;margin-top:50px;">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Order Details</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order_ID</th>
                                                <th>Order_Date</th>
                                                <th>Customer_ID</th>
                                                <th>Vendor_ID</th>
                                                <th>Product_ID</th>
                                                <th>Cancel Order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                     $read="SELECT * FROM orders";
                                     $result=mysqli_query($connect,$read);
                                     while($new=mysqli_fetch_assoc($result)){

                                        echo "<tr>";
                                        echo "<td>{$new['order_id']}</td>";
                                        echo "<td>{$new['order_date']}</td>";
                                        echo "<td>{$new['user_id']}</td>";
                                        echo "<td>{$new['vendor_id']}</td>";
                                         echo "<td>{$new['product_id']}</td>";
                                        echo "<td><a href='order_details.php?id1={$new['order_id']}' class='btn btn-danger' name='delete' > <i class='zmdi zmdi-delete'  >Cancel</i></a></td>";
                                        echo "</tr>";
                                     }
                                     ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div></div></div></div>


<?php 

    include_once("project/footer.php");
 ?>
