<?php

    session_start();
    ob_start();
    require('connection.php'); 





if(!isset($_SESSION['id'])){

	header("location:check.php");

}
if(isset($_SESSION['id'])){

	$user_id=$_SESSION['id'];
	$products=array();
               // 
	foreach ($_SESSION['cart'] as $key => $value ) {
		
		$products[]=$value;

		$query0="SELECT vendor_id FROM product where product_id=$value";
		$result0=mysqli_query($connect,$query0);
		$v_id=mysqli_fetch_assoc($result0);

		foreach ($v_id as $key => $value) {

			$ve_id[]=$value;

		}


	}

	// foreach ($ve_id as $key => $vendor_id) {

	// 	echo($vendor_id)."<br>";

	// }

	$vendor_id=implode(",", $ve_id);
	$product_id=implode(",", $products);
	
	$date=date("Y-m-d");
	        
	$insert="INSERT INTO orders
	(order_date,user_id,vendor_id,product_id)
	value('$date','$user_id','$vendor_id','$product_id')";

	$result3=mysqli_query($connect,$insert);                 

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title  -->
	<title>Receipt</title>

	<!-- Favicon  -->
	<link rel="icon" href="img/core-img/favicon.ico">
	<!-- Core Style CSS -->
	<link rel="stylesheet" href="css/core-style.css">
	<link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">Shop</a>

                            </li>
                            <li><a href="#">Pages</a>

                            </li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <?php if(isset($_SESSION['id'])){ 

                        echo "<a href='logout_customer.php'>Log Out</a>";
                        }
                        else{

                          echo "<a href='login_customer.php'>Sign in</a>";  
                        }
                    ?>
                </div>
                <!-- Cart Area -->
            </div></div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
 
    
      <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Receipt</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <br> <br>
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-5">
	<div  class=" ml-lg-auto">
		<div class="order-details-confirmation">

			<ul class='order-details-form mb-4'>

				<?php

				$query="SELECT max(order_id) FROM orders";
				$result=mysqli_query($connect,$query); 
				$x=mysqli_fetch_assoc($result);

				foreach ($x as $key) {

					$query1="SELECT * FROM orders WHERE order_id=$key";
					$result1=mysqli_query($connect,$query1);
					$y=mysqli_fetch_assoc($result1);
				}

				$query2="SELECT * FROM user WHERE user_id={$y['user_id']}";
				$result2=mysqli_query($connect,$query2);
				$k=mysqli_fetch_assoc($result2);

				$total=0;  

				foreach ($_SESSION['cart'] as $key1 => $value1 ) {
					$query6="SELECT * FROM product where product_id=$value1";
					$result6=mysqli_query($connect,$query6);
					$u=mysqli_fetch_assoc($result6);
					$total=$total+$u['product_price'];
				}   

			?>	
				<li><span>Order ID: </span> <span><?php echo $key; ?></span></li>
				<li><span>Full Name: </span> <span><?php echo $k['user_fullname']; ?></span></li>
				<li><span>Mobile: </span> <span><?php echo $k['user_mobile']; ?></span></li>
				<li><span>Email: </span> <span><?php echo $k['user_email']; ?></span></li>
				<li><span>Address: </span> <span><?php echo $k['user_address']; ?></span></li>
				<li><span>Items: </span> <span>

			<?php 
				$count=1;
				foreach ($_SESSION['cart'] as $key5 => $value5) {
    
					$query8="SELECT product_name 
					FROM product WHERE product_id = $value5";
					$result8=mysqli_query($connect,$query8);
					$product_name=mysqli_fetch_assoc($result8);

					echo "<br>"." "."Item number $count :"."<br>".$product_name['product_name']."<br>";
					$count++;
				}

				?>

			</span></li>
			<li><span>total: </span><span><span>$</span><?php echo $total; ?></span></li>

		</ul>
	</div>
</div>

<a href="index.php" class="btn essence-btn" style="float:right;margin-right: 231px;
    margin-top: 20px;
 ">Go back to main</a> <br> <br> <br> <br> <br>
    
</div>
</div>    
<?php 
    include_once('footer.php');
    
?>
    

