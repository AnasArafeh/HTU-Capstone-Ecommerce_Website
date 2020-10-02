<?php
    ob_start();
    include_once("project/header.php");
    require("project/connection.php");

    if(isset($_POST['submit'])){

 $name=$_POST['fullname'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 
    $insert="INSERT INTO admin(admin_email,admin_password,admin_fullname)
                         value('$email','$password','$name')";
    mysqli_query($connect,$insert);                   
    header("Location: manage_admin.php");
}

if(isset($_GET['id1'])){
    

    $delete= "DELETE FROM admin WHERE admin_id={$_GET['id1']}";
    mysqli_query($connect,$delete);
    header("Location:manage_admin.php");
}

if(isset($_GET['id'])){


   $query="SELECT * FROM admin WHERE admin_id={$_GET['id']}";
   $result=mysqli_query($connect,$query);
   $new=mysqli_fetch_assoc($result);
}

if(isset($_POST['edit'])){
     
     $name=$_POST['fullname'];
     $email=$_POST['email'];
     $password=$_POST['password'];  
     $edit="UPDATE admin SET admin_email    ='$email',
                             admin_password ='$password',
                             admin_fullname ='$name'
                             WHERE admin_id ={$_GET['id']}";
             mysqli_query($connect,$edit);
             header("Location:manage_admin.php");
   } 


?>
    
 <div class="basic-form-area mg-b-15 " >
            <div class="container-fluid" style="margin-left:300px;margin-right:300px;margin-top:50px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1 style="text-align: center;">Admin Form</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">FullName</label>
                                                <input id="cc-pament" name="fullname" type="text" class="form-control" value="<?php if(isset($_GET['id'])){ echo $new['admin_fullname'];}?>" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                <input id="cc-name" name="email" type="text" class="form-control cc-name valid" value="<?php if(isset($_GET['id'])){ echo $new['admin_email'];}?>" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Password</label>
                                                <input id="cc-number" name="password" type="password" class="form-control cc-number " value="<?php if(isset($_GET['id'])){ echo $new['admin_password'];}?>" required>
                                                
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
                                    <h1>Admin Information</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Full Name</th>
                                                <th>Email Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                     $read="SELECT * FROM admin";
                                     $result=mysqli_query($connect,$read);
                                     while($new=mysqli_fetch_assoc($result)){

                                        echo "<tr>";
                                        echo "<td>{$new['admin_id']}</td>";
                                        echo "<td>{$new['admin_fullname']}</td>";
                                        echo "<td>{$new['admin_email']}</td>";
                                        echo "<td><a href='manage_admin.php?id={$new['admin_id']}' class='btn btn-warning' name='e'> <i class='zmdi zmdi-edit' >Edit</i></a></td>";
                                        echo "<td><a href='manage_admin.php?id1={$new['admin_id']}' class='btn btn-danger' name='delete' > <i class='zmdi zmdi-delete'  >Delete</i></a></td>";
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
