<?php
    ob_start();
    include_once("project/header.php");
    require("project/connection.php");

   if(isset($_POST['submit2'])){

 $name=$_POST['fullname'];
 $email =$_POST['email'];
 $password=$_POST['password'];
 $address=$_POST['address'];
 $mobile=$_POST['mobile'];
    
    $insert="INSERT INTO user(user_fullname,user_email,user_password,user_mobile,user_address)
                         value('$name','$email','$password','$mobile','$address')";
    mysqli_query($connect,$insert);                   
    header("Location: manage_customer.php");
}

if(isset($_GET['id1'])){

    

    $delete= "DELETE FROM user WHERE user_id={$_GET['id1']}";
    mysqli_query($connect,$delete);
    header("Location:manage_customer.php");

}

if(isset($_GET['id'])){


   $query="SELECT * FROM user WHERE user_id={$_GET['id']}";
   $result=mysqli_query($connect,$query);
   $new=mysqli_fetch_assoc($result);
    }

if(isset($_POST['edit'])){
     
     
     $name=$_POST['fullname'];
     $email=$_POST['email'];
     $password=$_POST['password']; 
     $mobile=$_POST['mobile']; 
     $address=$_POST['address']; 
     $edit="UPDATE user SET user_email     ='$email',
                            user_password  ='$password',
                            user_mobile    ='$mobile',
                            user_address   ='$address',
                            user_fullname  ='$name'
                            WHERE user_id  ={$_GET['id']}";
             mysqli_query($connect,$edit);

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
                                              <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">FullName</label>
                                                <input id="cc-pament" name="fullname" type="text" class="form-control" value="<?php if(isset($_GET['id'])){ echo $new['user_fullname'];}?>" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                <input id="cc-name" name="email" type="text" class="form-control cc-name " value="<?php if(isset($_GET['id'])){ echo $new['user_email'];}?>" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Password</label>
                                                <input id="cc-number" name="password" type="password" class="form-control cc-number " value="<?php if(isset($_GET['id'])){ echo $new['user_password'];}?>" required>
                                                
                                            </div>
                                             <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Mobile</label>
                                                <input id="cc-number" name="mobile" type="text" class="form-control cc-number" value="<?php if(isset($_GET['id'])){ echo $new['user_mobile'];}?>" required>
                                            
                                            </div>
                                             <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Address</label>
                                                <input id="cc-number" name="address" type="text" class="form-control cc-number " value="<?php if(isset($_GET['id'])){ echo $new['user_address'];}?>" required> 
                                            </div>
                                            <div>
                                                  <input id="payment-button" type="<?php 
                                                 if(isset($_GET['id'])){ 

                                                    echo "hidden";

                                                }
                                                     else{
                                                        echo "submit";
                                                     }
                                                     ?>" name="submit2" class="btn btn-lg btn-info " 
                                                     value="Submit" <?php if(isset($_GET['id'])){ 
                                                      echo "disabled"; }?> style="width:100%" >
                                              
                                                                                           
                                                </input>
                                                <input id="payment-button1" type="<?php if(isset($_GET['id'])){
                                                    echo "submit"; } else{ echo "hidden"; }?>" name="edit" class="btn btn-lg btn-info" value="edit" style="width:100%">
                                                                                                                                       
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
                                        <th>Email</th>                                      
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                      $read="SELECT * FROM user";
                                     $result=mysqli_query($connect,$read);
                                     while($new=mysqli_fetch_assoc($result)){

                                        echo "<tr>";
                                        echo "<td>{$new['user_id']}</td>";
                                        echo "<td>{$new['user_fullname']}</td>";
                                        echo "<td>{$new['user_email']}</td>";
                                        echo "<td>{$new['user_mobile']}</td>";
                                        echo "<td>{$new['user_address']}</td>";
                                        echo "<td><a href='manage_customer.php?id={$new['user_id']}' class='btn btn-warning' name='e'> <i class='zmdi zmdi-edit' >Edit</i></a></td>";
                                        echo "<td><a href='manage_customer.php?id1={$new['user_id']}' class='btn btn-danger' name='delete'  > <i class='zmdi zmdi-delete'  >Delete</i></a></td>";
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
