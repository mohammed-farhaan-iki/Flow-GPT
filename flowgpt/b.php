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

$query = "SELECT * FROM applications";
$result = $mysqli->query($query);

$waitingList = array();

while ($row = $result->fetch_assoc()) {
    $waitingList[] = $row;
}

if (isset($_POST['next']) && !empty($waitingList)) {
    $firstApplicantID = $waitingList[0]['id'];

    $deleteQuery = "DELETE FROM applications WHERE id = ?";
    $deleteStmt = $mysqli->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $firstApplicantID);
    
    if ($deleteStmt->execute()) {
        $_SESSION['currentNumber'] = $firstApplicantID;
    }

    $deleteStmt->close();
}

if (isset($_POST['reset'])) {
    $_SESSION['currentNumber'] = 0;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<h1>Waiting List</h1>

<!-- Add a heading row above the table -->
<table>
    <tr>
        <th>Number</th>
        <th>Department</th>
        <th>Name</th>
    </tr>
    <?php foreach ($waitingList as $item): ?>
        <tr>
            <td><?php echo $item['application_number']; ?></td>
            <td><?php echo $item['department']; ?></td>
            <td><?php echo $item['name']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="button-container">
    <form action="b.php" method="post">
        <button type="submit" name="next">Next</button>
        </form>
        <form action="reset_waiting_list.php" method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
    </div>
</body>
</html>
