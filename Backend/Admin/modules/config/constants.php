
<?php
// Start Session
session_start();

// Define constants to store DB credentials
        define('SITEURL', 'http://localhost/restaurant/backend/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'restaurant');

        // Establish connection
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die('Connection error: ' . mysqli_connect_error());

        // Select database
        $db_selected = mysqli_select_db($conn, DB_NAME);
        if (!$db_selected) {
            die('Database selection error: ' . mysqli_error($conn));
        }
?>