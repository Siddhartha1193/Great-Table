<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class HostClass {
    private $firstName;
    private $lastName;
    private $restaurant;
    private $username;
    private $password;    
    
    // function getHostReservations() {}
    // function cancelReservation() {}
    // function addHost() {}
    // function removeHost() {}
    
    function getFirstName() {
        return $this->firstName;
    }

    function getLastNameDetails() {
        return $this->lastName;
    }

    function getRestaurant() {
        $query = "SELECT openingtime FROM Restaurant WHERE restaurant_id = '$restaurant_id'";
        $opening_time = $db->query($query);
        $numberOfResults = $db->numberOfResults($db->getResult());
        return $this->restaurant;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setRestaurant($restaurant) {
        $this->restaurant = $restaurant;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
}
    require("Database.php");
    $db = new Database();
    session_start();
    $error= " ";
    if (isset($_POST['loginSubmit'])){
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "*Username or Password is invalid";
        } else {
//            $username_and_restuarant_id=$_POST['username'];
//            $pieces = explode("/", $username_and_restuarant_id);
            $username = $_POST['username'];
//            $restaurant_id = substr($pieces[0], 3);
            $password=$_POST['password'];
            $query = "SELECT * FROM restaurant_host WHERE username = '$username' AND password = '$password'";
            $result = $db->query($query);
            $numberOfResults = $db->numberOfResults($db->getResult());
            if ($numberOfResults == 1) {
                $_SESSION['login_host']=$username; // Initializing Session
                header("location: reservationsHost.php"); // Redirecting To Other Page
                } else {
                    $error = "Username or Password is invalid";
                    
                }
        }
    
    }

?>