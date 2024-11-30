<?php
// Database connection
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bus_system';

$con = new mysqli($server, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch all bus records
$sql = "SELECT * FROM Bus";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bus Records</title>
    <style>
        /* Base Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
        .add-route-btn:hover {
            background-color: #45a049;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .table-container {
                width: 100%;
                padding: 15px;
            }

            th, td {
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
<h2>Bus Information</h2>

<!-- Add Route Button -->
<a href="bus.php" class="add-route-btn">Add Bus</a>
    <div class="table-container">
        
        <table>
            <tr>
                <th>Bus Id</th>
                <th>Bus Number</th>
                <th>Capacity</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Bus_Id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Bus_number']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['capacity']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records found</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>

<?php
$con->close();
?>
