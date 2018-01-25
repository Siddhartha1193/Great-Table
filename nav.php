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
<div class="nav">
      <div class="container"> 
          <img src="images/greattable_logo.jpg" id="logo">
        <ul class="pull-right" id="navigationUl">  
        
          <li><a href=index.php>Home</a></li>
          <?php
           if(isset($_SESSION['user_login']) && $_SESSION['user_login']== 1 ){
//                   echo "<li><a href=". PUBLIC_ROOT ."guest/logout >Log out</a></li>" ;
               echo "<li><a href=#>Log out</a></li>" ;
               
               
           }else{
                   echo "<li><a href=login.php>Log in</a></li>" ;
                   echo "<li><a href=user_registration.php>Sign Up</a></li>" ;
               }
          ?>
          <!--<li><a href="<?//php echo PUBLIC_ROOT.'about/help';?>">Help</a></li>-->      
          <li class="nav-text">Welcome
            <?php
               $name = "Guest";
               if(isset($_SESSION['user_login']) && isset($_SESSION['name']) && $_SESSION['user_login']== 1 ){
                   $name = $_SESSION['name'];
               }
               echo $name ;
             ?> 
            </li>
        </ul>          
    </div>
   </div>