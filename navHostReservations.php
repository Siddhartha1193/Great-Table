<?php
include('HostSession.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 */
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css"></head></html>



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
                <li style="font-weight:normal;"><a><i> Logged in as, <?php echo $login_email; ?></i></a></li>
                <li><a href="hostLogout.php">Log out</a></li>
            </ul>
        </div> 
    </div>
</div>