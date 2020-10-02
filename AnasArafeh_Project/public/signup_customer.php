<?php
  session_start();
    ob_start();
    require('connection.php'); 

if(isset($_POST['submit'])){

 $name=$_POST['fullname'];
 $email	=$_POST['email'];
 $password=$_POST['password'];
 $address=$_POST['address'];
 $mobile=$_POST['mobile'];
 	
 	$insert="INSERT INTO user(user_fullname,user_email,user_password,user_mobile,user_address)
 						 value('$name','$email','$password','$mobile','$address')";
 	mysqli_query($connect,$insert);					  
 	header("Location: login_customer.php");
}






?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sign up customer</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <!-- Fontfaces CSS-->
    <link href="../admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../admin/css/theme.css" rel="stylesheet" media="all">
</head>
<body>

      <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                           
                               <h2> Customer Register<h2>
                          
                        </div>
                        <div class="login-form">
                                <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" class="form-control" name="fullname"  value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Password <span>*</span></label>
                                    <input type="password" class="form-control" name="password"   value="" required>
                                </div>                      
                                                                      
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Mobile <span>*</span></label>
                                    <input type="text" class="form-control" name="mobile"  min="0" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" name="email"  value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" name="address"  value="" required>
                                   
                                </div>
                                <div>

                                 <button class="au-btn au-btn--block au-btn--green m-b-20 ml-3" style="display:inline-block;width:480px;" name="submit" type="submit">sign up</button> 
                            
                                 
                                   
                                </div>    
                            </div>
                        </form>
                                <a href="login_customer.php" style="display:inline-block;width:480px;font-size:16px" > <input class="au-btn au-btn--block au-btn--green m-b-20" name="submit2" type="submit" value="sign in"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




 

  <script src="../admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../admin/vendor/slick/slick.min.js">
    </script>
    <script src="../admin/vendor/wow/wow.min.js"></script>
    <script src="../admin/vendor/animsition/animsition.min.js"></script>
    <script src="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../admin/js/main.js"></script>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
</html>