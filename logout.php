<?php
session_start(); // Start or resume the session

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

header("Location: login.html");
exit;
?>
