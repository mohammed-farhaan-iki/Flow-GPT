<?php
// Database configuration
$host = "localhost";
$username = "mel";
$password = "mel123";
$database = "token";

$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the first child in the waiting list
$query = "SELECT * FROM applications ORDER BY id ASC LIMIT 1";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentNumber = $row['id']; // Use 'id' as the current number

    // Remove the first child from the waiting list
    $deleteQuery = "DELETE FROM applications WHERE id = {$row['id']}";
    if ($mysqli->query($deleteQuery) === TRUE) {
        // Successfully removed the first child from the waiting list

        // Update the current number
        $updateCurrentNumberQuery = "UPDATE current_number_table SET current_number = $currentNumber";
        if ($mysqli->query($updateCurrentNumberQuery) === TRUE) {
            // Successfully updated the current number

            // Redirect back to the waiting list page
            header("Location: b.php");
            exit();
        } else {
            echo "Error updating current number: " . $mysqli->error;
        }
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
} else {
    // No children in the waiting list
    header("Location: b.php");
    exit();
}

$mysqli->close();
?>