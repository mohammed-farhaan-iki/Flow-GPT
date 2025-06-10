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

// Query to get the id of the first applicant in the waiting list
$query = "SELECT id FROM applications ORDER BY id ASC LIMIT 1";
$result = $mysqli->query($query);

if ($result && $result->num_rows > 0) {
    // If there is an applicant in the waiting list, fetch and update the current number
    $row = $result->fetch_assoc();
    $currentNumber = $row['id'];

    // Remove the first applicant from the waiting list
    $deleteQuery = "DELETE FROM applications WHERE id = " . $currentNumber;
    $mysqli->query($deleteQuery);
}

$mysqli->close();

// Redirect back to the waiting list page
header("Location: b.php");
exit();
?>

