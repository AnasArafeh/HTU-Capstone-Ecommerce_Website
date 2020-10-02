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
                                    <h1 style="text-align: center;">Order Details</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <tbody>
                                            <?php

              $ve_id=$_SESSION['id'];

              $query1="SELECT vendor_id FROM orders ";
              $result1=mysqli_query($connect,$query1);

              while($vendor=mysqli_fetch_assoc($result1)){


                if(strpos($vendor['vendor_id'],"$ve_id"))
                {
                 $q_order="SELECT order_id FROM orders WHERE vendor_id='$vendor[vendor_id]'";
                 $q_result=mysqli_query($connect,$q_order);
                 $q_order=mysqli_fetch_assoc($q_result); 

                 $order_id[]=$q_order;
               }
             }

             foreach ($order_id as $key => $value) {

              foreach ($value as $key1 => $value1) {

               $query="SELECT product_id FROM orders WHERE order_id=$value1 ";
               $result=mysqli_query($connect,$query);
               $product=mysqli_fetch_assoc($result);   
               $products[]=$product;

               $ord_id[]=$value1;
             }
           }


           foreach ($products as $key2 => $value2) {

            foreach ($value2 as $key3 => $value3) {

             $product_id[]=explode(",", $product['product_id']);
           }
                        
         }
         foreach ($ord_id as $keyx => $valuer) {

          echo"  <br><br><li><span>Order ID: </span> <span>".$valuer." </span></li>";  

          $query5="SELECT user_id FROM orders WHERE order_id=$valuer ";
          $result5=mysqli_query($connect,$query5); 
          $u_id=mysqli_fetch_assoc($result5);    


          $query6="SELECT * FROM user WHERE user_id=$u_id[user_id] ";
          $result6=mysqli_query($connect,$query6);

          while($k=mysqli_fetch_assoc($result6)){

            echo"  
            <li><span>Full Name: </span> <span>". $k['user_fullname']."</span></li>
            <li><span>Mobile: </span> <span>".$k['user_mobile']."</span></li>
            <li><span>Email: </span> <span>". $k['user_email']."</span></li>
            <li><span>Address: </span> <span>".$k['user_address']."</span></li>
            <li><span>Items: </span> <span>";

          }  
         foreach ($product_id as $key4 => $value4) {


          foreach ($value4 as $key5 => $value5) {


            $query3="SELECT product_name FROM product where vendor_id={$_SESSION['id']} AND product_id=$value5";
            $result3=mysqli_query($connect,$query3);
            $u=mysqli_fetch_assoc($result3);
            if($u==null){
              continue;
            }

            echo "  <br><li><span>Product Name: </span> <span>".$u['product_name']." </span></li>";  
          }
        }
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
