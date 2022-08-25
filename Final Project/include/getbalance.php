<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * December 10, 2021.
    *
    * This software connects the .php code to the datebase and updates the balance.
*/

// The include function is used to eveulate the file "connect.php.".
include "connect.php";                      
// Creates the "sql" variable, which will insert the id, item, quantity, and done into the shopping_list database.
$sql = "SELECT balance FROM coinflip";  
// Prepares the statement for the above command.
$stmt = $dbh->prepare($sql);                      
// Creates a if statement that if $item or $quantity are equal to null execute the success statement.              
if ($bet != null && $bet != null) {       
    // Executes the sucess statement.       
    $success = $stmt->execute();                                           
}
// If $bet are not equal to null, an else statement is generated.
else {
    // If the else statement is executed, it returns false.
    return false;                                               
}
?>
