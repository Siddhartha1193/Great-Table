<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('AdminSession.php');
 require '../Database.php';
?> 




<!DOCTYPE html>
<html lang="en">
<head>
  <title>GreatTable Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar-default"><?php include './admin_nav.php';?>
    </div>
    
    <div class="container">
  
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#people">Manage People</a></li>
            <li><a data-toggle="tab" href="#restaurants">Manage Restaurants</a></li>
        </ul>

        <div class="tab-content">
            <div id="people" class="tab-pane fade in active">
                
                <div class="text-center"><br><br>
                    <button type="submit" onclick="location.href = 'http://sfsuswe.com/phpmyadmin/index.php?db=student_f15g13&token=2726cb27707fb7f75fe72300a69e352c#PMAURL:db=student_f15g13&table=User&target=sql.php&token=2726cb27707fb7f75fe72300a69e352c';" 
                            accesskey=""   class="btn btn-default btn-primary">See User Table</button>
                </div>

            </div>
            <div id="restaurants" class="tab-pane fade">
                <div class="text-center"><br><br>
                    
                    <button type="submit" onclick="location.href = 'http://sfsuswe.com/phpmyadmin/index.php?db=student_f15g13&token=2726cb27707fb7f75fe72300a69e352c#PMAURL:db=student_f15g13&table=User&target=sql.php&token=2726cb27707fb7f75fe72300a69e352c';" 
                            accesskey=""   class="btn btn-default btn-primary">See Restaurant Table</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
