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

// Fetch data from the database
$query = "SELECT * FROM applications ORDER BY id DESC LIMIT 1"; // Assuming you want the latest entry
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $applicationNumberFromDatabase = $row['application_number'];
    $nameFromDatabase = $row['name'];
    $departmentFromDatabase = $row['department'];
    $idFromDatabase = $row['id'];
} else {
    // Handle the case where no data is found in the database
    $applicationNumberFromDatabase = "N/A";
    $nameFromDatabase = "N/A";
    $departmentFromDatabase = "N/A";
    $idFromDatabase = "N/A";
}

$mysqli->close();
?>

<html>
    <link rel="stylesheet" href="status.css">
    <aside class="profile-card">
        <header>
            <!-- here’s the avatar -->
            <br><br>
            <h1> YOUR NUMBER</h1>
            <br><br>
            <h1 class="num"><?php echo $idFromDatabase; ?></h1>

            <br><br>

            <!-- the username -->
            <h1>status</h1>

            <!-- and role or location -->
        </header>

        <!-- bit of a bio; who are you? -->
        <div class="profile-bio">
            <h2>Application Number: <?php echo $applicationNumberFromDatabase; ?></h2>
            <h2>Name: <?php echo $nameFromDatabase; ?></h2>
            <h2>Department: <?php echo $departmentFromDatabase; ?></h2>
        </div>
    </aside>
</html>

