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
        

        <?php

            include("../config/db.php");

            $query = "select * from gigs";
            $run_query = mysqli_query($con, $query);

            if ($run_query) {
                if (mysqli_num_rows($run_query) > 0){

                    echo "<h2 class='h2'>All Gigs</h2><br>";

                    while ($row = mysqli_fetch_array($run_query)) {
                        $name = $row["name"];
                        $technologies = $row["technologies"];
                        $description = $row["description"];
                        $imageData = $row["image"];

                        $image = "data:image/jpeg;base64,".base64_encode($row['image']);

                        echo "<div class='card mb-3 shadow' style='max-width: 1200px;'>
                                <div class='row no-gutters'>
                                    <div class='col-md-4'>
                                        <img src='$image' class='card-img' alt='Profile Pic'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='card-body'>
                                            <h5 class='card-title primary-blue font-weight-bold'>$name</h5>
                                            <p class='card-text'>$description</p>
                                            <p class='card-text'> Technologies Need : <span class='secondary-blue '>$technologies</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }else {
                    echo "<h2 class= 'text-center'>No Gig Found</h2>";
                }
            } 


        ?>

        <!-- <div class="card mb-3 shadow" style="max-width: 1200px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../img/elon.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title primary-blue font-weight-bold">Elon Musk</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"> Technologies Need : <span class="secondary-blue ">javascript, html, react</span></p>
                    </div>
                </div>
            </div>
        </div> -->

    </div>



</body>

</html>


