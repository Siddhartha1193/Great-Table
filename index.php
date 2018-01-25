<?php
 // Includes Login Script

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Great Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
    
<div><?php include 'navbar.php';?></div>

<div class="container">
    <div class="hero-unit">
        <span id="searchText">
        <h1>Welcome to GreatTable!</h1>
        <p>Here you can search for a particular restaurant, cuisine, or city and 
            find restaurants with available reservations.</p>
        </span>
    <div class="search">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="input-group">
                <form class="form-inline" role="form" action="SearchResults.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" 
                            name="searchBar" 
                            class="form-control" 
                            id="location"
                            placeholder="Enter a Restaurant, City, or Cuisine">
                    </div>
                    <div class="form-group">
                        <span class="input-group-btn">
                        <button type="submit" name="getTables" class="btn btn-default btn-primary btn-danger">
                            Find a Table
                        </button>
                        </span>
                        </div>   
                </form>
                </div>
            </div>
    </div>
    </div>
</div>
<!--<img src="images/view.jpg"-->
<div><?php include 'footer.php';?></div>
</body>
</html>
