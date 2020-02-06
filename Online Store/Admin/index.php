<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel = "stylesheet" type = 'text/css' href ='Styles/styles.css' media = 'all'> 
     <title>Admin Portal</title>
</head>
<body>
     <div class = "main_wrapper">
          <div id="header">
          
          
          </div>

        
          <div id="left">
               <?php
                    if(isset($_GET['insert_product'])){
                         include('insert_product.php');
                    }
                    if(isset($_GET['view_products'])){
                         include('view_products.php');
                    }
                    if(isset($_GET['edit_pro'])){
                         include('edit_pro.php');
                    }
               
               
               
               ?>


          </div>
          <div id="right">
               <h2 style = "text-align:center;">Manage Content</h2>

               <a href="index.php?insert_product">Insert Product</a>
               <a href="index.php?view_products">View Product</a>
               <a href="index.php?insert_cat">Insert New Categories</a>
               <a href="index.php?view_cats">View All Categories</a>
               <a href="index.php?insert_brand">Insert New Brands</a>
               <a href="index.php?view_brands">View All Brands</a>
               <a href="index.php?view_customers">View Customers</a>
               <a href="index.php?view_orders">View Orders</a>
               <a href="index.php?view_payments">View Payments</a>
               <a href="logout.php">Admin Logout</a>



          </div>
     
     
     </div>
</body>
</html>