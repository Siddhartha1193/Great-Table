<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 */?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css"></head></html>

<div id="navigationBar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse navbar-menubuilder">
            <h3> SFSU Software Engineering Project, Fall 2015, For Demonstration Only</h3>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <div class="navbar-header">
            <a href="index.php"><img src="images/Logo.jpg" id="logo" /></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                <span class="sr-only">
                    Toggle navigation</span>
            </button>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="about.php">About Us</a></li>
                <?php
//                if(isset($_SESSION['user_login']) && $_SESSION['user_login']== 1 ){
//                  echo "<li><a href=". PUBLIC_ROOT ."guest/logout >Log out</a></li>" ;
                    
//                    echo "<li><a href=#>Log out</a></li>" ;
//                }else{
//                    echo "<li><a href=login.php>Login</a></li>" ; 
//                }
                ?>
            </ul>
        </div> 
    </div>
</div>
