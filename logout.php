<?php
// Start or resume the current session
session_start();

// Destroy the session data
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit; // Ensure that no further code is executed after redirection
?>
