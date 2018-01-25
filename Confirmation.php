<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/confirmation.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>

        <div><?php include 'navbar.php'; ?></div>
        <?php $user_id = $user_id_nav; ?>
        <?php
        require("Database.php");
        $tableavailable = 0;
        if (isset($_POST["reserveTable"])) {
            $numPpl = $_POST["numPpl"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $restName = $_POST["restName"];
            $restId = $_POST["restID"];

            if ($numPpl == 1 || $numPpl == 2) {
                $tablesGivenByRes = $_POST["restNumSmall"];
                $query = "SELECT * from reservation where restaurant_id= '$restId' AND date = '$date' AND time = '$time' AND size BETWEEN '1' AND '2'";
                $dbTables = new Database();
                $result = $dbTables->query($query);
                $numberOfResults = $dbTables->numberOfResults($dbTables->getResult());
                if ($tablesGivenByRes - $numberOfResults > 0) {
                    $tableavailable = 1;
                }
            }
            if ($numPpl == 3 || $numPpl == 4) {
                $tablesGivenByRes = $_POST["restNumMedium"];
                $query = "SELECT * from reservation where restaurant_id= '$restId' AND date = '$date' AND time = '$time' AND size BETWEEN '3' AND '4'";
                $dbTables = new Database();
                $result = $dbTables->query($query);
                $numberOfResults = $dbTables->numberOfResults($dbTables->getResult());
                if ($tablesGivenByRes - $numberOfResults > 0) {
                    $tableavailable = 1;
                }
            }
            if ($numPpl == 5 || $numPpl == 6 || $numPpl == 7 || $numPpl == 8) {
                $tablesGivenByRes = $_POST["restNumLarge"];
                $query = "SELECT * from reservation where restaurant_id= '$restId' AND date = '$date' AND time = '$time' AND size BETWEEN '5' AND '8'";
                $dbTables = new Database();
                $result = $dbTables->query($query);
                $numberOfResults = $dbTables->numberOfResults($dbTables->getResult());
                if ($tablesGivenByRes - $numberOfResults > 0) {
                    $tableavailable = 1;
                }
            }
            if ($numPpl == 9) {
                $tablesGivenByRes = $_POST["restNumHuge"];
                $query = "SELECT * from reservation where restaurant_id= '$restId' AND date = '$date' AND time = '$time' AND size = '9'";
                $dbTables = new Database();
                $result = $dbTables->query($query);
                $numberOfResults = $dbTables->numberOfResults($dbTables->getResult());
                if ($tablesGivenByRes - $numberOfResults > 0) {
                    $tableavailable = 1;
                }
            }
        }
        ?>

        <?php
//                  session_unset();
        if ($user_id !== 0) {
            ?>
            <div class="container" style="margin-top: 100px;">
                <div class="panel panel-default" style="width: 60%; margin-left: auto; margin-right: auto;">
                    <div class="panel-body">
                        <?php
                        if ($tableavailable === 1) {
                            $query = "INSERT INTO `reservation`( `user_id`, `restaurant_id`, `date`, `time`, `size`) VALUES ('$user_id','$restId','$date','$time','$numPpl')";
                            $db = new Database();
                            $result = $db->query($query);
                            ?>

                            <h2>Congratulations! Your table has been reserved.</h2>
                            <h2>Here are your reservation details.</h2>
                            <p style="font-size:20px">Restaurant Name: <?php echo $restName ?></p>
                            <p style="font-size:20px">Table for: <?php echo $numPpl ?></p>
                            <p style="font-size:20px">Time: <?php echo $time.":00 (24-hour time)" ?></p>
                            <p style="font-size:20px">Date: <?php echo $date ?></p>

                        <?php } else {
                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="images/sorry.jpg" width="200"/>
                                    </div>
                                    <div class="col-md-4">
                                        <h2>The table you requested is not available </h2>
                                        <form action="index.php" method="post">
                                            <input class="btn btn-danger" type="submit" value="Search Again">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            if ($tableavailable === 1) {
                ?>

                <div class="guest">
                    <div class="jumbotron">
                        <h2 style="margin-left: 150px"><b>Continue as guest:</b></h2>
                        <div id="guest">
                            <div class="col-sm-offset-4 col-sm-10">
                            </div>
                            <br>
                            <form class="form-horizontal" action="confirmationGuest.php" method="post">
                                <input type="hidden" name="restName" value="<?php echo $restName ?>">
                                <input type="hidden" name="restID" value="<?php echo $restId ?>">
                                <input type="hidden" name="time" value="<?php echo $time ?>">
                                <input type="hidden" name="date" value="<?php echo $date ?>">
                                <input type="hidden" name="numPpl" value="<?php echo $numPpl ?>">
                                <label for="firstname" class="col-sm-4 control-label">First Name:</label>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input class="form-control" id="firstname" name="firstname" placeholder="John" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-4 control-label">LastName :</label>
                                    <div class="col-sm-4">
                                        <input id="lastname" name="lastname" placeholder="Smith" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailAddress" class="col-sm-4 control-label">Email :</label>
                                    <div class="col-sm-4">
                                        <input id="emailAddress" name="emailAddress" placeholder="abc@gmail.com" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                        <input name="userGuest" type="submit" value=" Submit " class="btn btn-default">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="loginForm">
                    <div class="jumbotron">
                        <h2 style="margin-left: 150px"><b>Login: </b></h2>
                        <div id="guest">
                            <div class="col-sm-offset-4 col-sm-10">
                            </div>
                            <br>
                            <form class="form-horizontal" action="confirmationLogin.php" method="post">
                                <input type="hidden" name="restName" value="<?php echo $restName ?>">
                                <input type="hidden" name="restID" value="<?php echo $restId ?>">
                                <input type="hidden" name="time" value="<?php echo $time ?>">
                                <input type="hidden" name="date" value="<?php echo $date ?>">
                                <input type="hidden" name="numPpl" value="<?php echo $numPpl ?>">
                                <div class="form-group">
                                    <label for="emailAddress" class="col-sm-4 control-label">Username:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" id="emailAddress" name="username" placeholder="Email" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">Password :</label>
                                    <div class="col-sm-4">
                                        <input id="password" name="password1" placeholder="******" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                        <input name="userLogin" type="submit" value=" Login " class="btn btn-default">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } else {
                ?>
                <div class="container" style="margin-top: 100px;">
                    <div class="panel panel-default" style="width: 60%; margin-left: auto; margin-right: auto;">
                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="images/sorry.jpg" width="200"/>
                                    </div>
                                    <div class="col-md-4">
                                        <h2>The table you requested is not available </h2>
                                        <form action="index.php" method="post">
                                            <input class="btn btn-danger" type="submit" value="Search Again">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>


        <div><?php include 'footer.php'; ?></div>
    </body>
</html>
