<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * November 26th, 2021.
    *
    * This software connects the .php code to the datebase that's uploaded on phpmyadmin.
*/

// Uses a try block to connect to the database, which could potentially produce an error.
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=sa000754334",
        "root",
        ""
    );
}
// Creates a catch that only executes this block of code if there is an exception in the try code block. 
catch (Exception $e) {
    // Creates a die function that, if it encounters an error, exits().
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>
