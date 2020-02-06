<<<<<<< HEAD
<!DOCTYPE html>

<?php
session_start();
include("functions/functions.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel = "stylesheet" href = "Styles/style.css" media = "all"/>


    <title>My Online Store</title>
</head>
<body>
    <div class="main_wrapper">
        <div class="header_wrapper">
            
            <a href="index.php"><img src="Images/OnlineShop.jpg" id = "OnlineShop" width = 200 height = 120 alt="#"></a>
            <img src="Images/AdBanner.gif" id = "Adbanner" alt="#" width = 800 height = 120>
            
        </div>

        <div class="menubar">

        <ul id = "menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All Products</a></li>
            <li><a href="Customer/my_account.php">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>

        <div id = "form"> 
            <form method = "get" action="Searchresults.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder = "Search Product">
                <input type="submit" name="search" value="Search">
        
            </form>
        </div>
        </div>
        <div class="content_wrapper">

            <div id = "sidebar" class="sidebar">

                <div id="sidebar_title">Categories</div>
                
                <ul id="cats">
                <?php getCats(); ?>
                </ul>

                <div id="sidebar_title">Brands</div>
                <ul id="cats">
                <?php getBrands(); ?>
                </ul>

            </div>

            <div id = "content_area" class="content_area">
               <?php cart(); ?>
                <div id = "shopping_cart">
                    <span style = "float:right ;font-size:18px ;padding:5px ;line-height:40px;">
                    Welcome Guest! <b style="color:yellow;">Shopping Cart - </b>Total Items: <?php total_items();?> 
                    Total Price: <?php total_price(); ?>  
                    <a href = "cart.php" style="color:yellow">Go to Cart</a>
                    </span>
                </div>
            
                <div id = "product_box">
                <br>
                         <form action="" method = "post" enctype =  "multipart/form-data">
                              <table align="center" width = 700 bgcolor = "pink">            
                                   <tr align="center">
                                        <th>Remove</th>
                                        <th>Product(s)</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                   </tr>                  
                                   <?php
                                        $total =0;
                                        global $con;
                                        $ip = getIp();
                                    
                                        $sel_price = "select * from cart where ip_addr = '$ip'";
                                        $run_price = mysqli_query($con,$sel_price);
                                    
                                        while($p_price = mysqli_fetch_array($run_price)){
                                            $pro_id = $p_price['p_id'];
                                    
                                            $pro_price = "select * from products where product_id='$pro_id'";
                                            $run_pro_price = mysqli_query($con,$pro_price);
                                            while($pp_price = mysqli_fetch_array($run_pro_price)){
                                                $product_price = array($pp_price['product_price']);
                                                $product_title = $pp_price['product_title'];
                                                $product_image = $pp_price['product_image'];
                                                $single_price = $pp_price['product_price'];
                                                $values = array_sum($product_price);
                                                $total += $values;

                                        
                                    
                                   ?>

                                   <tr align="center" >
                                        <td ><input type="checkbox" name = "remove[]" value = "<?php echo $pro_id; ?> "></td>
                                        <td>
                                             <?php echo $product_title; ?><br>
                                             <img src="Admin/product_images/<?php echo $product_image;?>" alt="#" width = 60 height = 60> 
                                        </td>
                                        <td><input type="text" size=4 name ="qty" value = "<?php echo $_SESSION['qty']; ?>"></td>
                                   
                                        <?php 
                                             if(isset($_POST['update_cart'])) {
                                                  $qty = $_POST['qty'];
                                                  $update_qty = "update cart set qty = '$qty'";
                                                  $run_qty = mysqli_query($con,$update_qty);
                                                  $_SESSION['qty'] = $qty;

                                                  $total = $total * $qty;

                                             }
                                        
                                        ?>
                                        <td><?php echo "Rs " . $single_price; ?></td>
                                   
                                   </tr>

                                   
                                   <?php } }?>
                                   <tr align = "right">
                                        <td colspan = 4 ><b>Sub Total : </b></td>
                                        <td colspan = 4 ><b><?php echo $total;?> </b></td>
                                   </tr>
                                   <tr align = "center">
                                        <td colspan = 2> <input type="submit" name = "update_cart" value = "Update Cart"></td>
                                        <td><input type="submit" name = "continue" value = "Continue Shoppingt"></td>
                                        <td><a href="checkout.php" style = " text-decoration:none;color:black;"><button>Checkout</a></button></td>
                                   </tr>
                              </table>
                         
                         </form>

                         <?php 
                         function updatecart() { global $con;
                         $ip = getIp();
                              if(isset($_POST['update_cart'])) {
                                   foreach($_POST['remove'] as $remove_id) {
                                        $delete_product = "delete from cart where  p_id = '$remove_id' and ip_addr = '$ip'";
                                        $run_delete = mysqli_query($con,$delete_product);
                                        if ($run_delete) {
                                             echo "<script>window.open('cart.php','_self')</script>";
                                        }

                                   }
                              }

                              if(isset($_POST['continue'])) {
                                   
                                   echo "<script>window.open('index.php','_self')</script>";
                              }
                         }
                         echo @$up_cart = updatecart();
                         
                         ?>
                </div>
                </div>

        </div>

        <div id = "footer">
            <h2 style="text-align:center;
                        padding-top:40px;">&copy; 2020 by www.OnlineShopping.com</h2>
        </div>
    </div>
</body>
=======
<!DOCTYPE html>

<?php
session_start();
include("functions/functions.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel = "stylesheet" href = "Styles/style.css" media = "all"/>


    <title>My Online Store</title>
</head>
<body>
    <div class="main_wrapper">
        <div class="header_wrapper">
            
            <a href="index.php"><img src="Images/OnlineShop.jpg" id = "OnlineShop" width = 200 height = 120 alt="#"></a>
            <img src="Images/AdBanner.gif" id = "Adbanner" alt="#" width = 800 height = 120>
            
        </div>

        <div class="menubar">

        <ul id = "menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All Products</a></li>
            <li><a href="Customer/my_account.php">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>

        <div id = "form"> 
            <form method = "get" action="Searchresults.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder = "Search Product">
                <input type="submit" name="search" value="Search">
        
            </form>
        </div>
        </div>
        <div class="content_wrapper">

            <div id = "sidebar" class="sidebar">

                <div id="sidebar_title">Categories</div>
                
                <ul id="cats">
                <?php getCats(); ?>
                </ul>

                <div id="sidebar_title">Brands</div>
                <ul id="cats">
                <?php getBrands(); ?>
                </ul>

            </div>

            <div id = "content_area" class="content_area">
               <?php cart(); ?>
                <div id = "shopping_cart">
                    <span style = "float:right ;font-size:18px ;padding:5px ;line-height:40px;">
                    Welcome Guest! <b style="color:yellow;">Shopping Cart - </b>Total Items: <?php total_items();?> 
                    Total Price: <?php total_price(); ?>  
                    <a href = "cart.php" style="color:yellow">Go to Cart</a>
                    </span>
                </div>
            
                <div id = "product_box">
                <br>
                         <form action="" method = "post" enctype =  "multipart/form-data">
                              <table align="center" width = 700 bgcolor = "pink">            
                                   <tr align="center">
                                        <th>Remove</th>
                                        <th>Product(s)</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                   </tr>                  
                                   <?php
                                        $total =0;
                                        global $con;
                                        $ip = getIp();
                                    
                                        $sel_price = "select * from cart where ip_addr = '$ip'";
                                        $run_price = mysqli_query($con,$sel_price);
                                    
                                        while($p_price = mysqli_fetch_array($run_price)){
                                            $pro_id = $p_price['p_id'];
                                    
                                            $pro_price = "select * from products where product_id='$pro_id'";
                                            $run_pro_price = mysqli_query($con,$pro_price);
                                            while($pp_price = mysqli_fetch_array($run_pro_price)){
                                                $product_price = array($pp_price['product_price']);
                                                $product_title = $pp_price['product_title'];
                                                $product_image = $pp_price['product_image'];
                                                $single_price = $pp_price['product_price'];
                                                $values = array_sum($product_price);
                                                $total += $values;

                                        
                                    
                                   ?>

                                   <tr align="center" >
                                        <td ><input type="checkbox" name = "remove[]" value = "<?php echo $pro_id; ?> "></td>
                                        <td>
                                             <?php echo $product_title; ?><br>
                                             <img src="Admin/product_images/<?php echo $product_image;?>" alt="#" width = 60 height = 60> 
                                        </td>
                                        <td><input type="text" size=4 name ="qty" value = "<?php echo $_SESSION['qty']; ?>"></td>
                                   
                                        <?php 
                                             if(isset($_POST['update_cart'])) {
                                                  $qty = $_POST['qty'];
                                                  $update_qty = "update cart set qty = '$qty'";
                                                  $run_qty = mysqli_query($con,$update_qty);
                                                  $_SESSION['qty'] = $qty;

                                                  $total = $total * $qty;

                                             }
                                        
                                        ?>
                                        <td><?php echo "Rs " . $single_price; ?></td>
                                   
                                   </tr>

                                   
                                   <?php } }?>
                                   <tr align = "right">
                                        <td colspan = 4 ><b>Sub Total : </b></td>
                                        <td colspan = 4 ><b><?php echo $total;?> </b></td>
                                   </tr>
                                   <tr align = "center">
                                        <td colspan = 2> <input type="submit" name = "update_cart" value = "Update Cart"></td>
                                        <td><input type="submit" name = "continue" value = "Continue Shoppingt"></td>
                                        <td><a href="checkout.php" style = " text-decoration:none;color:black;"><button>Checkout</a></button></td>
                                   </tr>
                              </table>
                         
                         </form>

                         <?php 
                         function updatecart() { global $con;
                         $ip = getIp();
                              if(isset($_POST['update_cart'])) {
                                   foreach($_POST['remove'] as $remove_id) {
                                        $delete_product = "delete from cart where  p_id = '$remove_id' and ip_addr = '$ip'";
                                        $run_delete = mysqli_query($con,$delete_product);
                                        if ($run_delete) {
                                             echo "<script>window.open('cart.php','_self')</script>";
                                        }

                                   }
                              }

                              if(isset($_POST['continue'])) {
                                   
                                   echo "<script>window.open('index.php','_self')</script>";
                              }
                         }
                         echo @$up_cart = updatecart();
                         
                         ?>
                </div>
                </div>

        </div>

        <div id = "footer">
            <h2 style="text-align:center;
                        padding-top:40px;">&copy; 2020 by www.OnlineShopping.com</h2>
        </div>
    </div>
</body>
>>>>>>> 826d842434e84e842a44bae2589ad6180cff7b86
</html>