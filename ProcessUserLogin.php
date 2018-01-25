<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "FormValidator.php";
require "Database.php";
require "User.php"; 
//include 'navbar.php';
?>

<?php
$fv = new FormValidator();
$validForm = $fv->processUserLoginForm();
$isValidInput = $fv->getIsValidInput();
if ($isValidInput) {
    foreach ($validForm as $x=>$x_value) {
        echo "Field: " . $x . "   Value: " . $x_value . "<br>";
    }
    //$userSigningIn = new User();
    //$userSigningIn->setEmail($validForm['email']);
    //$userSigningIn->setPassword($validForm['password']);
    //$enteredPassWord = $userSigningIn->getPassword();
    //$user->setFields($validForm);
    $db = new Database();
    $qry = $userSigningIn->getUserPasswordCheckQuery();
    $result = $db->query($query);
    $numberOfResults = $db->numberOfResults($db->getResult());
    if ($numberOfResults>0) {
        // username and password pair match an entry in User db
        echo "<br><br><br>Match found!!";
    }
    else {
        // the entered username and password dont match anything
        echo "<br><br><br>Match Not found!!";
    }
    
    
    
    
    
    
} // end isValidInput block
else {
    echo"<br>Please go back and fill out the form again.<br>";
}
 