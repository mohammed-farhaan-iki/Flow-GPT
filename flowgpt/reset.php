<?php
include 'database_functions.php';

// Reset the queue and update the database
$success = resetQueue();
if ($success) {
    // Return a success message if needed
    echo "Queue reset successfully";
} else {
    // Handle errors if the reset operation fails
    echo "Error resetting queue";
}
?>
