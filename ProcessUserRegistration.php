<html>
<body>
<?php

/* 
 * ProcessUserRegistration.php
 * 
 * Processes the registration information provided by the user and creates a new
 * record in the User database table if user input is valid.
 * 
 * This file uses the back-end services of FormValidator, Database, and User classes
 * to validate user input, instantiate a User object to convey the information for 
 * storage, create a database connection, generate and submit the
 * appropriate query, and state the outcome of the process.
 * 
 */

require "FormValidator.php";
require_once "Database.php";
require_once "User.php"; ?>
<div><?php include 'navbar.php';?></div>

<?php
// Instantiate FormValidator, validate input of user registration form
$fv = new FormValidator(); 
/* $validForm is provided by FormValidator and contains associative array populated with 
 * the information about the user needed for the database entry */
$validForm = $fv->processUserForm(); 
$isValidInput = $fv->getIsValidInput(); // proceed only if the information was all valid
if ($isValidInput) {
    $user = new User();
    $user->setFields($validForm); // populates all fields of $user with information in the array
    $db = new Database();
    $qry = $user->getAddUserQuery(); // User class function to provide needed query
    $db->addUser($qry);
    
    
    

}
// Message about specific problems with the form are printed by FormValidator
else {
   //<!-- Modal --> 
    
    ?>

 <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reservation Details</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" placeholder="Name"/>
                    </div>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
            <form class="form-inline" role="form" action="Confirmation.php" method="POST" enctype="multipart/form-data">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
            <button type="submit"  class="btn btn-default" name="reserveTable" >Reserve Table</button>
            </form>
        </div>
      </div>
      </div>
    </div>
<?php
}
;?>
 </body>
</html>
