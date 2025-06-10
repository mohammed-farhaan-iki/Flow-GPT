<?php
session_start();

$host = "localhost";
$username = "mel";
$password = "mel123";
$database = "token";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Truncate the table to delete all rows
$truncateQuery = "TRUNCATE TABLE applications";
$mysqli->query($truncateQuery);

// Alter the table to reset the auto-increment counter
$alterQuery = "ALTER TABLE applications AUTO_INCREMENT = 1";
$mysqli->query($alterQuery);

$_SESSION['currentNumber'] = 0;

$mysqli->close();

header("Location: b.php");
exit();
?>

