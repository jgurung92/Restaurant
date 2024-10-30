<?php
session_start(); // Start session

// Set a test session variable
$_SESSION['test'] = "Session is working!";
echo $_SESSION['test']; // Output the session variable

// Create another page to check if it persists
echo "<br><a href='check_session.php'>Check Session</a>";
?>
