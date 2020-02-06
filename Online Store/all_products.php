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

            <div id = "content_area"class="content_area">
               
                <div id = "shopping_cart">
                    <span style = "float:right ;font-size:18px ;padding:5px ;line-height:40px;">
                    Welcome Guest! <b style="color:yellow;">Shopping Cart - </b>Total Items:  <?php total_items();?>  
                    Total Price: <?php total_price(); ?>  
                    <a href = "cart.php" style="color:yellow">Go to Cart</a>
                    </span>
                </div>
            
            
                <div id = "product_box">
                <?php
                    $get_pro = "select * from products";
                    $run_pro = mysqli_query($con,$get_pro);

                    while ($row_pro=mysqli_fetch_array($run_pro)){
                        $product_id = $row_pro['product_id'];
                        $product_cat = $row_pro['product_cat'];
                        $product_brand = $row_pro['product_brand'];
                        $product_title = $row_pro['product_title'];
                        $product_price = $row_pro['product_price'];
                        $product_image = $row_pro['product_image'];

                        echo "<div id = 'single_product'>
                                <h3>$product_title</h3>
                                <img src = 'Admin/product_images/$product_image' width = 180 height = 180 />
                                <p>Price : RS $product_price</p>
                                <a href = 'details.php?product_id=$product_id' style='float:left;'>Details</a>  
                                <a href = 'index.php?add_cart=$product_id'><button style='float:right;'>Add to Cart</button></a>
                                </div>";
                    }
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
</html>