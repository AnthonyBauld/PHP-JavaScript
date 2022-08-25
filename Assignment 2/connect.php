<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * October 21st, 2021.
    *
    * This software connects the .php code to the datebase that's uploaded on phpmyadmin.
*/

try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=sa000754334",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>
