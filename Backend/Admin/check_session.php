<?php
session_start(); // Start session
if (isset($_SESSION['test'])) {
    echo $_SESSION['test']; // Should output the session variable
} else {
    echo "Session variable not set."; // If it didn't persist
}
?>
