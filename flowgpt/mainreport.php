<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- =============== CSS =============== -->
        
        <link rel="stylesheet" href="table.css">

        <title>Token Gen</title>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</head>
<body>


      <?php
        // Your PHP code to fetch data from the database goes here
        $servername = "localhost";
        $username = "mel";
        $password = "mel123";
        $dbname = "token";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM login";
        $result = $conn->query($sql);
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <h1>Data Display</h1>
    <table>
        <tr>
            <th>Applicant_number</th>
            <th>name</th>
            <th>department</th>
            <th>date and time</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Applicant_no"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["dept"] . "</td>";
                echo"<td>".$row['date and time']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

     

        <!--=============== MAIN JS ===============-->
      
    </body>
    </html>