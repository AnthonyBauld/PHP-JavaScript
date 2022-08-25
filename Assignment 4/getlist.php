<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * November 26th, 2021.
    *
    * This software connects the .php code to the datebase that's uploaded on phpmyadmin.
*/

// The include function is used to eveulate the file "connect.php.".
include "connect.php";
// Creates the "sql" variable, which will select all the rows from the shopping_list database and orders them by item.
$sql = "SELECT * FROM shopping_list ORDER BY item";
// Prepares the statement for the above command.
$stmt = $dbh->prepare($sql);
// Creates the "row" variable and sets it to an array().
$rows = array();
// Executes the sucess statement ($rows).     
$stmt->execute($rows);
// Sets the "result" variable to fetch the default mode for this statement.
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// If ($result) is true, an if statement is executed.
if($result) {
    // Sets the $row variable to fetch the statement in a while loop.
    while ($row = $stmt->fetch()) {
        // Sets the ($rows) variable to equal ($row).
       $rows[] = $row;
    }
    // Uses echo to output the ($rows) variable while encoding it in JSON.
    echo  json_encode($rows);
}
// If ($result) is false, an else statement is executed.
else {
    // Uses echo to output a <p> statement that states the select query had failed.
    echo "<p>Something has failed within the SELECT query.</p>";
}
?>
