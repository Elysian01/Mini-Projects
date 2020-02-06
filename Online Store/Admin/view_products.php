<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <table width = "795" style = "border-style:outline; border-width:5px;border-color:black;" align = center bgcolor = "pink" >
          <tr align=center>
               <th colspan =6><h2>View All Products here</h2></th>
          </tr>
          <tr align = center bgcolor = "skyblue">
               <th>S.N</th>
               <th>Title</th>
               <th>Image</th>
               <th>Price</th>
               <th>Edit</th>
               <th>Delete</th>
          </tr>

          <?php
               include("includes/db.php");

               $get_pro = "select * from products";

               $run_pro = mysqli_query($con,$get_pro);

               $i = 0;

               while ($row_pro = mysqli_fetch_array($run_pro)){
                    $product_id = $row_pro['product_id'];
                    $product_title = $row_pro['product_title'];
                    $product_price = $row_pro['product_price'];
                    $product_image = $row_pro['product_image'];
                    $i++;

          ?>

          <tr align = center>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="product_images/<?php echo $product_image; ?>"alt="" width= 80px height = 80px></td>
                    <td><?php echo $product_price; ?></td>
                    <td><a href="index.php?edit_pro=<?php echo $product_id; ?>">Edit</a></td>
                    <td><a href="delete_pro.php?delete_pro=<?php echo $product_id; ?>">Delete</a></td>

          </tr>
               <?php } ?>

     </table>
</body>
</html>


