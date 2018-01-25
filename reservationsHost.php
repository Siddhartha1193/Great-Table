 <?php
 include('HostSession.php');
 require 'Database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Great Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/reservations_host.css"/>
        <script src="js/bootstrap.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript">
            $(document).ready(function () {
                $('#addWalkInBtn').click(function () {
                    $('#addWalkInPopUp').dialog({
                        title:"Add a Walk-in",
                        width: 530,
                        height: 350,
                        modal: true,
                        buttons: {
                            Cancel: 
                            function(){
                                $(this).dialog('close');
                            },
                            Save:
                            function(){
                                nameVal = $('#nameOfParty').val();
                                noOfPeopleVal = $('#numberOfPeople').val();
                                expectedTimeVal = $('#expectedTime').val();
                                time_arr = expectedTimeVal.split(":");
                                hours = time_arr[0];
                                mins = time_arr[1];
                                
                                if (hours >12){
                                    hours = hours-12;
                                    expectedTimeVal = hours + '.'+ mins+ " PM";
                                }
//                                spclOccasionVal = $('#spclOccasion').val();
//                                viewVal = $('input:radio[name=viewRequest]:checked').val();
                                var newRow = jQuery('<tr><td style="height:80px; font-size: 35px">' + nameVal + '</td><td style="height:80px; font-size: 35px">' + noOfPeopleVal +
                                                        '</td><td style="height:80px; font-size: 35px">' + expectedTimeVal + 
//                                                        '</td><td>' + spclOccasionVal +
//                                                        '</td><td>' + viewVal+ 
                                                          '</td><td><input  style="zoom: 2.0" type="checkbox" name="seatedCheckBox" value="seated"></td></tr>');
                                jQuery('table.reservationsTable').append(newRow);
                                $(this).dialog('close');
                                
                            }
                        }

                    });        
                });
            });
        </script>
        
    </head>
    
    <body>
        <div><?php include 'navHostReservations.php';?></div>
        <div style="margin-left: 40px">
            <br><br>            
            <h3 style="font-weight: bold">Welcome to the Host/Hostess Screen</h3>
            <?php
                $db1 = new Database();
                $query = "SELECT openingtime, openingtime_ampm, closingtime FROM Restaurant WHERE restaurant_id = '$rest_id'";
                $result = $db1->query($query);
                $result_arr = $result->fetch_assoc();
                $opening_time_ampm = $result_arr["openingtime_ampm"];
                $opening_time = $result_arr["openingtime"];
                $closing_time = $result_arr["closingtime"];
                if ($opening_time_ampm==='pm'&& $opening_time!=12){
                    $opening_time = $result_arr["openingtime"]+12;
                }
//                $query = "SELECT openingtime_ampm FROM Restaurant WHERE restaurant_id = '$rest_id'";
//                $result = $db1->query($query);
//                $opening_time_ampm = $db1->query($query);
//                echo $opening_time;
                date_default_timezone_set('America/Los_Angeles');
                if(date("H")>=01 && date("H")<=12){
                    $current_date = date("Y/m/d");
                    echo "<h3 class=\"reservationDate\">Reservations for: ". date("l"). ", ". date("m/d/Y")
                          ." (".$opening_time." AM - 12 PM)"."</h3><br>";
                    $query = "SELECT * FROM reservation WHERE restaurant_id = '$rest_id' AND date = '$current_date'"
                            . "AND time BETWEEN '1' and '12'";
                    $result = $db1->query($query);
                    $numberOfResults = $db1->numberOfResults($db1->getResult());
                    
                }
                if(date("H")>12 && date("H")<=15){
                    $current_date = date("Y/m/d");
                    echo "<h3 class=\"reservationDate\">Reservations for: ". date("l"). ", ". date("m/d/Y")
                          ." (12 PM - 04 PM)"."</h3><br>";
                    $query = "SELECT * FROM reservation WHERE restaurant_id = '$rest_id' AND date = '$current_date'"
                            . "AND time BETWEEN '12' and '16'";
                    $result = $db1->query($query);
                    $numberOfResults = $db1->numberOfResults($db1->getResult());
                    
                }
                if(date("H")>=16 && date("H")<=19){
                    $current_date = date("Y/m/d");
                    echo "<h3 class=\"reservationDate\">Reservations for: ". date("l"). ", ". date("m/d/Y")
                          ." (04 PM - 08 PM)"."</h3><br>";
                    $query = "SELECT * FROM reservation WHERE restaurant_id = '$rest_id' AND date = '$current_date'"
                            . "AND time BETWEEN '16' and '20'";
                    $result = $db1->query($query);
                    $numberOfResults = $db1->numberOfResults($db1->getResult());
                    
                }
                if(date("H")>=20 && date("H")<=23){
                    $current_date = date("Y/m/d");
                  echo "<h3 class=\"reservationDate\">Reservations for: ". date("l"). ", ". date("m/d/Y")
                          ."(08 PM - ".$closing_time." PM)"."</h3><br>";
                  $query = "SELECT * FROM reservation WHERE restaurant_id = '$rest_id' AND date = '$current_date'"
                            . "AND time BETWEEN '20' and '23'";
                    $result = $db1->query($query);
                    $numberOfResults = $db1->numberOfResults($db1->getResult());
                                      
                }
            ?>
            <div id = "addWalkInPopUp" style="display:none">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="nameOfParty" class="col-sm-5 control-label">Name:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id = "nameOfParty" type="text" name="nameOfParty" >
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for = "numberOfPeople" class="col-sm-5 control-label">No of people:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id = "numberOfPeople" type="number" name="numberOfPeople">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for = "expectedTime" class="col-sm-5 control-label">Time to be seated:</label>
                        <div class="col-sm-4">
                            <input class="form-control" id = "expectedTime" type="time" name="expectedTime">
                        </div>
                    </div>
                    
                    <!--
                    <div class="form-group">
                        <label for = "spclOccasion" class="col-sm-5 control-label">Special Occasion:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id = "spclOccasion" name="spclOccasion">
                                <option value="--">None</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Anniversary">Anniversary</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for = "viewRequest" class="col-sm-5 control-label">View Requested:</label>
                        <div class="col-sm-4">
                            <input type="radio" id = "viewRequest" name="viewRequest" value="--" checked>No
                            <input type="radio" id = "viewRequest" name="viewRequest" value="Requested" style="margin-left: 20px">Yes
                        </div>
                    </div>
                    -->
                </form>
            </div>
            <button class ="walkInButton" type="button" id = "addWalkInBtn">Add Walk-In</button>            
        </div>
        <div style="margin-left: 40px">
            <?php
              
            ?>
            <table class= "reservationsTable" style="width: 97%">
                <tr id = 'header_reservations_host'>
                    <th style="text-align: center; font-size: 30px; padding: 10px">Name</th>
                    <th style="text-align: center; font-size: 30px;">No. of People</th>
                    <th style="text-align: center; font-size: 30px;">Reservation Time</th>
                   <!-- <th>Special Occasion</th>
                    <th>View</th> -->
                    <th style="text-align: center; font-size: 30px;">Seated</th>
                </tr>
                <?php
                    while ($row = $db1->getNextRow()) {
                        $customer_id = $row['user_id'];
                        $db2 = new Database();
                        $query = "SELECT firstName,lastName FROM User WHERE id = '$customer_id'";
                        $result_user = $db2->query($query);
                        $result_arr_user = $result_user->fetch_assoc();
                        $time = $row['time'];
                        
                ?>
                
                <tr>
                    <td style="height:80px; font-size: 35px"><?php echo $result_arr_user['firstName']." ".$result_arr_user['lastName']; ?></td>
                    <td style="height:80px; font-size: 35px"><?php echo $row['size']; ?></td>
                    <?php 
                       if($time<12){
                           $time_str = $row['time']." AM";
                       }
                       else{
                           $time_format = $row['time']-12;
                           $time_str = $time_format." PM";
                       }
                    ?>
                    <td style="height:80px; font-size: 35px"><?php echo $time_str;?></td>
                    <td><input style="zoom: 2.0" type="checkbox" name="seatedCheckBox" value="seated"></td>
                </tr>
                
                <?php
                
                       } //end of while loop
                       
        ?>
            </table>
        </div>
        <br><br><br>
    </body>
</html>