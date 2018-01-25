<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminClass {
    private $username;
    private $password;
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }

}
    require("../Database.php");
    $db = new Database();
    $username;
    $password;
    session_start();
        $error= " ";
        if (isset($_POST['loginAdmin'])){
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $error = "*Username or Password is invalid";
            } else {
    //            $username_and_restuarant_id=$_POST['username'];
    //            $pieces = explode("/", $username_and_restuarant_id);
                $username = $_POST['username'];
    //            $restaurant_id = substr($pieces[0], 3);
                $password=$_POST['password'];
                $query = "SELECT * FROM Admin WHERE username = '$username' AND password = '$password'";
                $result = $db->query($query);
                $numberOfResults = $db->numberOfResults($db->getResult());
                if ($numberOfResults == 1) {
                    $_SESSION['login_admin']=$username; // Initializing Session
                    header("location: admin.php"); // Redirecting To Other Page
                    } else {
                        $error = "Username or Password is invalid";

                    }
            }

        }

    
