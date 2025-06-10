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

// Get form data
$applicationNumber = $_POST['application-number'];
$department = $_POST['department'];
$name = $_POST['name'];

// Insert data into the database
$query = "INSERT INTO applications (application_number, department, name) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sss", $applicationNumber, $department, $name);

if ($stmt->execute()) {
    header("Location: token.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
