<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$connection = mysql_connect("sfsuswe.com","f15g13","group13sql", "student_f15g13");
$database = mysql_select_db("student_f15g13", $connection);

if(!isset($_SESSION)){session_start();}
//session_start();
if (isset($_SESSION['login_user'])){
$user_login_check= $_SESSION['login_user'];
//if (!$user_login_check == 'guest'){
$ses_sql = mysql_query("select * from User where email='$user_login_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_email = $row['email'];
$user_id = $row['id'];
$pieces = explode("@", $row['email']);
$login_session =$pieces[0];
}

if(!isset($login_session)){
    mysql_close($connection); // Closing Connection
//    header('Location: login.php'); // Redirecting To login.php
}
?>
