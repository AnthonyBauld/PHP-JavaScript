<!DOCTYPE html>
<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * October 21st, 2021.
    *
    * This software saves the user entered email address and name while also tracking the amount of times they have won and,
    * the amount of times they have lost and outputs this statment when they've either won or lose the game of wumpus.
*/

// connect to the database using the connect.php which directs to the CSUNIX phpmyadmin.
include "connect.php";
// filter and validate the inputted email and places it into a variable $emailaddress.
$emailaddress = filter_input(INPUT_GET, "emailaddress", FILTER_VALIDATE_EMAIL);
// filter and validate the inputted name and places it into a variable $name.
$name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_SPECIAL_CHARS);
// filters and validates the amount of wins.
$wins = filter_input(INPUT_GET, "wins", FILTER_VALIDATE_INT);
// filters and validates the amount of losses.
$losses = filter_input(INPUT_GET, "loss", FILTER_VALIDATE_INT);
// filter and validates the last time played based on users email.
$datelastplayed = filter_input(
    INPUT_GET,
    "datelastplayed",
    FILTER_VALIDATE_INT
);

// if $email doesn't return false or null run the if statement
if ($email !== null and $email !== false) 
{
    // creates a command to insert the players email address, name, wins and loses into a constructor.
    $command = "INSERT into players (emailaddress, name, wins, losses) VALUES (?,?,?,?)";
    // prepares the statement for the above command.
    $stmt = $dbh->prepare($command);
    // creates the parameters $email, $name, $win and $losses.
    $params = [$email, $name, $win, $losses];
    // creates a success statement that if the parameters are correct return $success.
    $success = $stmt->execute($params);
}

// if $name doesn't return false or null run the if statement
if ($name !== null and $name !== false)
{
    // creates a command to update the players name.
    $command = "UPDATE players SET name = ?";
    // prepares the statement for the above command.
    $stmt = $dbh->prepare($command);
    // creates the parameters $name.
    $params = [$name];
    // creates a success statement that if the parameters are correct return $success.
    $success = $stmt->execute($params);
}

// if $wins doesn't return false or null run the if statement
if ($wins !== null and $wins !== false)
{
    // creates a command to update the players wins.
    $command = "UPDATE players SET wins = ?";
    // prepares the statement for the above command.
    $stmt = $dbh->prepare($command);
    // creates the parameters $wins.
    $params = [$wins];
    // creates a success statement that if the parameters are correct return $success.
    $success = $stmt->execute($params);
}

// if $loses doesn't return false or null run the if statement
if ($loses !== null and $loses !== false)
{
    // creates a command to update the players loses.
    $command = "UPDATE players SET loses = ?";
    // prepares the statement for the above command.
    $stmt = $dbh->prepare($command);
    // creates the parameters $loses.
    $params = [$loses];
    // creates a success statement that if the parameters are correct return $success.
    $success = $stmt->execute($params);
}

// if $datelastplayed doesn't return false or null run the if statement
if ($datelastplayed !== null and $datelastplayed !== false)
{
    // creates a command to update the players loses.
    $command = "UPDATE players SET datelastplayed = ?";
    // prepares the statement for the above command.
    $stmt = $dbh->prepare($command);
    // creates the parameters $datelastplayed.
    $params = [$datelastplayed];
    // creates a success statement that if the parameters are correct return $success.
    $success = $stmt->execute($params);
}
?>
<html>

<head>
    <title>Assignment 2 - Anthony. Bauld</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wumpus.css">
</head>

<body>
    <?php 
    // creates an if statement that runs if the parameters above return sucessful.
    if ($success) 
    {
        // if $emailaddress, $name, $wins, $loses and, $datelastplayed are fetched run this statement.
        if ([$emailaddress][$name][$wins][$loses][$datelastplayed] = $stmt->fetch()) 
        {
            // print an echo with all the varaibles from the database that the user either entered or was tracked.
            echo "<p>Congradulations. {[$name]}, You have won wumpus: {[$wins]} amount of times, and lost {[$losses]}. 
            The last time you've played this game was on {[$datelastplayed]}. </p>";
        }
        // else if that isn't true return this echo print. 
        else 
        {
            // prints a echo statement if the parameters are incorrect.
            echo "<p>Oh No. Something wasn't quite right with your parameters!</p>";
        }
    } 
?>
</body>
</html>
