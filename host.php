<?php
include('HostClass.php'); // Includes Login Script

if(isset($_SESSION['login_host'])){
header("location: reservationsHost.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div><?php include 'nav_host.php';?></div>
        <div class="jumbotron">
            <h2 style="margin-left: 550px"><b>Restaurant Host</b></h2>
            <br>
            <div id="login">
                <div class="col-sm-offset-4 col-sm-10">
                    <span style="color: red"><?php echo $error; ?></span>
                </div>
                <br><br>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Email :</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="inputEmail3" name="username" placeholder="Email" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Password :</label>
                        <div class="col-sm-4">
                            <input id="inputPassword3" name="password" placeholder="**********" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox"> Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <input name="loginSubmit" type="submit" value=" Login " class="btn btn-default">
                        </div>
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="button" class="btn btn-link">Forgot Password?</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
