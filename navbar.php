<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 */

include('UserSessions.php');

?>

<html>
    <head>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css">
    </head>
</html>

<div id="navigationBar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        
        <div class="collapse navbar-collapse navbar-menubuilder">
            <?php include 'banner.php';?>
            <div class="navbar-header">
            <a href="index.php"><img src="images/Logo.jpg" id="logo" /></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                <span class="sr-only">
                    Toggle navigation</span>
            </button>
             </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="about.php">About Us</a></li>
                <li><a href=RestaurantRegistration.php>Register Restaurant</a></li>
                <li><a href=UserRegistration.php>Register User</a></li>
                <?php
                if(isset($_SESSION['login_user'])){
                    echo "<li><a href=\"UserLogout.php\">Log out</a></li>" ;
                    $user_id_nav = $user_id;
                }else{
                    echo "<li><a href=login.php>Login</a></li>" ;
                    $user_id_nav = 0;
                    
                }
                ?>
            </ul>
           
        </div> 
    </div>
</div>
