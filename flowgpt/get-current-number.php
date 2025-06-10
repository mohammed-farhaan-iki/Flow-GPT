<?php
session_start();

$response = [
    'currentNumber' => 0,
    'updateCurrentNumber' => false // Initialize as false
];

if (isset($_SESSION['currentNumber'])) {
    $response['currentNumber'] = $_SESSION['currentNumber'];
}

// Check if there's a request to update the current number
if (isset($_GET['update'])) {
    // Set updateCurrentNumber to true if it should be updated
    $response['updateCurrentNumber'] = true;
    $_SESSION['updateCurrentNumber'] = false; // Reset the flag after acknowledging the request
}

echo json_encode($response);
?>

