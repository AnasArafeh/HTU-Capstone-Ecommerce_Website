
<?php 

  session_start();
    ob_start();
    require('connection.php'); 
include_once('header.php');

  

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
    <div class="contact-area d-flex align-items-center">
     
          
        <div class="google-map" >
            <div id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2011.976648384623!2d35.837059039215426!3d31.995390857534957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca1f24c4dafc7%3A0xb46b407c3d442e44!2z2YXYt9i52YUg2LnYp9mE2YrYqSDYp9mE2YXYsdmD2LLZig!5e0!3m2!1sar!2sjo!4v1601677105626!5m2!1sar!2sjo" width="1100" height="700" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
   
   
        <div class="contact-info">
            <h2>How to Find Us</h2>
            <p>Amman - Khalda circle - road 34 </p>

            <div class="contact-address mt-50">
                <p><span>address:</span> Amman Jordan</p>
                <p><span>telephone:</span> 0792548904</p>
                <p><a href="mailto:contact@essence.com">contact@AAA.com</a></p>
            </div>
        </div>
 
 </div>

   <?php 
include_once('footer.php');
?>