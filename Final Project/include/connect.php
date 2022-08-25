<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * December 10th, 2021.
    *
    * This software connects the .php code to the datebase that's uploaded on phpmyadmin.
*/

// Set's a variable to connect to the host name.
$servername = "localhost";
// Set's a variable to connect to the host username.
$dbusername = "root";
// Set's a variable to connect to the host password.
$dbpassword = "";
// Set's a variable to connect to the host database.
$dbname = "sa000754334";

// Set's a variable to connect using the 4 variables and place it into the variable $conn.
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// If $conn is not equal fail the connection.
if(!$conn) {
    // Kill the connection and print the sql connection error.
    die("Connection Failed: " . mysqli_connect_error());
}
?>
