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
                    <form action="customer_register.php" method = "post" enctype = "multipart/form-data">
                         <table align = "center" width = 750 >
                              <tr align = "center" >
                                   <td colspan = 6><h2>Create an Account</h2></td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer Name : </td>
                                   <td><input type="text" name = "c_name"></td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer Email : </td>
                                   <td><input type="text" name = "c_email"></td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer Password</td>
                                   <td><input type="password" name = "c_pass"></td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer Image:</td>
                                   <td><input type="file" name = "c_image"></td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer Country:</td>
                                   <td>
                                        <select name="c_country" id="">
                                             <option value="">Select a country</option>
                                             <option value="india">India</option>
                                             <option value="afghanistan">Afghanistan</option>
                                             <option value="japan">Japan</option>
                                             <option value="nepal">Nepal</option>
                                             <option value="usa">USA</option>
                                             <option value="uk">UK</option>
                                             <option value="pakistan">Pakistan</option>
                                             <option value="australia">Australia</option>
                                             <option value="canada">Canada</option>
                                        
                                        </select>
                                   </td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer City:</td>
                                   <td><input type="text" name = "c_city"></td>
                              </tr>
                         
                              <tr>
                                   <td align = "right">Customer Contact:</td>
                                   <td><input type="text" name = "c_contact"></td>
                              </tr>

                              <tr>
                                   <td align = "right">Customer Address:</td>
                                   <td><input type = "text" name="c_address" ></td>
                              </tr>

                             
                         
                              <tr align = "center" >
                                   <td colspan = 6><input type="submit" name = "register" value = " Create Account"></td>
                              </tr>
                         </table>
                    
                    </form>
         
                </div>

        </div>

        <div id = "footer">
            <h2 style="text-align:center;
                        padding-top:40px;">&copy; 2020 by www.OnlineShopping.com</h2>
        </div>
    </div>
</body>
</html>

<?php

     if(isset($_POST['register'])) {
          $ip = getIp();
          $c_name = $_POST['c_name'];
          $c_email = $_POST['c_email'];
          $c_pass = $_POST['c_pass'];
          $c_country = $_POST['c_country'];
          $c_city = $_POST['c_city'];
          $c_contact = $_POST['c_contact']; 
          $c_address = $_POST['c_address'];
          $c_image = $_FILES['c_image']['name'];
          $c_image_tmp = $_FILES['c_image']['tmp_name'];

          move_uploaded_file($c_image_tmp,"Customer/customer_images/'$c_image'");

          insert_c = "";

          $run_c = mysqli_query($con,$insert_c);

          $sel_cart = "select * from cart where ip_addr = '$ip'";

          $run_cart = mysqli_query($con,$sel_cart);

          $check_cart = mysqli_num_rows($run_cart);

          if ($check_cart == 0) {
               $_SESSION['customer_email'] = $c_email;
               echo '<script>alert("Account Created Successfully ");</script>';
               echo '<script>window.open("Customer/myaccount.php","_self");</script>';
          }

          else {
               $_SESSION['customer_email'] = $c_email;
               echo '<script>alert("Account Created Successfully ");</script>';
               echo '<script>window.open("checkout.php","_self");</script>';
          }


     }


?>