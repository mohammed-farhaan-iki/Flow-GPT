<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST["new-username"];
    $email = $_POST["email"];
    $newPassword = $_POST["new-password"];

    // Validate the data (server-side validation)
    if (empty($newUsername) || empty($email) || empty($newPassword)) {
        $response = array(
            "status" => "error",
            "message" => "All fields are required."
        );
    } else {
        // Hash the password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Assign the "Regular User" role by default
        $role = "Regular User";

        // Connect to your database (replace with your database credentials)
        $dbHost = "localhost";
        $dbUser = "mel";
        $dbPassword = "mel123";
        $dbName = "token";

        $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        if ($conn->connect_error) {
            // Handle database connection error
            $response = array(
                "status" => "error",
                "message" => "Database connection error."
            );
        } else {
            // Check if the username already exists
            $checkQuery = "SELECT * FROM users WHERE username = ?";
            $stmtCheck = $conn->prepare($checkQuery);
            $stmtCheck->bind_param("s", $newUsername);
            $stmtCheck->execute();
            $result = $stmtCheck->get_result();

            if ($result->num_rows == 0) {
                // Insert the new user into the database using prepared statement
                $insertQuery = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
                $stmtInsert = $conn->prepare($insertQuery);
                $stmtInsert->bind_param("ssss", $newUsername, $email, $hashedPassword, $role);

                if ($stmtInsert->execute()) {
                    $response = array(
                        "status" => "success",
                        "message" => "Registration successful. You can now log in."
                    );
                } else {
                    // Handle database insertion error
                    $response = array(
                        "status" => "error",
                        "message" => "Database insertion error."
                    );
                }
            } else {
                // Handle username already exists
                $response = array(
                    "status" => "error",
                    "message" => "Username already exists."
                );
            }

            $conn->close();
        }
    }

    // Send the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>
