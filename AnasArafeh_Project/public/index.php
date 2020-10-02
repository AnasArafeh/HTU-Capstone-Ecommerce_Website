<?php 

    session_start();
    ob_start();
    require('connection.php'); 
include_once('header.php');

 $query="SELECT * FROM category";
    $result=mysqli_query($connect,$query);

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

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <?php
                
                while ($new=mysqli_fetch_assoc($result)) {
                    
                
                echo "<div class='col-12 col-sm-6 col-md-4'>
                    <div class='single_catagory_area d-flex align-items-center justify-content-center bg-img' style='background-image: url($path{$new['cat_image']});'>
                        <div class='catagory-content'>
                         <a href='shop.php?id={$new['cat_id']}'>{$new['cat_name']}</a>";
                 echo  "</div></div></div>";
                    
                }
                ?>      
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/bg-5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="#" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
     

    
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <h3>Adidas</h3>
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
             <h3>Samsung</h3>
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
              <h3>HP</h3>
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
              <h3>Wilson</h3>
            
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
              <h3>Champion</h3>
         
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
              <h3>Logitech</h3>
          
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php 
    include_once('footer.php');
    ?>