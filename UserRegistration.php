<?php
/**
 * UserRegistration.php
 * 
 * Presents and submits user registration form.
 * 
 * This file provides a user registration screen, to be filled out by the user.
 * User input is validated and sanitized by back-end services in the FormValidator and
 * ProcessUserRegistration files, the latter of which processes this form and
 * presents the results of the user's interaction with this page.  
 * 
 */
?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/user_registration.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div><?php include 'navbar.php'; ?></div>
        <div class="container">
            <br>
            <br>
            <div class ="header">
                <h3><b>User Registration</b></h3>
                <br>
            </div>
            <form action="ProcessUserRegistration.php" method="POST" enctype="multipart/form-data"  role="form">
                <div class="form-group col-md-4 col-md-offset-4 required">
                    <label for="inputemail">Email address*:</label>
                    <input type="email" class="form-control" id="email" name ="email" placeholder="GreatFood@Mail.com">     
                </div>            
                <div class="form-group col-md-4 col-md-offset-4 required">
                    <label for="inputPassword">Password*</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter Password">
                </div>
                <!-- Password must be confirmed by user; matching is checked in FormValidator class-->
                <div class="form-group col-md-4 col-md-offset-4 required">
                    <label for="inputPassword">Confirm Password*</label>
                    <input type="password" class="form-control" id="inputPassword" name="passwordConfirm" placeholder="Confirm Password">
                </div>
                <div class="form-group col-md-4 col-md-offset-4 required">
                    <label for="inputName">First Name*</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Bobby">
                    <br>
                    <label for="inputName">Last Name*</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Flay">
                </div>
                <div class="form-group col-md-4 col-md-offset-4">
                    <label for="phone">Phone number*</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="(415) 123 - 4567">
                </div>
                <!-- Agreement to Privacy Policy is enforced in FormValidator-->
                <div class="form-group col-md-4 col-md-offset-4">          
                    <div class="text-center">
                        <label>  <input type="checkbox" id="agree" name="agreeToPolicy" value="1" onclick="activate()" /> By clicking on Register, I agree to the terms and conditions of the GreatTable! <a href="./Policy.php">Terms of Use and Privacy Policy</a>.</label>
                        <label style="text-indent: 1em;">You must agree to the Terms of Use and Privacy Policy to use this service.</label>
                    </div>
                </div>
                <div class="form-group col-md-4 col-md-offset-4">          
                    <div class="text-center">
                        <button type="submit" onclick="location.href = './ProcessUserRegistration.php';" 
                                class="btn btn-default btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
