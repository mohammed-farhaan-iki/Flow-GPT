<?php
$host = "localhost";
$username = "mel";
$password = "mel123";
$database = "token";

// Connection
$connection = new mysqli($host, $username, $password, $database);

// connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve data 
$Applicant_no = $_POST['application-number'];
$NAME = $_POST['name'];
$DEPT = $_POST['dept'];

// SQL query to insert data into the 'login' table
$sql = "INSERT INTO login (Applicant_no,name,dept) VALUES ('$Applicant_no', '$NAME', '$DEPT')";

if ($connection->query($sql) === TRUE) {
    header("Location: gen.html");
    exit();
} else {
    echo "Error: ". $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>