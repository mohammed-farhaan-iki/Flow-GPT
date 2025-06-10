<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace with your actual database credentials
    $dbHost = "localhost";
    $dbUser = "mel";
    $dbPassword = "mel123";
    $dbName = "token";

    // Create an array to store the response
    $response = array();

    // Connect to the database
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        $response["status"] = "error";
        $response["message"] = "Connection failed: " . $conn->connect_error;
    } else {
        // Prepare and execute a SQL query to retrieve user data
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User found, retrieve user data
            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];
            $userRole = $row["role"]; // Get the user's role from the database

            // Verify the provided password against the stored password
            if (password_verify($password, $storedPassword)) {
                // Passwords match, authentication successful
                $response["status"] = "success";
                $response["message"] = "Authentication successful.";

                // Check the user's role and set a session variable
                session_start();
                $_SESSION["authenticated"] = true;
                $_SESSION["userRole"] = $userRole;

            } else {
                // Passwords do not match, authentication failed
                $response["status"] = "error";
                $response["message"] = "Authentication failed. Invalid username or password.";
            }
        } else {
            // User not found, authentication failed
            $response["status"] = "error";
            $response["message"] = "Authentication failed. User not found.";
        }

        // Close the database connection
        $conn->close();
    }

    // Send the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>






