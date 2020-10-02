<?php
    ob_start();
    include_once("project/header.php");
    require("project/connection.php");

 
if(isset($_POST['submit3'])){

    $image    =$_FILES['image']['name'];
    $tmp_name =$_FILES['image']['tmp_name'];
    $path  ='images/items/';
    $x=time().$image;

    move_uploaded_file($tmp_name, $path.$x);

    
    $name=$_POST['name'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];
    $catid=$_POST['select'];

    $insert="INSERT INTO product(product_name,product_image,product_price,product_desc,cat_id)
                         value('$name','$x','$price','$desc','$catid')";
    mysqli_query($connect,$insert); 
  
          
    header("Location: manage_product.php");
}

if(isset($_GET['id1'])){

    $query  ="SELECT cat_image FROM category WHERE cat_id={$_GET['id1']}";
    $result =mysqli_query($connect,$query);
    $image  =mysqli_fetch_assoc($result);
    $Ypath  ='/projects/project/admin/images/items/';
    $path   = $_SERVER['DOCUMENT_ROOT']."$Ypath".$image['cat_image'];

    unlink($path);

    $delete= "DELETE FROM product WHERE product_id={$_GET['id1']}";
    mysqli_query($connect,$delete);
    header("Location:manage_product.php");

}


if(isset($_GET['id'])){

     $status="active";

    $insert="UPDATE product
             SET status       ='$status'
             WHERE product_id={$_GET['id']}";

                         echo $insert;
     mysqli_query($connect,$insert);    
  
          
    header("Location: manage_product.php");
    
 

    }

    if(isset($_GET['id2'])){

     $status="pending";

    $insert="UPDATE product
             SET status       ='$status'
             WHERE product_id={$_GET['id2']}";

     mysqli_query($connect,$insert);            
    header("Location: manage_product.php");
    }


?>
    
 
          
<div class="static-table-area ">
            <div class="container-fluid " style="margin-left:250px;margin-right:250px;margin-top: 50px;">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1 style="text-align: center;">Pending Products</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Catorgy Name</th>
                                        <th>Status</th>
                                        <th>Approval</th>
                                        <th>Delete</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                     $read="SELECT * FROM product WHERE status='pending'";
                                          $result=mysqli_query($connect,$read);

                                          $ex="SELECT cat_name 
                                               FROM category 
                                               INNER JOIN product 
                                               ON category.cat_id = product.cat_id";

                                           $try=mysqli_query($connect,$ex);

                                     while($new=mysqli_fetch_assoc($result)){

                                        $old=mysqli_fetch_assoc($try);
                                        
                                        echo "<tr>";
                                        echo "<td>{$new['product_id']}</td>";
                                        echo "<td>{$new['product_name']}</td>";
                                        echo "<td>{$new['product_price']}</td>";
                                        echo "<td>{$new['product_desc']}</td>";
                                        echo "<td><img src='images/items/{$new['product_image']}' width=100</td>";
                                        echo "<td>{$old['cat_name']}</td>";
                                        echo "<td>{$new['status']}</td>";
                                        echo "<td><a href='manage_product.php?id={$new['product_id']}' class='btn btn-warning' name='e'> <i class='zmdi zmdi-edit' >Approve</i></a></td>";
                                        echo "<td><a href='manage_product.php?id1={$new['product_id']}' class='btn btn-danger' name='delete' > <i class='zmdi zmdi-delete'  >Remove</i></a></td>";
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

<div class="static-table-area ">
            <div class="container-fluid " style="margin-left:250px;margin-right:250px; margin-top: 50px;">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1 style="text-align: center;">Approved Products</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                         <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Catorgy Name</th>
                                        <th>Status</th>
                                        <th>Reject</th>
                                        <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                    
                                          $read="SELECT * FROM product WHERE status='active'";
                                          $result=mysqli_query($connect,$read);

                                          $ex="SELECT cat_name 
                                               FROM category 
                                               INNER JOIN product 
                                               ON category.cat_id = product.cat_id";

                                           $try=mysqli_query($connect,$ex);

                                     while($new=mysqli_fetch_assoc($result)){

                                        $old=mysqli_fetch_assoc($try);
                                        
                                        echo "<tr>";
                                        echo "<td>{$new['product_id']}</td>";
                                        echo "<td>{$new['product_name']}</td>";
                                        echo "<td>{$new['product_price']}</td>";
                                        echo "<td>{$new['product_desc']}</td>";
                                        echo "<td><img src='images/items/{$new['product_image']}' width=100</td>";
                                        echo "<td>{$old['cat_name']}</td>";
                                        echo "<td>{$new['status']}</td>";
                                        echo "<td><a href='manage_product.php?id2={$new['product_id']}' class='btn btn-warning' name='e'> <i class='zmdi zmdi-edit' >Reject</i></a></td>";
                                        echo "<td><a href='manage_product.php?id1={$new['product_id']}' class='btn btn-danger' name='delete' > <i class='zmdi zmdi-delete'  >Remove</i></a></td>";
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
