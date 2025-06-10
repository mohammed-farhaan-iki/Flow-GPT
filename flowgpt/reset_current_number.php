<?php
// Database configuration
$host = "localhost";
$username = "mel";
$password = "mel123";
$database = "token";

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Reset the current number to 0
$query = "TRUNCATE TABLE applications"; // This will delete all entries
$result = $mysqli->query($query);

$mysqli->close();

// Redirect to the current number page
header("Location: b.php");
exit();
?>
