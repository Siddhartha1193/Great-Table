<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: host.php"); // Redirecting To Home Page
}
?>
