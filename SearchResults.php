
<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/result.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
        <script>webshims.setOptions('forms-ext', {types: 'date'});
            webshims.polyfill('forms forms-ext');</script>
    </head>
    <div><?php include 'navbar.php'; ?></div>

    <div style="margin-top: 20px; padding: 5px; ">
        <div class="search" style="width: 80%; margin: 15px auto;">

            <form class="form-inline" role="form" action="SearchResults.php" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="form-group">
                        <input type="text" 
                               name="searchBar" 
                               class="form-control" 
                               id="location"
                               placeholder="Enter a Restaurant, City, or Cuisine" style="width: 800px;" >
                    </div>
                    <div class="form-group">
                        <span class="input-group-btn">
                            <button type="submit" name="getTables" class="btn btn-default btn-primary btn-danger">
                                Find a Table
                            </button>
                        </span>
                    </div>   
                </div>
            </form>
        </div>
    </div>


    <!--
    <body style="height: 100%; margin: 0; padding: 0;">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
            </div>
            <div class="navbar-collapse collapse"> 
                <ul class="nav navbar-nav">
                    <li class="navbar-left"><a href="#">GREATTABLE LOGO</a></li>
                    <li class="navbar-center"><a href="#">CSC648 CLASS PROJECT (DEMO ONLY)</a><li>
                    <li class="navbar-right"><a href="html/login.html">Login</a></li>
                </ul>
            </div>
        </nav>
    --> 

    <?php
    require("Database.php");

//    session_unset();
    if (isset($_POST["getTables"])) {
        $searchPhrase = $_POST['searchBar'];
        $db = new Database();

        $query = "SELECT * FROM Restaurant WHERE restName LIKE '%$searchPhrase%' OR city LIKE '%$searchPhrase%' OR cuisine LIKE '%$searchPhrase%'";
        $result = $db->query($query);
        $numberOfResults = $db->numberOfResults($db->getResult());
        ?>
        <div class="panel panel-default" style="width: 80%; margin-left: auto; margin-right: auto;">
            <div class="panel-body">	
                <?php
                echo "$numberOfResults restaurant(s) found. <br>";
                if ($numberOfResults > 0) {
                    echo "Showing results for \"$searchPhrase\":";
                } else if ($numberOfResults < 1) {
                    echo "But perhaps you would be interested in these restaurants:<br>";
                    $defaultSearch = $db->getDefaultQuery();
                    $result = $db->query($defaultSearch);
                    //$result = $db->query("{$db->getDefaultSearch()}");
                    $numberOfReslts = $db->numberOfResults($db->getResult());
                }
                ?>
            </div>
        </div>	

        <?php
        while ($row = $db->getNextRow()) {
            ?>

            <div class="panel-group">
                <div class="panel panel-default" style="width: 80%; margin-left: auto; margin-right: auto;">
                    <div class="panel-heading">Restaurant details</div>
                    <div class="panel-body" style="display: table">
                        <div style="display: table-row">

                            <div style="float: left; margin: 5px; padding:0px 10px 0px 10px;">
                                <?php
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['pictures']) . '"/>';
                                ?>			
                            </div>

                            <div style="float: left; margin: 10px; padding: 0px 10px 0px 10px;">
                                <address>
                                    <strong>
                                        <?php echo $row['restName'], '<br>'; ?>
                                    </strong>
                                    <?php
                                    echo $row['address'], '<br>';
                                    echo $row['zipCode'], ' ', $row['city'], '<br>';
                                    ?>
                                    <abbr title="Phone">
                                        <?php echo 'P: ', $row['phone'], '<br>'; ?>
                                    </abbr>
                                    <?php
                                    echo 'Email: ', $row['email'], '<br>';
                                    echo '<br><br>';
                                    ?>
                                </address>
                            </div>

                            <div style="float: left; margin: 5px; padding:0px 10px 0px 10px;">
                                <button class="mapButton btn btn-default" id="mapButton">Show map</button>
                                <button class="mapButtonPseudo btn btn-default" id="mapButtonPseudo">Show map</button>
                                <button class="mapButtonHide btn btn-default" id="mapButtonHide">Hide map</button>
                                <input type="hidden" name="address" id="address"
                                       value="<?php echo $row['address'], $row['zipCode'], $row['city']; ?>">
                                <div class="map" id="map" style="width: 400px; height: 200px"></div>
                                <div class="textFullMap alert alert-info" id="textFullMap"><p>Click on Google logo to open larger map.</p></div>
                            </div>

                        </div>
                    </div>

                    <form class="form-inline" role="form" action="Confirmation.php" method="POST" enctype="multipart/form-data" style="background-color: lightgray;">
                        <div class="panel-body" style="display: table">
                            <div style="display: table-row">
                                <input type="hidden" name="restName" value="<?php echo $row["restName"] ?>">
                                <input type="hidden" name="restID" value="<?php echo $row["restaurant_id"] ?>">
                                <input type="hidden" name="restNumSmall" value="<?php echo $row["numberSmallTables"] ?>">
                                <input type="hidden" name="restNumMedium" value="<?php echo $row["numberMediumTables"] ?>">
                                <input type="hidden" name="restNumLarge" value="<?php echo $row["numberLargeTables"] ?>">
                                <input type="hidden" name="restNumHuge" value="<?php echo $row["numberHugeTables"] ?>">

                                <div style="display: table-cell; margin: 5px; padding: 5px;">
                                    <select name="numPpl" onchange="" class="form-control">
                                        <option value="1">1 people</option>
                                        <option value="2">2 people</option>
                                        <option value="3">3 people</option>
                                        <option value="4">4 people</option>
                                        <option value="5">5 people</option>
                                        <option value="6">6 people</option>
                                        <option value="7">7 people</option>
                                        <option value="8">8 people</option>
                                        <option value="9">8+ people</option>

                                    </select>
                                </div>
                                <div style="display: table-cell; margin: 5px; padding: 5px;">
                                    <input type="date" name="date" placeholder="select date" class="form-control">
                                </div>
                                <div style="display: table-cell; margin: 5px; padding: 5px;">
                                    <select name="time" onchange="" name="time" class="form-control">
                                        <option value="10">10:00 am</option>
                                        <option value="11">11:00 am</option>
                                        <option value="12">12:00 pm</option>
                                        <option value="13">1:00 pm</option>
                                        <option value="14">2:00 pm</option>
                                        <option value="15">3:00 pm</option>
                                        <option value="16">4:00 pm</option>
                                        <option value="17">5:00 pm</option>
                                        <option value="18">6:00 pm</option>
                                        <option value="19">7:00 pm</option>
                                        <option value="20">8:00 pm</option>
                                        <option value="21">9:00 pm</option>
                                        <option value="22">10:00 pm</option>
                                        <option value="23">11:00 pm</option>
                                    </select>

                                </div>
                                <div style="display: table-cell; margin: 5px; padding: 5px;">
                                    <button type="submit" class="btn btn-info btn-lg" name = "reserveTable">Reserve table</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>	
        <?php
    } // end while loop
} // end if
else {
    echo "Sorry, we couldn't load because this page was accessed directly. Try navigating to it from home page.";
}
?>

<script>
    $(document).ready(function () {
        $(".mapButtonHide").hide();
        $(".textFullMap").hide();
        $(".mapButtonPseudo").hide();
        console.log("In ready");
    });

    $(".mapButton").click(function () {
        // $(this).parent().children(".map").css("background", "red");
        console.log("In map and show");
        var map = $(this).parent().children("#map")[0];
        var address = $(this).parent().children("input[name='address']").val();
        $(this).parent().children("#map").show(200);
        $(this).parent().children("#textFullMap").show(200);
        $(this).parent().children("#mapButtonHide").show(200);
        $(this).parent().children("#mapButtonPseudo").show(200);
        $(this).remove();
        newMap(map, address);
    });

    $(".mapButtonHide").click(function () {
        $(this).parent().children(".textFullMap").hide(200);
        $(this).parent().children(".mapButtonHide").hide(200);
        $(this).parent().children(".map").hide(200);
        console.log("In hide");
    });

    $(".mapButtonPseudo").click(function () {
        $(this).parent().children(".textFullMap").show(200);
        $(this).parent().children(".mapButtonHide").show(200);
        $(this).parent().children(".map").show(200);
        console.log("In hide");
    });

    function newMap(ele, address) {
        console.log("In newMap");
        //var address = '532 Jones St, San Francisco, CA 94102';
        var map = new google.maps.Map(ele, {
            mapTypeId: google.maps.MapTypeId.TERRAIN,
            zoom: 15
        });

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': address
        },
        function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map
                });
                map.setCenter(results[0].geometry.location);
            }
        });
    }
</script>



