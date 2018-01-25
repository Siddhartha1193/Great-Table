<?php 

/* 
 * User.php
 * 
 * User class provides services for handling information about site users,
 * including customers and owners. This class also provides sql queries about 
 * users for use in interacting with the database.
 * 
 * 
 */

class User {
    
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $username;
    private $phone;
    
    
    
    function __construct() {
    }
    
    /**
     * Generates a sql query for adding a user to the database
     * The data items in the query have already been sanitized in FormValidator
     * @return string $query the query for inserting the user record into the database
     */
   function getAddUserQuery() {
       $query = "INSERT INTO User (email,  password, firstName, lastName,"
               . "phone) VALUES ('$this->email',"
               . "'$this->password', '$this->firstName', '$this->lastName', '$this->phone')";
       return $query;
       
   }
   
   /**
    * Generates a query for password checks based on information provided by the user
    * @return a processed, more secure string comprising a query for password check
    */
   function getUserPasswordCheckQuery() {
       $query = " SELECT * FROM User U WHERE U.email = '$this->email' AND U.pasword = '$this->password)";
       $query = stripslashes($query);
       $query = mysqli_real_escape_string($query);
       return $query;
   }
       
    /**
     * Assigns values to the object's fields based on the contents of an associative array
     * generated and returned by a FormValidator instance
     * @param array $userFields the associative array containing the user information
     */
    function setFields($userFields) {
        $this->email = $userFields['email'];
        $this->password = $userFields['password'];
        $this->firstName = $userFields['firstName'];
        $this->lastName = $userFields['lastName'];
        $this->phone = $userFields['phone'];
    }
    
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getPhone() {
        return $this->phone;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }
}
    
    require_once("Database.php");
    $db = new Database();

   session_start();
    $error= " ";
    if (isset($_POST['userLogin'])){
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "*Username or Password is invalid";
        } else {
            $username = $_POST['username'];
            $password=$_POST['password'];
            $query = "SELECT * FROM User WHERE email = '$username' AND password = '$password'";
            $result = $db->query($query);
            $numberOfResults = $db->numberOfResults($db->getResult());
            if ($numberOfResults == 1) {
                $_SESSION['login_user']=$username;// Initializing Session
                header("location: index.php"); // Redirecting To Other Page
                } else {
                    $error = "Username or Password is invalid";
                }
                
                
        }
    
    }
