<?php
require("Database.php");
if (isset($_POST["userLogin"])) {
    $numPpl = $_POST["numPpl"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $restName = $_POST["restName"];
    $restId = $_POST["restID"];
    $email = $_POST["username"];
    $password = $_POST["password1"];
    $query = "SELECT * FROM User WHERE email = '$email' AND password = '$password'";
    $db = new Database();
    $result = $db->query($query);
    $result_arr = $result->fetch_assoc();
    $user_id = $result_arr["id"];
    
    session_start();
    $_SESSION['login_user']=$email;
    
//    echo $numPpl."---".$date."---".$time."---".$restName."---".$restId."---".$email."---".$password."---".$user_id;

    $query2 = "INSERT INTO `reservation`( `user_id`, `restaurant_id`, `date`, `time`, `size`) VALUES ('$user_id','$restId','$date','$time','$numPpl')";
    $result2 = $db->query($query2);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/confirmation.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>

        <div><?php include 'navbar.php'; ?></div>
        <div class="container" style="margin-top: 100px;">
            <div class="panel panel-default" style="width: 60%; margin-left: auto; margin-right: auto;">
                <div class="panel-body">
                    <h2>Congratulations! Your table has been reserved.</h2>
                    <h2>Here are your reservation details.</h2>
                    <p style="font-size:20px">Restaurant Name: <?php echo $restName ?></p>
                    <p style="font-size:20px">Table for: <?php echo $numPpl ?></p>
                    <p style="font-size:20px">Time: <?php echo $time.":00 (24-hour time)" ?></p>
                    <p style="font-size:20px">Date: <?php echo $date ?></p>
                </div>
            </div>
        </div>
?>

