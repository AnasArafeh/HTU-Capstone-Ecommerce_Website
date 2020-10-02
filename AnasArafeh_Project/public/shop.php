<?php 

  session_start();
    ob_start();
    require('connection.php'); 
include_once('header.php');

    $query="SELECT * FROM product where product.cat_id={$_GET['id']} AND status='active'";
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

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>dresses</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <?php
                                $cat="SELECT * from category";
                                $cquery=mysqli_query($connect,$cat);
                                while($cdata=mysqli_fetch_assoc($cquery)){

                                    echo "<h6 style='font-weight: 400 !important;'><a style='font-size:14px;font-weight: 400 !important;' href='shop.php?id=$cdata[cat_id]'>$cdata[cat_name]</a></h6><br>";


                                }



                             ?>
                          
                            <div class="catagories-menu">

                            </div>
                        </div>

  
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <?php  

                                    $pro_found="SELECT count(product_id) FROM product where product.cat_id={$_GET['id']} AND status='active'";
                                    $pro_result=mysqli_query($connect,$pro_found);
                                    $pro_total=mysqli_fetch_assoc($pro_result);
                                    
                                    foreach ($pro_total as $key => $value) {
                                    
                                    }
                                  echo "  <div class='total-products'>
                                        <p><span>$value</span> products found</p>
                                    </div>";
                                    ?>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        	<?php

                           while ($new=mysqli_fetch_assoc($result)) {
                           			  
                            $vendor="SELECT vendor_name FROM vendor WHERE vendor_id=$new[vendor_id]";
                            $vquery=mysqli_query($connect,$vendor);
                             $vendor_name=mysqli_fetch_assoc($vquery);
                           echo "<div class='col-12 col-sm-6 col-lg-4'>
                                 <div class='single-product-wrapper'>
                                 
                                    <div class='product-img'>
                                        <img src='$path{$new['product_image']}' style='width:250px;height:250px;' alt=''>
                                                                                                              
                                        <div class='product-favourite'>
                                            <a href='#' class='favme fa fa-heart'></a>";
                                  echo     "</div></div>";
                                    
                                 
                                 //   <!-- Product Description -->
                                  echo  "<div class='product-description'>
                                        <span>{$vendor_name['vendor_name']}</span>
                                        <a href='product_details.php?id={$new['product_id']}'>
                                            <h6>{$new['product_name']}</h6>
                                        </a>
                                        <p class='product-price'><p style='display:inline;'>$</p>{$new['product_price']}</p>";

                                     //   <!-- Hover Content -->
                                     //   <!-- Add to Cart -->
                                     echo " <div class='hover-content'>
                                         
                                            <div class='add-to-cart-btn'>
                                            <form action='product_details.php?id={$new['product_id']}' method='post'> 

                                             <input type='submit' name='addtocart' value='Add to Cart' class='btn essence-btn ><a href='' ></form>";

                                  echo  "</div></div></div></div></div>";
                                                                                                                                   
                            }
                            ?>                       
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php  include_once('footer.php') ;  ?>