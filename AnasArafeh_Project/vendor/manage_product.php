<?php
    ob_start();
    include_once("project/header.php");
    require("project/connection.php");
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $price=$_POST['price'];
    $desc=$_POST['desc'];
    $catid=$_POST['select'];
    $vendor_id=$_SESSION['id'];
    $status="pending";

    $image    =$_FILES['image']['name'];
    $tmp_name =$_FILES['image']['tmp_name'];
    $path  ='images/items/';
    $x=time().$image;
    move_uploaded_file($tmp_name, $path.$x);

    $insert="INSERT INTO product(product_name,product_image,product_price,product_desc,cat_id,vendor_id,status)
                         value('$name','$x','$price','$desc','$catid','$vendor_id','$status')";

                         echo $insert;


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
    die;

}


if(isset($_GET['id'])){
  
   $query="SELECT * FROM product WHERE product_id={$_GET['id']}";
   $result=mysqli_query($connect,$query);
   $new=mysqli_fetch_assoc($result);

    }
if(isset($_POST['edit'])){

     
     $name=$_POST['name'];
     $image=$new['product_image'];
     $price=$_POST['price'];  
     $desc=$_POST['desc']; 
     $catid=$_POST['select'];
     $vendor_id=$_SESSION['id'];
     $status="pending";
     if($_FILES['image']['error']==0){ 
        
    $image    =$_FILES['image']['name'];
    $tmp_name =$_FILES['image']['tmp_name'];
    $path     ='images/items/';
    $x=time().$image;
         move_uploaded_file($tmp_name, $path.$image);
        }
     $edit="UPDATE product SET product_name     ='$name',
                               product_image    ='$image',
                               product_price    ='$price',
                               status           ='$status',
                               vendor_id        ='$vendor_id',
                               cat_id           ='$catid',
                               product_desc     ='$desc'
                               WHERE product_id ={$_GET['id']}";
             mysqli_query($connect,$edit);
             header("Location:manage_product.php");
   }
?>
    
 <div class="basic-form-area mg-b-15 " >
            <div class="container-fluid" style="margin-left:300px;margin-right:300px;margin-top:50px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1 style="text-align: center;">Customer Form</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                            <form action="" method="post" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                                <input id="cc-pament" name="name" type="text" class="form-control"  value="<?php if(isset($_GET['id'])){ echo $new['product_name'];}?>" required>
                                            </div>
                                           
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Price</label>
                                                <input id="cc-name" name="price" type="text" class="form-control cc-name " value="<?php if(isset($_GET['id'])){ echo $new['product_price'];}?>" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Description</label>
                                                <input id="cc-number" name="desc" type="text" class="form-control cc-number " value="<?php if(isset($_GET['id'])){ echo $new['product_desc'];}?>" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                
                                                    <label for="select" class=" form-control-label">Select</label>
                                                
                                               
                                                    <select name="select" id="select" class="form-control"  >
                                                        
                                                        <?php 

                                                        if(isset($_GET['id'])){

                                                     $y="SELECT * FROM category WHERE cat_id={$new['cat_id']}";
                                                        $y1=mysqli_query($connect,$y); 
                                                        $y2=mysqli_fetch_assoc($y1);

                                                         echo "<option value='$y2[cat_id]'>
                                                            $y2[cat_name]</option>";
                                                        }

                                                        $ex="SELECT * FROM category";
                                                        $try=mysqli_query($connect,$ex); 

                                                        while($cat=mysqli_fetch_assoc($try)){
                                                        if($y2['cat_id']==$cat['cat_id']){
                                                            continue;
                                                        }   
                                                        echo "<option value='$cat[cat_id]'>
                                                            $cat[cat_name]</option>";
                                                          
                                                        }

                                                        ?>
                                                    </select>
                                              
                                            </div>
                                              <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Image</label>
                                                <input id="cc-number" name="image" type="file" class="form-control cc-number " value="<?php if(isset($_GET['id'])){ echo $new['product_image'];}?>">
                                                
                                            </div>                                          
                                      
                                            <div>
                                            
                                             <input id="payment-button" type="<?php 
                                                     if(isset($_GET['id'])){ 

                                                        echo "hidden";

                                                      }

                                                     else{
                                                        echo "submit";
                                                     }
                                                     ?>" name="submit" class="btn btn-lg btn-info " 
                                                     value="Submit"

                                                      <?php 
                                                      if(isset($_GET['id'])){ 

                                                      echo "disabled"; }
                                                      ?>

                                                       style="width:100%" >
                                              
                                                                                           
                                                </input>
                                                <input id="payment-button1" type="<?php 
                                                if(isset($_GET['id'])){ 

                                                    echo "submit";

                                                 }

                                                     else{
                                                        echo "hidden";
                                                     }
                                                     ?>"  name="edit" class="btn btn-lg btn-info"  value="edit" style="width:100%">
                                                                                                                                       
                                                </input>    
                                              
                                                                                           
                                                </input>
                                                                                         
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div> 
<div class="static-table-area ">
            <div class="container-fluid " style="margin-left:250px;margin-right:250px;">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Customer Information</h1>
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
                    <th>Edit</th>
                    <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                    
                        $read="SELECT * FROM product Where vendor_id={$_SESSION['id']}";
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
                    echo "<td><a href='manage_product.php?id={$new['product_id']}' class='btn btn-warning' name='e'> <i class='zmdi zmdi-edit' >Edit</i></a></td>";
                    echo "<td><a href='manage_product.php?id1={$new['product_id']}' class='btn btn-danger' name='delete' > <i class='zmdi zmdi-delete'  >Delete</i></a></td>";
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
