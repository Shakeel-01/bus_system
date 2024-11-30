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

// Query to fetch all route records
$sql = "SELECT * FROM Route";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Route Records</title>
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 0;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        h2 {
            color: #333333;
        }

        /* Button styles */
        .add-route-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .add-route-btn:hover {
            background-color: #45a049;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            table {
                width: 100%;
                margin: 10px;
            }

            .add-route-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <h2>List of Bus Routes</h2>

    <!-- Add Route Button -->
    <a href="route.php" class="add-route-btn">Add Route</a>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Route Name</th>
                    <th>Total Distance (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Route_Id']; ?></td>
                        <td><?php echo htmlspecialchars($row['Route_Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Total_Distance']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No routes found in the database.</p>
    <?php endif; ?>

    <?php
    // Close connection
    $con->close();
    ?>

</body>
</html>
