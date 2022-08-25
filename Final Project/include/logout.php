<?php

/**
    * I, Anthony. Bauld, certify that this material is my original work.  No other person's work has been used without due acknowledgement.   
    * December 10, 2021.
    *
    * When the user clicks the logout href on the coinflip page redirects them to this .php which will destroy the current session.
*/

// Starts a new session.
session_start();
// Unsets the current session.
session_unset();
// Destroys the current session.
session_destroy();
// Redirects back to the homepage.
header("location: ../index.php");
?>
