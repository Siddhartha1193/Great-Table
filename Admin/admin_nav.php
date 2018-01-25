
<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/adminnav.css">
    </head>
    <body>
        <div class="nav">
            <div class="container-fluid">  
                 <div class="collapse navbar-collapse navbar-menubuilder">
                    <?php include '../banner.php';?>
                    <img src="../images/Logo.jpg" id="logo">
                    <ul class="pull-right" id="navigationUl">  
        
            
                    <?php
                     if(isset($_SESSION['login_admin'])  ){
                    ?>
                     <li><a href="AdminLogout.php">Log out</a></li> 
                    <?php
                     } 
                     ?>
                    <li class="nav-text">Welcome
                    <?php
                       $name = "Admin";
                       if(isset($_SESSION['login_admin']) ){
                           $name = $_SESSION['login_admin'];
                       }
                       echo $name ;
                     ?> 
                    </li>
                </ul> 
         
            </div>
        </div>
    </body>
</html>