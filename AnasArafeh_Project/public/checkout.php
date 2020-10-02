<?php
 session_start();
    ob_start();
    require('connection.php'); 

 include_once('header.php'); 

if(!isset($_SESSION['id'])){

            header("location:check.php");

        }

?>
  <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span><?php
            $i=0;
             foreach ($_SESSION['cart'] as $key ) { 
                $i++;
             }
             echo $i;
                ?></span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span><?php
            $i=0;
             foreach ($_SESSION['cart'] as $key ) { 
                $i++;
             }
             echo $i;
                ?></span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                 <?php
             
             if(isset($_SESSION['cart'])){
                
                    $total=0;
                foreach ($_SESSION['cart'] as $key => $value){
                    $query1="SELECT * FROM product where product_id=$value";
                    $result1=mysqli_query($connect,$query1);
                    $u=mysqli_fetch_assoc($result1);
                    $total=$total+$u['product_price'];
              echo "<form class='cart-form clearfix' method='post' action=''>
                    <button type='submit' name='removeCart' value='$key' class='product-remove' ><i class='fa fa-close' ></i></button>  
                <div class='single-cart-item'>
                    <a href='#' class='product-image'>
                        <img src='$path{$u['product_image']}' style='height:111px;' class='cart-thumb' alt=''>
                        
                        <div class='cart-item-desc'>
                        
                          
                            <span class='badge'>Mango</span>
                            <h6>{$u['product_name']}</h6>
                            <p class='size'>Size: S</p>
                            <p class='color'>Color: Red</p>
                            <p class='price'>{$u['product_price']}</p>
                        </div>
                    </a>
                </div> </form>";
              
               }
           }
             echo "</div>

            <!-- Cart Summary -->
            <div class='cart-amount-summary'>

                <h2>Summary</h2>
                <ul class='summary-table'>
                
                    <li><span>delivery:</span> <span>Free</span></li>                  
                    <li><span>total:</span> <span>$<span>$total</span></span></li>
                </ul>
                <div class='checkout-btn mt-100'>
                    <a href='checkout.php' class='btn essence-btn'>check out</a>
                </div>";

                 ?>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                            	<?php  
                            
                            		$query1="SELECT * FROM user where user_id={$_SESSION['id']}";
                            		$result1=mysqli_query($connect,$query1);
             						$u=mysqli_fetch_assoc($result1);

                            	?>
                               <div class="col-md-6 mb-3">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" class="form-control" name="fullname"  
                                    value="<?php if(isset($_SESSION['id'])){ echo $u['user_fullname'];}?>" disabled>
                                </div>
                                       
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Mobile <span>*</span></label>
                                    <input type="text" class="form-control" name="mobile"  min="0" 
                                    value="<?php if(isset($_SESSION['id'])){ echo $u['user_mobile'];}?>" disabled>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" name="email"  
                                    value="<?php if(isset($_SESSION['id'])){ echo $u['user_email'];}?>" disabled>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" name="address"  
                                    value="<?php if(isset($_SESSION['id'])){ echo $u['user_address'];}?>" disabled>
                                   
                                </div>
                                      
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>
                        <ul class='order-details-form mb-4'>
                        <li><span>Product</span> <span>Total</span></li>
                        <?php
                        $total=0;
                        foreach ($_SESSION['cart'] as $key => $value ) {
             			$query1="SELECT * FROM product where product_id=$value";
             			$result1=mysqli_query($connect,$query1);
             			$u=mysqli_fetch_assoc($result1);
             			$total=$total+$u['product_price'];

                       echo "
                            
                            <li><span>$u[product_name]</span> <span><span>$</span>$u[product_price]</span></li>
                            
                       			 ";
                   			 }
                            
                       echo "<li><span>Subtotal</span> <span><span>$</span>$total</span></li>
                           <li><span>Shipping</span> <span>Free</span></li>
                           <li><span>Total</span> <span><span>$</span>$total</span></li>
                        </ul>";

                        ?>
                        <div id="accordion" role="tablist" class="mb-4">
                           
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>        
                        </div>
                        <a style="margin: 20px; margin-left: 46px;" href="receipt.php" class="btn essence-btn">Place Order</a>
                        <a style="margin-left: 29px;" href="index.php" class="btn essence-btn">Back to Shopping</a>
                        </ul>
                </div>
            </div>
        </div>
    </div> <br> <br> <br> <br>
    
    <?php 
       include_once('footer.php'); 
        
        ?>