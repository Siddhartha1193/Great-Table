<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'AdminClass.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

    </head> 
<body>
  
    <div class="navbar-default"><?php include 'admin_nav.php';?></div>

  <div >
      <h3>Login</h3>
  <form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email address</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="inputEmail3" name="username" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" name="password"class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      
    </div>
  </div> 
  <div class="form-group">
        <div class="col-sm-offset-3 col-sm-2">
            <input name="loginAdmin" type="submit" value=" Login " class="btn btn-default">
        </div>
    
  </div>
          
</form>
  </div>

</body>
</html>

