<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * November 26th, 2021.
    *
    * This software connects the .php code to the datebase that's uploaded on phpmyadmin.
*/

// The include function is used to eveulate the file "connect.php.".
include "connect.php";                                              
// Creates the "id" variable, which will be used to choose a random number to be entered into the database.
$id = rand(1, 250);                                                            
// filter and validate the inputted item and places it into a variable $item.
$item = filter_input(INPUT_GET, "item", FILTER_SANITIZE_SPECIAL_CHARS); 
// filter and validate the inputted quantity and places it into a variable $quantity.
$quantity = filter_input(INPUT_GET, "quantity", FILTER_VALIDATE_INT);     
// Creates the "done" variable, which will be used to set the database row to either true or false.
$done = 1;
// Creates the "sql" variable, which will insert the id, item, quantity, and done into the shopping_list database.
$sql = "INSERT INTO shopping_list (id, item, quantity, done) VALUES ('$id', '$item', '$quantity', '$done')";  
// Prepares the statement for the above command.
$stmt = $dbh->prepare($sql);                      
// Creates a if statement that if $item or $quantity are equal to null execute the success statement.              
if ($item != null && $quantity != null) {       
    // Executes the sucess statement.       
    $success = $stmt->execute();                                           
}
// If $item or $quantity are not equal to null, an else statement is generated.
else {
    // If the else statement is executed, it returns false.
    return false;                                               
}
?>
