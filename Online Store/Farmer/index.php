<!DOCTYPE html>

<?php
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
            
            <img src="Images/OnlineShop.jpg" id = "OnlineShop" width = 200 height = 120 alt="#">
            <img src="Images/AdBanner.gif" id = "Adbanner" alt="#" width = 800 height = 120>
            
        </div>

        <div class="menubar">

        <ul id = "menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">All Products</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>

        <div id = "form"> 
            <form method = "get" action="results.php" enctype="multipart/form-data">
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

            <div id = "content_area"class="content_area">
               
                <div id = "shopping_cart">
                    <span style = "float:right ;font-size:18px ;padding:5px ;line-height:40px;">
                    Welcome Guest! <b style="color:yellow;">Shopping Cart - </b>Total Items: Total Price:  
                    <a href = "cart.php" style="color:yellow">Go to Cart</a>
                    </span>
                </div>
            
            
                <div id = "product_box">
                    <?php getProduct();?>
                </div>
                </div>

        </div>

        <div id = "footer">
            <h2 style="text-align:center;
                        padding-top:40px;">&copy; 2020 by www.OnlineShopping.com</h2>
        </div>
    </div>
</body>
</html>