<?php

/* 
 * ProcessRestaurantRegistration.php
 * 
 * Inserts a new restaurant record into the Restaurant database table after 
 * successful validation of the input on the restaurant registration form.
 * 
 * This file uses the backend services of FormValidator to check the validity 
 * and safety of the inputs provided by restaurant proprietor.  FormValidator
 * returns an associative array containing information necessary for instantiation
 * of a Restaurant object, which in conjunction with the services of the
 * Database class adds the restaurant to the database. 
 * 
 */

require "FormValidator.php";
require "Database.php";
require "Restaurant.php";  
include 'navbar.php';

$fv = new FormValidator(); 
/* The FormValidator instance checks user input for validity/safety and
 * returns an associative array (assigned to $validForm) containing the information about the restaurant
 * to populate the fields of a new Restaurant instance
 */ 
$validForm = $fv->processRestaurantForm(); 
$isValidInput = $fv->getIsValidInput();
echo '<br><br><br>';

if ($isValidInput) {
    $restaurant = new Restaurant();
    // if the input was valid, set the fields of the Restaurant object with information in the array $validForm
    $restaurant->setFields($validForm);
    $db = new Database();
    $qry = $restaurant->getAddRestaurantQuery(); // this function of Restaurant class returns the needed query
    if ($db->addRestaurant($qry)) {
        ?>
    <div style="text-align:center">
        <h4>Congratulations! Your restaurant is now in our site!</h4>
        <h4>Please click a link above, or the Back button below, to continue using this site.</h4>
    </div>
<?php
    } 
    else {
        ?>
    <div style="text-align:center">
        <h4>Sorry, we were unable to add your restaurant to the site.  Please try again.</h4>
        <h4>You may click a link above, or the Back button below, to continue using this site.</h4>
    </div>
<?php
     
    }
?>     
  
    <div style="text-align:center">
        <br><br><br>
        <button onclick="location.href='./index.php'" 
                        class="btn btn-default btn-primary btn-danger">Go Back To Home Page</button>
    </div>
<?php
} // 
else {
    echo"<br>Please go back and fill out the form again.<br>";
}


    


