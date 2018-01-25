<?php

/* 
 * Restaurant.php
 * 
 * Restaurant class provides services for manipulating information about 
 * restaurants participating in the site.  This class also generates sql queries about
 * particular restaurants for interaction with the database.
 */

class Restaurant {
    
    private $firstName;
    private $lastName;
    private $email;
    private $restName;
    private $address;
    private $city;
    private $state;
    private $zipCode;
    private $phone;
    private $cuisine;
    private $numberSmallTables;
    private $numberMediumTables;
    private $numberLargeTables;
    private $numberHugeTables;
    // String consisting of whitespace-delimited numeric values corresponding to the days of operation: 0=Sunday, ... 6= Saturday
    private $openday; 
    private $openingtime;
    private $closingtime;
    private $openingtime_ampm;
    private $closingtime_ampm;
    private $agreeToPolicy;
    
    

    
       
    public function __construct() {          
    } 
    
    /**
     * Generates the insertion sql query to add a restaurant record to the database
     * @return String $query 
     */
    function getAddRestaurantQuery() {
       $query = "INSERT INTO Restaurant (firstName, lastName, email, restName, address, "
               . "city, state, zipCode, phone, cuisine, numberSmallTables, numberMediumTables, "
               . "numberLargeTables, numberHugeTables, openday, openingtime, closingtime, "
               . "openingtime_ampm, closingtime_ampm, agreeToPolicy) VALUES ('$this->firstName', "
               . "'$this->lastName', '$this->email', '$this->restName', '$this->address',"
               . "'$this->city', '$this->state', '$this->zipCode', '$this->phone',"
               . "'$this->cuisine', '$this->numberSmallTables', '$this->numberMediumTables',"
               . "'$this->numberLargeTables', '$this->numberHugeTables', '$this->openday',"
               . "'$this->openingtime', '$this->closingtime', '$this->openingtime_ampm',"
               . "'$this->closingtime_ampm', '$this->agreeToPolicy')";            
       $query = mysqli_real_escape_string($query);
       return $query;     
   }
    
   /**
    * Sets the fields of this Restaurant instance with the values provided by an
    * associative array $restaurantFields generated and sanitized/secured by the FormValidator
    * @param array $restaurantFields
    */
    function setFields($restaurantFields) {
        $this->firstName = $restaurantFields['firstName'];
        $this->lastName = $restaurantFields['lastName'];
        $this->email = $restaurantFields['email'];
        $this->restName = $restaurantFields['restName'];
        $this->address = $restaurantFields['address'];
        $this->city = $restaurantFields['city'];
        $this->state = $restaurantFields['state'];
        $this->zipCode = $restaurantFields['zipCode'];
        $this->phone = $restaurantFields['phone'];
        $this->cuisine = $restaurantFields['cuisine'];
        $this->numberSmallTables = $restaurantFields['numberSmallTables'];
        $this->numberMediumTables = $restaurantFields['numberMediumTables'];
        $this->numberLargeTables = $restaurantFields['numberLargeTables'];
        $this->numberHugeTables = $restaurantFields['numberHugeTables'];
        $this->openday = $restaurantFields['openday'];
        $this->openingtime = $restaurantFields['openingtime'];
        $this->closingtime = $restaurantFields['closingtime'];
        $this->openingtime_ampm = $restaurantFields['openingtime_ampm'];
        $this->closingtime_ampm = $restaurantFields['closingtime_ampm'];
        $this->agreeToPolicy = $restaurantFields['agreeToPolicy'];            
    }
    
    
    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getRestName() {
        return $this->restName;
    }

    function getAddress() {
        return $this->address;
    }

    function getCity() {
        return $this->city;
    }

    function getState() {
        return $this->state;
    }

    function getZipCode() {
        return $this->zipCode;
    }

    function getPhone() {
        return $this->phone;
    }

    function getCuisine() {
        return $this->cuisine;
    }

    function getNumberSmallTables() {
        return $this->numberSmallTables;
    }

    function getNumberMediumTables() {
        return $this->numberMediumTables;
    }

    function getNumberLargeTables() {
        return $this->numberLargeTables;
    }

    function getNumberHugeTables() {
        return $this->numberHugeTables;
    }

    function getOpenday() {
        return $this->openday;
    }

    function getOpeningtime() {
        return $this->openingtime;
    }

    function getClosingtime() {
        return $this->closingtime;
    }

    function getOpeningtime_ampm() {
        return $this->openingtime_ampm;
    }

    function getClosingtime_ampm() {
        return $this->closingtime_ampm;
    }

    function getAgreeToPolicy() {
        return $this->agreeToPolicy;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setRestName($restName) {
        $this->restName = $restName;
        return $this;
    }

    function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    function setCity($city) {
        $this->city = $city;
        return $this;
    }

    function setState($state) {
        $this->state = $state;
        return $this;
    }

    function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
        return $this;
    }

    function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    function setCuisine($cuisine) {
        $this->cuisine = $cuisine;
        return $this;
    }

    function setNumberSmallTables($numberSmallTables) {
        $this->numberSmallTables = $numberSmallTables;
        return $this;
    }

    function setNumberMediumTables($numberMediumTables) {
        $this->numberMediumTables = $numberMediumTables;
        return $this;
    }

    function setNumberLargeTables($numberLargeTables) {
        $this->numberLargeTables = $numberLargeTables;
        return $this;
    }

    function setNumberHugeTables($numberHugeTables) {
        $this->numberHugeTables = $numberHugeTables;
        return $this;
    }

    function setOpenday($openday) {
        $this->openday = $openday;
        return $this;
    }

    function setOpeningtime($openingtime) {
        $this->openingtime = $openingtime;
        return $this;
    }

    function setClosingtime($closingtime) {
        $this->closingtime = $closingtime;
        return $this;
    }

    function setOpeningtime_ampm($openingtime_ampm) {
        $this->openingtime_ampm = $openingtime_ampm;
        return $this;
    }

    function setClosingtime_ampm($closingtime_ampm) {
        $this->closingtime_ampm = $closingtime_ampm;
        return $this;
    }

    function setAgreeToPolicy($agreeToPolicy) {
        $this->agreeToPolicy = $agreeToPolicy;
        return $this;
    }



    
    
    
}

