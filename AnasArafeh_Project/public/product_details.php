<?php  

  session_start();
    ob_start();
    require('connection.php'); 
include_once('header.php');


  
    $path="../admin/images/items/";
 $query="SELECT * FROM product where product_id={$_GET['id']}";
    $result=mysqli_query($connect,$query);

    if(isset($_POST['addtocart'])){

    	if(count($_SESSION['cart'])>=10){

        echo "<h1>You can't buy more than 10 times in the same Purchase</h1>";
     }else{
    	
    array_push($_SESSION['cart'],$_GET['id']);
   		}
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

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">
    	<?php
        //<!-- Single Product Thumb -->
        while ($new=mysqli_fetch_assoc($result)) {
        	# code...   
        echo"<div class='single_product_thumb clearfix'>
            <div class='product_thumbnail_slides owl-carousel'>
                <img src='$path{$new['product_image']}' style='width:900px;height:500px;' alt=''>
                <img src='$path{$new['product_image']}' style='width:900px;height:500px;' alt=''>            
            </div>
        </div>";

       // <!-- Single Product Description -->
       echo "<div class='single_product_desc clearfix'>
            <span>mango</span>
            <a href='cart.html'>
                <h2>{$new['product_name']}</h2>
            </a>
            <p class='product-price'><p style='display:inline;'>$</p>{$new['product_price']}</p>
            <p class='product-desc'>{$new['product_desc']}</p>";

           // <!-- Form -->
           echo "<form class='cart-form clearfix' method='post'>";
               // <!-- Cart & Favourite Box -->
                echo"<div class='cart-fav-box d-flex align-items-center'>";
                  //  <!-- Cart -->
                  echo "<button type='submit' style='margin: 20px;' name='addtocart' value='5' class='btn essence-btn'>Add to cart</button>";
                  echo "<a href='index.php' class='btn essence-btn'>Back to Shopping</a>";
                   // <!-- Favourite -->
                  echo "<div class='product-favourite ml-4'>
                        <a href='#'' class='favme fa fa-heart'></a>
                    </div>
                </div>
            </form>
        </div>";
         }
        ?>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php
include_once('footer.php');
?>