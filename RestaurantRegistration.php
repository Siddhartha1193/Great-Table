<?php

/* 
 * RestaurantRegistration.php
 * 
 * Presents and submits the restaurant registration form filled out by an owner/proprietor.
 * 
 * This file provides a restaurant registration form, to be filled out by 
 * a restaurant proprietor.  The input is sanitized and validated by the 
 * FormValidator and ProcessRestaurantRegistration files, and the latter uses
 * the provided information to add a record in the Restaurant database table via
 * the services offered by the Database and Restaurant classes. * 
 * 
 */


include 'navbar.php';

?> 


<div class="container" > 
    <form action="ProcessRestaurantRegistration.php" method="POST" enctype="multipart/form-data"  role="form">
    
    <h2>Register Your Restaurant:</h2><br>
        <div>
            <h3>Restaurant Registration: </h3> <br>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Restaurant Owner: </label>
                <div class="col-md-4">
                    <input class="form-control" type="text" id='f_name' name="f_name" placeholder="Enter First Name">
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" id='l_name' name="l_name" placeholder="Enter Last Name" maxlength="20">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Contact Email: </label>
                <div class="col-md-8">
                    <input class="form-control" type="text" id="e_mail" name="e_mail" placeholder="Enter Email" >
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Create a Password: </label>
                <div class="col-md-8">
                    <input class="form-control col-md-5" type="password" id="p_word" name="p_word" placeholder="Create Password" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Confirm Password: </label>
                <div class="col-md-8">
                    <input class="form-control col-md-5" type="password" id="p_word" name="p_word" placeholder="Confirm Password" >
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Restaurant Name: </label>
                <div class="col-md-8">
                    <input class="form-control" type="text" id="r_name" name="r_name" placeholder="Restaurant Name" >
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-3"> Restaurant Address: </label>
                <div class="col-md-8">
                    <input class="form-control" type="text" id="address" name="address" placeholder="Address" >
                </div>
            </div><br />
            <div class="row">
                <label class="col-md-3"></label> 
                <div class="col-md-3">
                    <input  class="form-control" type="text" id="city" name="city" placeholder="City">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" id="state" name="state" placeholder="State">
                </div>
                <div class="col-md-3">
                    <input class="form-control"  type="text" id="zipcode" name="zipcode" placeholder="ZipCode">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Restaurant Phone Number: </label> 
                <div class="col-md-8">
                    <input class="form-control" type="text" id="p_number" name="p_number" placeholder="(XXX)-(XXX)-(XXXX)" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Select Cuisine: </label>
                <div class="col-md-4">
  
                    <table class="table">
                        <tr>
                            <td colspan="2">
                                <select id="cuisine" name="cuisine" class="form-control">
                                    <option value="">Select Cuisine</option>
                                    <option value="American">American</option>
                                    <option value="Burmese">Burmese</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="German">German</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Latin">Latin</option>
                                    <option value="Mexican">Mexican</option>
                                    <option value="Native American">Native American</option>
                                    <option value="Pizza">Pizza</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Vietnamese">Vietnamese</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    <div class="form-group">
        <div class="row">
            <label class="col-md-3">Restaurant Tables: </label>
            <div class="col-md-9">
                <p>Select the number of tables, of each size, for your restaurant.</p>
                <br>
                <div class="row">
                    <label class="col-md-3">1-2 Person Tables: </label> 
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="numberSmall" name="numberSmall" placeholder="# 1-2 person tables" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-md-3">3-4 Person Tables: </label> 
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="numberMedium" name="numberMedium" placeholder="# 3-4 person tables" >
                    </div>
                </div> 
                <br>
                <div class="row">
                    <label class="col-md-3">5-8 Person Tables: </label> 
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="numberLarge" name="numberLarge" placeholder="# 5-8 person tables" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-md-3">9+ Person Tables: </label> 
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="numberHuge" name="numberHuge" placeholder="# 9+ person tables" >
                    </div>
                </div>
                <br>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Restaurant Hours: </label>
                <div class="col-md-9">
                    <p>Select the days hours of operation for your restaurant.</p>
                    <table class="table">
                        <!-- the days of operation are stored in $_POST as an array of the indicated values-->
                        <tr>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="0" />Sunday</td>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="1" />Monday</td>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="2" />Tuesday</td>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="3" />Wednesday</td>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="4" />Thursday</td>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="5" />Friday</td>
                            <td><input type="checkbox" id="openday[]" name="openday[]" value="6" />Saturday</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select id="opening_time" name="opening_time" class="form-control" >
                                    <option value="">Opens At</option>
                                    <option value="1:00">1:00</option>
                                    <option value="1:30">1:30</option>
                                    <option value="2:00">2:00</option>
                                    <option value="2:30">2:30</option>
                                    <option value="3:00">3:00</option>
                                    <option value="3:30">3:30</option>
                                    <option value="4:00">4:00</option>
                                    <option value="4:30">4:30</option>
                                    <option value="5:00">5:00</option>
                                    <option value="5:30">5:30</option>
                                    <option value="6:00">6:00</option>
                                    <option value="6:30">6:30</option>
                                    <option value="7:00">7:00</option>
                                    <option value="7:30">7:30</option>
                                    <option value="8:00">8:00</option>
                                    <option value="8:30">8:30</option>
                                    <option value="9:00">9:00</option>
                                    <option value="9:30">9:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>                   
                                </select>
                            </td>
                            <td colspan="1">
                                <select  id="opening_time_specify" name="opening_time_specify" class="form-control" >
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>                  
                                </select>
                            </td>

                            <td colspan="1">to</td>
                            <td colspan="2">
                                <select  id="closing_time" name="closing_time"class="form-control" >
                                    <option value="">Closes At</option>
                                    <option value="1:00">1:00</option>
                                    <option value="1:30">1:30</option>
                                    <option value="2:00">2:00</option>
                                    <option value="2:30">2:30</option>
                                    <option value="3:00">3:00</option>
                                    <option value="3:30">3:30</option>
                                    <option value="4:00">4:00</option>
                                    <option value="4:30">4:30</option>
                                    <option value="5:00">5:00</option>
                                    <option value="5:30">5:30</option>
                                    <option value="6:00">6:00</option>
                                    <option value="6:30">6:30</option>
                                    <option value="7:00">7:00</option>
                                    <option value="7:30">7:30</option>
                                    <option value="8:00">8:00</option>
                                    <option value="8:30">8:30</option>
                                    <option value="9:00">9:00</option>
                                    <option value="9:30">9:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>                   
                                </select>
                            </td>
                            <td colspan="1">
                                <select id="closing_time_specify" name="closing_time_specify" class="form-control" >
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>                  
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>  

         
        <div class="form-group">
            <div class="row">
               <!-- Agreement to the privacy policy is required and checked by FormValidator in the ProcessRestaurantRegistration file-->
                <div class="col-md-12">
                    <label>  <input type="checkbox" id="agree" name="agreeToPolicy" value="1" onclick="activate()" /> By clicking on Register, I agree to the terms and conditions of the GreatTable! <a href="./Policy.php">Terms of Use and Privacy Policy</a>.</label>
                    <label style="text-indent: 1em;">You must agree to the Terms of Use and Privacy Policy to use this service.</label>
                </div>
            </div>
            
        <div class="row">
            <label class="col-md-8"></label>
            <div class="col-md-2">
                <button type="submit" onclick="location.href='./ProcessRestaurantRegistration.php';" 
                        class="btn btn-default">Register My Restaurant</button>
            </div>
        </div>

    </form>
</div>




