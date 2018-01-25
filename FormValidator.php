<?php

/* 
 * FormValidator.php
 * 
 * Validates, sanitizes, and processes information entered on forms filled out by
 * restaurant proprietors and users.  
 * 
 * The functions of this class process the information entered in forms,and also return
 * associative arrays containing the validated and sanitized information to the       
 * caller for further processing (e.g., for population of fields of instances of 
 * other classes such as User or Restaurant, etc.).
 * 
 */ 


class FormValidator {
    
    private $isValidInput;
    private $errorMessage;
    private $restaurantFields;
    private $userFields;
    private $userLoginFields;
    private $reservationFields;
    
    function __construct() {       
        $this->errorMessage= "";
        $this->isValidInput = 1; // changes to zero anytime a function below finds an invalid input
    }
    
    /**
     * Checks the information provided in a reservation request, and returns an 
     * array containing the information if valid, and 0 if any problems are encountered
     * @return associative array if form ok, integer 0 if not
     */
    function processReservationForm() {
        
        $restaurant = filter_input(INPUT_POST, 'restaurantid', FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (empty($email) || !$email) {
            $this->errorMessage .= "Please enter a valid email address.<br>";
            $this->isValidInput = 0;
        }
        $email = mysqli_real_escape_string($email);
        
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        if (empty($date) || !$date) {
            $this->errorMessage .= "Please enter a valid date.<br>";
            $this->isValidInput = 0;
        }
        $date = mysqli_real_escape_string($date); 
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        if (empty($name) || !$name) {
            $this->errorMessage .= "Please enter your name.<br>";
            $this->isValidInput = 0;
        }
        $name = mysqli_real_escape_string($name);
        
        $size = filter_input(INPUT_POST, 'numPpl', FILTER_VALIDATE_INT);
        if (empty($size) || !$size ) {
            $this->errorMessage .= "Please enter the number of people for the reservation.<br>";
            $this->isValidInput = 0;
        }
        
        $time = filter_input(INPUT_POST, 'time', FILTER_VALIDATE_INT);
        if (empty($time) || !$time ) {
            $this->errorMessage .= "Please enter the time of the reservation.<br>";
            $this->isValidInput = 0;
        }
        
        // check to see if the input for each field was valid
        if ($this->isValidInput==1) {
            
            $this->reservationFields = array("restaurant"=>"$restaurant", "email"=>"$email", 
                "name"=>"$name","date"=>"$date", 
                "time"=>"$time","size"=>"$size");
                    
            echo "<br><h1 style= \"margin-left:120px\">Congratulations!</h1><br>";
            return $this->reservationFields;
  
        }
        else {
            echo "$this->errorMessage <br>";
            return 0;
        }
        
    }
    
    /**
     * Processes user login form and returns associative array containing the user
     * information.
     * @return associative array or 0 if valid information was encountered
     */
    function processUserLoginForm() {
        
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (empty($email) || !$email) {
            $this->errorMessage .= "Please enter a valid email address.<br>";
            $this->isValidInput = 0;
        }
        $email = mysqli_real_escape_string($email);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if (empty($password) || !$password) {
            $this->errorMessage .= "Please enter a password.<br>";
            $this->isValidInput = 0;
        }
        $password = mysqli_real_escape_string($password);
        if ($this->isValidInput==1) {
            
            $this->userLoginFields = array("email"=>"$email", 
                "password"=>"$password");
                    
            return $this->userLoginFields;
  
        }
        else {
            echo "$this->errorMessage <br>";
            return 0;
        }
        
    } 
    
    /**
     * Processes information entered on the user registration form
     * @return associative array containing the user information
     */
    
    function processUserForm() {
        
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (empty($email) || !$email) {
            $this->errorMessage .= "Please enter a valid email address.<br>";
            $this->isValidInput = 0;
        }
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if (empty($password) || !$password) {
            $this->errorMessage .= "Please enter a password.<br>";
            $this->isValidInput = 0;
        }
        $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);
        if (empty($passwordConfirm) || !$passwordConfirm) {
            $this->errorMessage .= "Please confirm your password.<br>";
            $this->isValidInput = 0;
        }
        elseif ( strcmp($password, $passwordConfirm) != 0) {
            $this->errorMessage .= "The passwords you typed were different.  Please try again.<br>";
            $this->isValidInput = 0;
        }
        
        
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName= filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        if (empty($firstName) || empty($lastName)) {
            $this->errorMessage .= "Please enter your first and last name.<br>";
            $this->isValidInput = 0;
        }
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        if (empty($phone) || !$phone) {
            $this->errorMessage .= "Please enter your phone number.<br>";
            $this->isValidInput = 0;
        }
        
        // check to see if the input for each field was valid
        if ($this->isValidInput==1) {
            
            $this->userFields = array("email"=>"$email", 
                "password"=>"$password","firstName"=>"$firstName", 
                "lastName"=>"$lastName","phone"=>"$phone");
                    
            echo "<br><h1 style= \"margin-left:120px\">Congratulations!</h1><br>";
            return $this->userFields;
  
        }
        else {
            echo "$this->errorMessage <br>";
            return 0;
        }
        
        
    } 
    
    /**
     * Processes the information provided in the restaurant form
     * @return asociative array containing the restaurant information
     */
    
    function processRestaurantForm() {
        
        // check input for each field of the form
        
        $firstName = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
        $lastName= filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
        if (empty($firstName) || empty($lastName)) {
            $this->errorMessage .= "<br><br>Please enter your first and last name.<br>";
            $this->isValidInput = 0;
        }
        $email = filter_input(INPUT_POST, 'e_mail', FILTER_VALIDATE_EMAIL);
        if (empty($email) || !$email) {
            $this->errorMessage .= "Please enter a valid email address.<br>";
            $this->isValidInput = 0;
        }
        $restName = filter_input(INPUT_POST, 'r_name', FILTER_SANITIZE_STRING);
        if (empty($restName) || !$restName) {
            $this->errorMessage .= "Please enter your restaurant name.<br>";
            $this->isValidInput = 0;
        }
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        if (empty($address) || !$address) {
            $this->errorMessage .= "Please enter an address for your restaurant.<br>";
            $this->isValidInput = 0;
        }
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        if (empty($city) || !$city) {
            $this->errorMessage .= "Please enter a city for your restaurant.<br>";
            $this->isValidInput = 0;
        }
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        if (empty($state) || !$state) {
            $this->errorMessage .= "Please enter a state for your restaurant.<br>";
            $this->isValidInput = 0;
        }
        
        $zipEntered = filter_input(INPUT_POST, 'zipcode', FILTER_VALIDATE_INT);
        if (empty($zipEntered) || !$zipEntered) {
            $this->errorMessage .= "Please enter a valid zipcode for your restaurant.<br>";
            $this->isValidInput = 0;
        }
        else {
            $zipCode = filter_var($zipEntered, FILTER_VALIDATE_INT, 
                        array("options" => array("min_range"=>0, "max_range"=>99999)));
            if (empty($zipCode) || !$zipCode) {
                $this->errorMessage .= "Please enter a valid zipcode for yourrestaurant.<br>";
                $this->isValidInput = 0;
            }
        }
        
        $phone = filter_input(INPUT_POST, 'p_number', FILTER_SANITIZE_STRING);
        if (empty($phone) || !$phone) {
            $this->errorMessage .= "Please enter your restaurant's phone number.<br>";
            $this->isValidInput = 0;
        }
        $cuisine = filter_input(INPUT_POST, 'cuisine');
        if (empty($cuisine) || !$cuisine) {
            $this->errorMessage .= "Please enter your restaurant's cuisine type from the list.<br>";
            $this->isValidInput = 0;
        }
        
        $numberSmallTables = filter_input(INPUT_POST, 'numberSmall', FILTER_VALIDATE_INT);
        if (empty($numberSmallTables) || !$numberSmallTables || $numberSmallTables<0 || $numberSmallTables>100) {
            $this->errorMessage .= "Please enter a valid number of 1-2 person tables, from 1-100.<br>";
            $this->isValidInput = 0;
        }
        
        $numberMediumTables = filter_input(INPUT_POST, 'numberMedium', FILTER_VALIDATE_INT);
        if (empty($numberMediumTables) || !$numberMediumTables || $numberMediumTables<0 || $numberMediumTables>100) {
            $this->errorMessage .= "Please enter a valid number of 3-4 person tables, from 1-100.<br>";
            $this->isValidInput = 0;
        }
        
        $numberLargeTables = filter_input(INPUT_POST, 'numberLarge', FILTER_VALIDATE_INT);
        if (empty($numberLargeTables) || !$numberLargeTables || $numberLargeTables<0 || $numberLargeTables>100) {
            $this->errorMessage .= "Please enter a valid number of 4-8 person tables, from 1-100.<br>";
            $this->isValidInput = 0;
        }
        
        $numberHugeTables = filter_input(INPUT_POST, 'numberHuge', FILTER_VALIDATE_INT);
        if (empty($numberHugeTables) || !$numberHugeTables || $numberHugeTables<0 || $numberHugeTables>100) {
            $this->errorMessage .= "Please enter a valid number of 9+ person tables, from 1-100.<br>";
            $this->isValidInput = 0;
        }  
        
        if(isset($_POST['openday'])){
            $openday = $_POST['openday'];
            if (empty($openday) || !$openday) {
                $this->errorMessage .= "Please select the day(s) your restaurant is open.<br>";
                $this->isValidInput = 0;
            }
            $openday= implode(" ",$openday);
        }
        
        
        $openingtime = filter_input(INPUT_POST, 'opening_time');
        if (empty($openingtime) || !$openingtime) {
            $this->errorMessage .= "Please enter your restaurant's opening time.<br>";
            $this->isValidInput = 0;
        }
        $closingtime = filter_input(INPUT_POST, 'closing_time');
        if (empty($closingtime) || !$closingtime) {
            $this->errorMessage .= "Please enter your restaurant's closing time.<br>";
            $this->isValidInput = 0;
        }
        $openingtime_ampm = filter_input(INPUT_POST, 'opening_time_specify');
        if (empty($openingtime_ampm) || !$openingtime_ampm) {
            $this->errorMessage .= "Please enter am or pm for the opening time.<br>";
            $this->isValidInput = 0;
        }
        $closingtime_ampm = filter_input(INPUT_POST, 'closing_time_specify');
        if (empty($closingtime_ampm) || !$closingtime_ampm) {
            $this->errorMessage .= "Please enter am or pm for the closing time.<br>";
            $this->isValidInput = 0;
        }
        
        if (!isSet($_POST['agreeToPolicy'])) {
            $this->errorMessage .= "You must agree to the Terms of Use and Privacy Policy before you register.<br>";
            $this->isValidInput = 0;
        }
        else {
            $agreeToPolicy = $_POST['agreeToPolicy'];
        }
        
        
        // check to see if the input for each field was valid
        if ($this->isValidInput==1) {
            
            $this->restaurantFields = array("firstName"=>"$firstName", "lastName"=>"$lastName",
                "email"=>"$email", "restName"=>"$restName", "address"=>"$address", "city"=>"$city",
                "state"=>"$state", "zipCode"=>"$zipCode","phone"=>"$phone", "cuisine"=>"$cuisine",
                "numberSmallTables"=>"$numberSmallTables", "numberMediumTables"=>"$numberMediumTables",
                "numberLargeTables"=>"$numberLargeTables", "numberHugeTables"=>"$numberHugeTables", "openday"=>"$openday",
                "openingtime"=>"$openingtime", "closingtime"=>"$closingtime",
                "openingtime_ampm"=>"$openingtime_ampm", "closingtime_ampm"=>"$closingtime_ampm", "agreeToPolicy"=>"$agreeToPolicy");
                    
            return $this->restaurantFields;
  
        }
        else {
            echo "$this->errorMessage <br>";
            return 0;
        }
        
    } // end isValidRestaurantForm method
    
    function isValidUserForm() {
        
    }  
    
    function getIsValidInput() {
        return $this->isValidInput;
    }
    
    function getErrorMessage() {
        return $this->errorMessage;
    }

    function getRestaurantFields() {
        return $this->restaurantFields;
    }

    function setIsValidInput($isValidInput) {
        $this->isValidInput = $isValidInput;
        return $this;
    }

    function setErrorMessage($errorMessage) {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    function setRestaurantFields($restaurantFields) {
        $this->restaurantFields = $restaurantFields;
        return $this;
    }


    
    
    
    
    
    
}
