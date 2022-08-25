<!DOCTYPE html>
<?php
/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * October 21st, 2021.
    *
    * This software creates the game of wumpus by checking the datebase for where the wumpus are placed and where the user is clicking based on the
    * row and column they've clicked. This returns a win or a lose which is outputted here with a print and a picture based on win/lose.
*/

// connect to the database using the connect.php which directs to the CSUNIX phpmyadmin.
include "connect.php";
// filter and validate the variable row.
$row = filter_input(INPUT_POST, 'row', FILTER_VALIDATE_INT);
// filter and validate the variable column.
$column = filter_input(INPUT_POST, 'column', FILTER_VALIDATE_INT);

// create an if statement that returns an error if $row or $column are empty.
if ($row !== null &&  $column !== null)
{
    // creates a select statement that will pull the row and column from the database.
    $command = "SELECT * FROM wumpuses WHERE row >= ? and column >= ?";
    // prepare the statement for execution.
    $stmt = $dbh->prepare($command);  
    // executes the select statement.
    $stmt->execute([$row, $column]);
    // defines the paramaters.
    $params = [];
    // creates a success statement that if the parameters are correct return.
    $success = $stmt->execute($params);
    // creates a while statement to fetch the first row.
    while ($row = $stmt->fetch()) {
        // creates an if statement that if $rows is greater than 0 return.
        if($row > 0)
        {
            echo "win";
        }
        // creates an else statement that if $row is equal to 0 return.
        else if($row == 0)
        {
            echo "lose";
        }
    }
}
?>
<html>

<head>
    <title>Assignment 2 - Anthony. Bauld</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wumpus2.css">
</head>

<body>
    <div id="container">
        <h1>Results!</h1>
        <?php
        // creates an if statement that returns a winning print and a picture if $row is greater than 0.
            if($row > 0)
            {
                echo "Win. You found a Wumpus!";
                $file = 'rock-lose.gif'; 
                echo "<img src=\"".$file."\">";
            }
        // creates an if statement that returns a losing print and a picture if $row is equal too 0.
            else
            {
                echo "Lose. There was no Wumpus found.";
                $file = 'monkey-puppet.gif'; 
                echo "<img src=\"".$file."\">";
            }
        ?>
    </div>
</body>

</html>
