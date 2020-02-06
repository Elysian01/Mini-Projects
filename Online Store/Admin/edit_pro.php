<<<<<<< HEAD

<!DOCTYPE html>

<?php
include("includes/db.php");  // db connections

if(isset($_GET['edit_pro'])){
     $get_id = $_GET['edit_pro'];
     $get_pro = "select * from products where product_id = '$get_id'";

     $run_pro = mysqli_query($con,$get_pro);

     $row_pro = mysqli_fetch_array($run_pro);
     $pro_id = $row_pro['product_id'];
     $pro_title = $row_pro['product_title'];
     $pro_cat = $row_pro['product_cat'];
     $pro_brand = $row_pro['product_brand'];
     $pro_price = $row_pro['product_price'];
     $pro_desc = $row_pro['product_desc'];
     $pro_image = $row_pro['product_image'];
     $pro_keywords = $row_pro['product_keywords'];

     $get_cat = "select * from categories where cat_id = '$pro_cat' ";
     $run_cat = mysqli_query($con,$get_cat);
     $row_pro = mysqli_fetch_array($run_cat);
     $pro_cat = $row_pro['cat_title'];
     
     $get_brand = "select * from brands where brand_id = '$pro_brand' ";
     $run_brand = mysqli_query($con,$get_brand);
     $row_pro = mysqli_fetch_array($run_brand);
     $pro_brand = $row_pro['brand_title'];
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Script for Advance TextArea  -->
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="application/x-javascript">
    tinymce.init({selector:'textarea'});
    </script>

    <title>Update Product</title>
</head>
<body >
    
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border ="2">
            <tr align="center">
                <td colspan = 2><h2>Edit & Update Product</h2></td>
            </tr>

            <tr>
                <td align="center"><b>Product Title:</b></td>
                <td><input type="text" name="product_title" size = "60" value = "<?php echo $pro_title?>" required></td>
            </tr>

            <tr>
                <td align="center"><b>Product Categories:</b></td>
                <td>
                    <select name="product_cat" required>
                        <option><?php echo $pro_cat?></option>
                        <?php 
                                $get_cats = "select * from categories";

                                $run_cats =  mysqli_query($con,$get_cats);

                                while ($row_cats=mysqli_fetch_array($run_cats)){

                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                        ?>
                    </select>
                    </td>
            </tr>

            <tr>
                <td align="center"><b>Product Brand:</b></td>
                <td>
                    <select name="product_brand" required>
                    <option><?php echo $pro_brand?></option>
                        <?php 
                                $get_brands = "select * from brands";

                                $run_brands =  mysqli_query($con,$get_brands);

                                while ($row_brands=mysqli_fetch_array($run_brands)){

                                    $brand_id = $row_brands['brand_id'];
                                    $brand_title = $row_brands['brand_title'];

                                    echo "<option value='$brand_id'>$brand_title</option>";
                                }
                        ?>
                    </select>
                    </td>
            </tr>

            <tr>
                <td align="center"><b>Product Image:</b></td>
                <td><input type="file" name="product_image" ><img src="product_images/<?php echo $pro_image; ?>" alt="" width = 100px height = 100px></td>
            </tr>


            <tr>
                <td align="center"><b>Product Price:</b></td>
                <td><input type="text" name="product_price"  value = "<?php echo $pro_price?>"  required></td>
            </tr>

            <tr>
                <td align="center"><b>Product Description:</b></td>
                <td><textarea name="product_desc" id="" cols="40" rows="12"  ><?php echo $pro_desc?></textarea></td>
            </tr>

            <tr>
                <td align="center"><b>Product Keywords:</b></td>
                <td><input type="text" name="product_keywords" size = "60"  value = "<?php echo $pro_keywords?>"  required></td>
            </tr>

            <tr align ="center">
                <td colspan = 2><input type="submit" name="update_product" value="Update Product Now"></td>
            </tr>
        </table>
    </form>

</body>
</html>

<?php 

if(isset($_POST['update_product'])){    // when button is clicked
   
    // getting the text data from fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
    // getting image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];  // for server

    move_uploaded_file($product_image_tmp,"product_images/$product_image");

    if (($product_image == "") || ($product_brand == "") || ($product_cat=="")) {
          if (!($product_image == "")) {

                    $update_product = "update products set product_cat = '$product_cat',product_brand = '$product_brand',product_title='$product_title'
                    ,product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where
                    product_id = '$get_id'";
               
               
                    $update_pro = mysqli_query($con,$update_product);
          }
          if (!($product_brand == "")) {
                    $update_product = "update products set product_cat = '$product_cat',product_title='$product_title'
                    ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
                    product_id = '$get_id'";
               
                    $update_pro = mysqli_query($con,$update_product);
          }
          if (!($product_cat=="")) {
                    $update_product = "update products set product_brand = '$product_brand',product_title='$product_title'
                    ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
                    product_id = '$get_id'";
          
                    $update_pro = mysqli_query($con,$update_product);
          }
          if (!($product_cat == "" && $product_brand == "") ) {
               $update_product = "update products set product_brand = '$product_brand',product_title='$product_title'
               ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
               product_id = '$get_id'";

               $update_pro = mysqli_query($con,$update_product);
               }
     }
    else {
          $update_product = "update products set product_cat = '$product_cat',product_brand = '$product_brand',product_title='$product_title'
          ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
          product_id = '$get_id'";
     
     $update_pro = mysqli_query($con,$update_product);
    }

    if($update_pro){
       echo "<script>alert('product Successfully updated')</script>";
       echo "<script>window.open('index.php?view_products','_self')</script>";
    }



}


=======

<!DOCTYPE html>

<?php
include("includes/db.php");  // db connections

if(isset($_GET['edit_pro'])){
     $get_id = $_GET['edit_pro'];
     $get_pro = "select * from products where product_id = '$get_id'";

     $run_pro = mysqli_query($con,$get_pro);

     $row_pro = mysqli_fetch_array($run_pro);
     $pro_id = $row_pro['product_id'];
     $pro_title = $row_pro['product_title'];
     $pro_cat = $row_pro['product_cat'];
     $pro_brand = $row_pro['product_brand'];
     $pro_price = $row_pro['product_price'];
     $pro_desc = $row_pro['product_desc'];
     $pro_image = $row_pro['product_image'];
     $pro_keywords = $row_pro['product_keywords'];

     $get_cat = "select * from categories where cat_id = '$pro_cat' ";
     $run_cat = mysqli_query($con,$get_cat);
     $row_pro = mysqli_fetch_array($run_cat);
     $pro_cat = $row_pro['cat_title'];
     
     $get_brand = "select * from brands where brand_id = '$pro_brand' ";
     $run_brand = mysqli_query($con,$get_brand);
     $row_pro = mysqli_fetch_array($run_brand);
     $pro_brand = $row_pro['brand_title'];
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Script for Advance TextArea  -->
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="application/x-javascript">
    tinymce.init({selector:'textarea'});
    </script>

    <title>Update Product</title>
</head>
<body >
    
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border ="2">
            <tr align="center">
                <td colspan = 2><h2>Edit & Update Product</h2></td>
            </tr>

            <tr>
                <td align="center"><b>Product Title:</b></td>
                <td><input type="text" name="product_title" size = "60" value = "<?php echo $pro_title?>" required></td>
            </tr>

            <tr>
                <td align="center"><b>Product Categories:</b></td>
                <td>
                    <select name="product_cat" required>
                        <option><?php echo $pro_cat?></option>
                        <?php 
                                $get_cats = "select * from categories";

                                $run_cats =  mysqli_query($con,$get_cats);

                                while ($row_cats=mysqli_fetch_array($run_cats)){

                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                        ?>
                    </select>
                    </td>
            </tr>

            <tr>
                <td align="center"><b>Product Brand:</b></td>
                <td>
                    <select name="product_brand" required>
                    <option><?php echo $pro_brand?></option>
                        <?php 
                                $get_brands = "select * from brands";

                                $run_brands =  mysqli_query($con,$get_brands);

                                while ($row_brands=mysqli_fetch_array($run_brands)){

                                    $brand_id = $row_brands['brand_id'];
                                    $brand_title = $row_brands['brand_title'];

                                    echo "<option value='$brand_id'>$brand_title</option>";
                                }
                        ?>
                    </select>
                    </td>
            </tr>

            <tr>
                <td align="center"><b>Product Image:</b></td>
                <td><input type="file" name="product_image" ><img src="product_images/<?php echo $pro_image; ?>" alt="" width = 100px height = 100px></td>
            </tr>


            <tr>
                <td align="center"><b>Product Price:</b></td>
                <td><input type="text" name="product_price"  value = "<?php echo $pro_price?>"  required></td>
            </tr>

            <tr>
                <td align="center"><b>Product Description:</b></td>
                <td><textarea name="product_desc" id="" cols="40" rows="12"  ><?php echo $pro_desc?></textarea></td>
            </tr>

            <tr>
                <td align="center"><b>Product Keywords:</b></td>
                <td><input type="text" name="product_keywords" size = "60"  value = "<?php echo $pro_keywords?>"  required></td>
            </tr>

            <tr align ="center">
                <td colspan = 2><input type="submit" name="update_product" value="Update Product Now"></td>
            </tr>
        </table>
    </form>

</body>
</html>

<?php 

if(isset($_POST['update_product'])){    // when button is clicked
   
    // getting the text data from fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
    // getting image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];  // for server

    move_uploaded_file($product_image_tmp,"product_images/$product_image");

    if (($product_image == "") || ($product_brand == "") || ($product_cat=="")) {
          if (!($product_image == "")) {

                    $update_product = "update products set product_cat = '$product_cat',product_brand = '$product_brand',product_title='$product_title'
                    ,product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where
                    product_id = '$get_id'";
               
               
                    $update_pro = mysqli_query($con,$update_product);
          }
          if (!($product_brand == "")) {
                    $update_product = "update products set product_cat = '$product_cat',product_title='$product_title'
                    ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
                    product_id = '$get_id'";
               
                    $update_pro = mysqli_query($con,$update_product);
          }
          if (!($product_cat=="")) {
                    $update_product = "update products set product_brand = '$product_brand',product_title='$product_title'
                    ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
                    product_id = '$get_id'";
          
                    $update_pro = mysqli_query($con,$update_product);
          }
          if (!($product_cat == "" && $product_brand == "") ) {
               $update_product = "update products set product_brand = '$product_brand',product_title='$product_title'
               ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
               product_id = '$get_id'";

               $update_pro = mysqli_query($con,$update_product);
               }
     }
    else {
          $update_product = "update products set product_cat = '$product_cat',product_brand = '$product_brand',product_title='$product_title'
          ,product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where
          product_id = '$get_id'";
     
     $update_pro = mysqli_query($con,$update_product);
    }

    if($update_pro){
       echo "<script>alert('product Successfully updated')</script>";
       echo "<script>window.open('index.php?view_products','_self')</script>";
    }



}


>>>>>>> 826d842434e84e842a44bae2589ad6180cff7b86
?>