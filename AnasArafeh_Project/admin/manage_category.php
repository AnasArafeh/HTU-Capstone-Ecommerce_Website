<?php
    ob_start();
    include_once("project/header.php");
    require("project/connection.php");

   
    if(isset($_POST['submit4'])){
        
    $image    =$_FILES['image']['name'];
    $x=time().$image;
    $tmp_name =$_FILES['image']['tmp_name'];
    $path     ='images/items/';
    
    move_uploaded_file($tmp_name, $path.$x);
    
    $name=$_POST['name'];

    $insert="INSERT INTO category(cat_name,cat_image)
                         value('$name','$x')";
    mysqli_query($connect,$insert);                   
    header("Location: manage_category.php");    
    }

    if(isset($_GET['id1'])){

    
    $query  ="SELECT cat_image FROM category WHERE cat_id={$_GET['id1']}";
    $result =mysqli_query($connect,$query);
    $image  =mysqli_fetch_assoc($result);
    $Ypath  ='/projects/project/admin/images/items/';
    $path   = $_SERVER['DOCUMENT_ROOT']."$Ypath".$image['cat_image'];
    unlink($path);

    $delete= "DELETE FROM category WHERE cat_id={$_GET['id1']}";
    mysqli_query($connect,$delete);
    header("Location:manage_category.php");

    }

    if(isset($_GET['id'])){

     $query="SELECT * FROM category WHERE cat_id={$_GET['id']}";
     $result=mysqli_query($connect,$query);
     $new=mysqli_fetch_assoc($result);

    }

    if(isset($_POST['edit'])){

    
    $image = $new['cat_image'];

    if($_FILES['image']['error']==0){

        $image    =$_FILES['image']['name'];
        $tmp_name =$_FILES['image']['tmp_name'];
        $path     ='images/items/'; 

        $x=time().$image;

        move_uploaded_file($tmp_name, $path.$image);

             }

    $name=$_POST['name']; 

    $edit="UPDATE category SET cat_name     ='$name',
                               cat_image    ='$image'
                               WHERE cat_id ={$_GET['id']}";


    mysqli_query($connect,$edit);
    header("Location:manage_category.php");
   }


?>
    
 <div class="basic-form-area mg-b-15 " >
            <div class="container-fluid" style="margin-left:300px;margin-right:300px;margin-top:50px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1 style="text-align: center;">Category Form</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                               <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                                <input id="cc-pament" name="name" type="text" class="form-control"value="<?php if(isset($_GET['id'])){echo $new['cat_name'];}?>" required>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Image</label>
                                                <input id="cc-name" name="image" type="file" class="form-control cc-name " value="<?php if(isset($_GET['id'])){echo $new['cat_image'];}?>" >
                                               
                                            </div>

                                            <div>

                                                <input id="payment-button" type="<?php if(isset($_GET['id'])){ 
                                                    echo "hidden"; } else{ echo "submit";} ?>" name="submit4" class="btn btn-lg btn-info " 
                                                     value="Submit" <?php if(isset($_GET['id'])){ 
                                                      echo "disabled"; }?> style="width:100%" >
                                              
                                                                                           
                                                </input>
                                                <input id="payment-button1" type="<?php if(isset($_GET['id'])){
                                                    echo "submit";
                                                 } else{echo "hidden";}?>"  name="edit" class="btn btn-lg btn-info"  value="edit" style="width:100%">
                                                                                                                                       
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
                                    <h1>Categories Information</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                             <th>Name</th>
                                              <th>Image</th>    
                                        <th>Edit</th>
                                        <th>Delete</th>     
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                     $read="SELECT * FROM category";
                                     $result=mysqli_query($connect,$read);

                                     while($new=mysqli_fetch_assoc($result)){

                                        echo "<tr>";
                                        echo "<td>{$new['cat_id']}</td>";
                                        echo "<td>{$new['cat_name']}</td>";
                                        echo "<td><img src='images/items/{$new['cat_image']}' style='width:100px;height:100px;' </td>";

                                        echo "<td><a href='manage_category.php?id={$new['cat_id']}' class='btn btn-warning' name='e'> <i class='zmdi zmdi-edit' >Edit</i></a></td>";
                                        echo "<td><a href='manage_category.php?id1={$new['cat_id']}' class='btn btn-danger' name='delete' > <i class='zmdi zmdi-delete'   >Delete</i></a></td>";
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
