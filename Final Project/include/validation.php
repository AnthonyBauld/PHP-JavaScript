<?php

/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * December 10, 2021.
    *
    * Validates whether the information inputted is correct else redirect them back to the page homepage or the sign-up page.
*/

// Create's a function that checks whether the inputted strings are empty.
function emptyInput($username, $email, $password, $cpassword) {
    // Set variable $result to null.
    $result = null;
    // Execute if statement if $username, $email, $password, and $cpassword are empty
    if(empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        // Set variable $result to true.
        $result = true;
    // Execute else statement if $username, $email, $password, and $cpassword are inputted.
    } else {
        // Set variable $result to false.
        $result = false;
    }
    // Returns the variable $result.
    return $result;
}
// Create's a function that checks whether the username is correctly inputted.
function invalidUsername($username) {
    // Set variable $result to true.
    $result = null;
    // If $username is to equal to FILTER_SANITIZE_SPECIAL_CHARS execute the statment.
    if(!filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS)) {
        // If the inputted value has the characters a-zA-Z0-9 execute the statement.
        if(!preg_match("/^[a-zA-Z0-9]*/", $username)) {
            // Set variable $result to true.
            $result = true;
        }
    // Execute else statement if $username doesn't equal FILTER_SANITIZE_SPECIAL_CHARS.
    } else {
        // Set variable $result to false.
        $result = false;
    }
    // Returns the variable $result.
    return $result;
}
// Create's a function that checks whether the email is correctly inputted.
function invalidEmail($email) {
    // Set variable $result to null.
    $result = null;
    // If $username is to equal to FILTER_VALIDATE_EMAIL execute the statment.
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Set variable $result to true.
        $result = true;
    // Execute else statement if $username doesn't equal FILTER_VALIDATE_EMAIL.
    } else {
        // Set variable $result to true.
        $result = false;
    }
    // Returns the variable $result.
    return $result;
}
// Create's a function that checks if the $password and $cpassword are equal to the same inputted value.
function invalidPassword($password, $cpassword) {
    $result = null;
    // If $password equals $cpassword execute the statement.
    if($password != $cpassword) {
        // If $password is to equal to FILTER_SANITIZE_SPECIAL_CHARS execute the statment.
        if(!filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS)) {
            // Set variable $result to true.
            $result = true;
        }
    // Execute else statement if $username doesn't equal FILTER_VALIDATE_EMAIL.
    } else {
        // Set variable $result to false.
        $result = false;
    }
    // Returns the variable $result.
    return $result;
}
// Create's a function that checks if a $username or $email already exsists within the database 'users'.
function Exists($conn, $username, $email) {
    // Create's a select statement that checks the username or email.
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    // Create's a statement that sets the variable $stmt in to the $conn.
    $stmt = mysqli_stmt_init($conn);
    // If the statement isn't prepared return the user back to the signup page.
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        // Redriect user back to signup page.
        header("location: ../signup.php");
        // Exits the if statement.
        exit();
    }
    // Binds the parameters to the $stmt with two strings $username and $email.
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    // Executes the statment.
    mysqli_stmt_execute($stmt);
    // Create's a variable called $resultData that gets the statement result from $stmt.
    $resultData = mysqli_stmt_get_result($stmt);
    // If $row is equal to the fetch assoicate $resultdata the execute the statement.
    if($row = mysqli_fetch_assoc($resultData)) {
        // Returns the variable $row.
        return $row;
    // Execute else statement if it doesn't fetch the assoicate $resultdata correctly.
    } else {
        // Sets the $result to fasle.
        $result = false;
        // Returns the variable $result.
        return $result;
    }
    // Closes the sql $stmt.
    mysqli_stmt_close($stmt);
}
// Create's a function that will input the user data into the database.
function createUser($conn, $username, $email, $password) {
    // Create's a sql statement that will insert username, email, and password into the database.
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    // Create's a statement that sets the variable $stmt in to the $conn.
    $stmt = mysqli_stmt_init($conn);
    // If the statement isn't prepared return the user back to the signup page.
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        // Redriect user back to signup page.
        header("location: ../signup.php");
        // Exits the if statement.
        exit();
    }
    // Create's a variable called $hashed_password that salts the current password entered using the default algorithm.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Binds the parameters to the $stmt with three strings $username, $email, and hashed_pasword.
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
    // Executes the statment.
    mysqli_stmt_execute($stmt);
    // Closes the sql $stmt.
    mysqli_stmt_close($stmt);
    // Redriect user back to homepage page.
    header("location: ../index.php");
    // Exits the if statement.
    exit();
}
// Create's a function that checks whether the login page is empty.
function emptyInputLogin($username, $password) {
    // Sets the $result to null.
    $result = null;
    // If the $username and $password are entered correctly execute the statement.
    if(empty($username) || empty($password)) {
        // Sets the $result to true.
        $result = true;
    // Execute else statement if the username and password are enter correctly.
    } else {
        // Sets the $result to fasle.
        $result = false;
    }
    // Returns the variable $result.
    return $result;
}
// Create's a login function that checks the database against the $username and $password.
function loginUser($conn, $username, $password) {
    // Sets the variable $exist to equal $username and $email.
    $exists = Exists($conn, $username, $username);
    // If exist is not equal to $username or $email execute the statement.
    if($exists == false) {
        // Redirects them back to homepage.
        header("location: ../index.php");
        // Exits the if statement.
        exit();
    } 
    // Sets the salted password in the database to a variable called $passwordhased.
    $passwordhashed = $exists["password"];
    // Checks if the $password entered and the salted $passwordhashed are equal to the same thing.
    $checkhashed = password_verify($password, $passwordhashed);
    // If the password is not the same execute the statement.
    if($checkhashed = false) {
        // Redirects them back to homepage.
        header("location: ../index.php");
        // Exits the if statement.
        exit();
    }
    // If the password is the same execute the statement.
    else if($checkhashed = true) {
        // Starts a new session
        session_start();
        // Checks whether the id matchs a id within the database.
        $_SESSION["id"] = $exists["id"];
        // Checks whether the username matchs a username within the database.
        $_SESSION["username"] = $exists["username"];
        // Redirects them to the coinflip page.
        header("location: ../coinflip.php");
        // Exits the if statement.
        exit();
    }
}
?>
