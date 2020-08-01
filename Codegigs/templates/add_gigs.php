<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo.png">
    <title>Code Gigs</title>
</head>

<body>

    <header class="inner">
        <h2><a href="../index.html"><i class="fas fa-code"></i>
                    CodeGig</a></h2>
        <nav>
            <ul>
                <li>
                    <a href="../index.html">Home</a>
                </li>
                <li>
                    <a href="all_gigs.php">All Gigs</a>
                </li>
                <li>
                    <a href="add_gigs.php">Add Gig</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form action="add_gigs.php" class="bg-dark form-dark" method = "POST" enctype = "multipart/form-data">
            <div class="form-wrap">
                <h1>Add A Gig</h1>
                <form>
                    <div class="input-group">
                        <label for="title">Name </label>
                        <input type="text" name="name" id="title" class="input-box" maxlength="30" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Profile Pic</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name='image'>
                    </div>
                    <div class="input-group">
                        <label for="technologies">Technologies Needed</label>
                        <input type="text" name="technologies" id="technologies" class="input-box" placeholder="eg. javascript, react, PHP" maxlength="100">
                    </div>

                    <div class="input-group">
                        <label for="description">Gig Description</label>
                        <textarea name="description" id="description" class="input-box" placeholder="Describe the details of the gig" rows="10" ></textarea>
                    </div>
                    <input type="submit" value="Add Gig" name="submit" class="btn btn-reverse">
                </form>
            </div>
        </form>
    </div>
</body>

</html>

<?php

include("../config/db.php");

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $technologies = $_POST["technologies"];
    $description = $_POST["description"];

    $image = $_FILES["image"]["name"];

    if(!empty($_FILES['image']['name'])) {

        $imageData = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    
        $imageType = $_FILES["image"]["type"];

        if (substr($imageType,0,5) == "image") {

            $add_query = "insert into gigs (name,description,technologies,image) values ('$name','$description','$technologies','$imageData')";
            $add_exec = mysqli_query($con, $add_query);

            if ($add_exec) {
                    echo "<script>alert('Gig added Successfully !')</script>";
                    echo "<script>window.open('all_gigs.php','_self')</script>";
                } else {
                    echo "<script>alert('Error Uploading Data Please Check your Connections ')</script>";
                }

        } else {
            echo "<script>alert('Only Images Allowed')</script>";
        }
    }
   
    
}



?>