<?php

/* 
 * Called as action from reserve button from searchresults.php
 */

require "Database.php";
require "Reservation.php";
?>
<div><?php include 'navbar.php';?></div>
<div><?php include 'banner.php';?></div>

<?php
$db = new Database;
$reserv = new Reservation;
$qry = $reserv->createReservationQuery();
$db->addReservation($qry);

    
    
    
?>    