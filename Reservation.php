<?php

/* 
 * Reservation.php
 * 
 * Reservation class provides services for handling and creating reservations.
 * This class also provides queries relating to insertion of reservations into
 * the database.
 */

class Reservation {
    
    private $restaurant;
    private $email;
    private $name;
    private $date;
    private $time;
    private $size;

    
    
    function __construct() {
    }
    
    
    function setFields($reservationFields) {
        $this->restaurant = $reservationFields['restaurant'];
        $this->email = $reservationFields['email'];
        $this->name = $reservationFields['name'];
        $this->date = $reservationFields['date'];
        $this->time = $reservationFields['time'];
        $this->size = $reservationFields['size'];
    }
    
    function createReservationQuery() {
        $query = "INSERT INTO reservation (user_id, restaurant_id, date, "
                . "time, size) VALUES ('$this->restaurant', '$this->customerid', $this->date',"
               . "'$this->time, '$this->size')";
       
       return $query;
        
    }
    
    // getters and setters
    
    function getRestaurant() {
        return $this->restaurant;
    }

    function getTableSize() {
        return $this->tableSize;
    }

    function getMonth() {
        return $this->month;
    }

    function getDay() {
        return $this->day;
    }

    function getHour() {
        return $this->hour;
    }

    function getMinute() {
        return $this->minute;
    }

    function getUser() {
        return $this->user;
    }

    function setRestaurant($restaurant) {
        $this->restaurant = $restaurant;
    }

    function setTableSize($tableSize) {
        $this->tableSize = $tableSize;
    }

    function setMonth($month) {
        $this->month = $month;
    }

    function setDay($day) {
        $this->day = $day;
    }

    function setHour($hour) {
        $this->hour = $hour;
    }

    function setMinute($minute) {
        $this->minute = $minute;
    }

    function setUser($user) {
        $this->user = $user;
    }


    
    
    
    
    
    
    
    
    
    
    
}