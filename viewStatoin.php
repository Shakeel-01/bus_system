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

// Fetch all records from Bus_Station table
$sql = "SELECT * FROM Bus_Station";
$result = $con->query($sql);

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bus Stations</title>
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }

        table th, table td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #666666;
        }
    </style>
</head>
<body>
    <h2>Bus Stations</h2>

    <div class="button-container">
        <a href="station.php">
            <button>Insert Station</button>
        </a>
    </div>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Station ID</th>
                    <th>Station Name</th>
                    <th>Location</th>
                    <th>Contact Info</th>
                    <th>Operating Hours</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Station_Id']) ?></td>
                        <td><?= htmlspecialchars($row['Station_name']) ?></td>
                        <td><?= htmlspecialchars($row['Location']) ?></td>
                        <td><?= htmlspecialchars($row['Contact_Info']) ?></td>
                        <td><?= htmlspecialchars($row['Operating_Hours']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-data">No bus station records found.</div>
    <?php endif; ?>
</body>
</html>
