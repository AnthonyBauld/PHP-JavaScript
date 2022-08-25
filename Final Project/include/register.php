<?php
// Executes an if statement if the submit button is set.
if(isset($_POST["submit"])) {
    // Set's the username to the inputted name.
    $username = $_POST["name"];
    // Set's the email to the inputted email.
    $email = $_POST["email"];
    // Set's the password to the inputted password.
    $password = $_POST["password"];
    // Set's the cpassword to the inputted copypassword.
    $cpassword = $_POST["copypassword"];

    // The require function is used to evaluate the file "connect.php.".
    require_once "connect.php";
    // The require function is used to evaluate the file "validation.php.".
    require_once "validation.php";

    // If the input is empty run this if statement.
    if(emptyInput($username, $email, $password, $cpassword) != false) {
        // Redirects back to signup page.
        header("location: signup.php");
        // Exits if statement.
        exit();
    }
    // If theusnermae is not validated run this if statement.
    if(invalidUsername($username) != false) {
        // Redirects back to signup page.
        header("location: signup.php");
         // Exits if statement.
        exit();
    }
    // If the email is not validated run this if statement.
    if(invalidEmail($email) != false) {
        // Redirects back to signup page.
        header("location: signup.php");
         // Exits if statement.
        exit();
    }
    // If the password are not the same run this if statement.
    if(invalidPassword($password, $cpassword) != false) {
        // Redirects back to signup page.
        header("location: signup.php");
         // Exits if statement.
        exit();
    }
    // If the input already exists within the database run this if statement.
    if(Exists($conn, $username, $email) != false) {
        // Redirects back to signup page.
        header("location: signup.php");
         // Exits if statement.
        exit();
    }
    // If the input is empty run this if statement.
    createUser($conn, $username, $email, $password);
    // Executes a else statement if if the submit button is unset.
} else {
    // Redirects back to signup page.
    header("location: signup.php");
    // Exits if statement.
    exit();
}
?>
