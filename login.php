<?php
include('User.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: index.php");
}

?>

<!DOCTYPE html>
<!--
Page 
https://drive.google.com/drive/folders/0B8cVSx5d9KPtcnVvY1ZBSU5RVmc


getbootstrap.com/css/#forms-horizontal
-->
<html lang="en">
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/nav.css">
    </head>
<body>
<div id="navigationBar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse navbar-menubuilder">
            <?php include 'banner.php';?>
            <div class="navbar-header">
                <a href="index.php"><img src="images/Logo.jpg" id="logo" /></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                    <span class="sr-only">
                        Toggle navigation
                    </span>
                </button>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="about.php">About Us</a></li>
                <li><a href=RestaurantRegistration.php>Register Restaurant</a></li>
                <li><a href=UserRegistration.php>Register User</a></li>
                <?php
                if(isset($_SESSION['login_user'])){
                    echo "<li><a href=\"UserLogout.php\">Log out</a></li>" ;
                }else{
                    echo "<li><a href=login.php>Login</a></li>" ;
                    
                }
                ?>
            </ul>
        </div> 
    </div>
</div>
<div class="container">
    <h2>
        <b>
            <br>
            Login
        </b>
    </h2>
    <br>
    <div id="login">
        <div class="col-sm-offset-4 col-sm-10">
            <span style="color: red"><?php echo $error; ?></span>
        </div>
            <br>
                <form class="form" action="" method="post">
                    <div class="form-group">
                        <label for="inputUsername" class="col-md-4 col-md-offset-4 control-label">
                            Email :
                        </label>
                        <div class="col-md-4 col-md-offset-4">
                            <input class="form-control" id="inputUsername" name="username" placeholder="Email" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-4 col-md-offset-4 control-label"><br><br>Password :<br></label>
                        <div class="col-md-4 col-md-offset-4">
                            <input id="inputPassword" name="password" placeholder="**********" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <br><br>
                         <div class="col-md-4 col-md-offset-4">
                             <br><br>
                             <div class="text-center">
                                <a href = "UserRegistration.php"> Don't have an account? Click here! </a>
                             </div>
                         </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-4 col-md-offset-4">
                            <br><br>
                            <div class="text-center">
                                <input name="userLogin" type="submit" value=" Login " class="btn btn-default">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>