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

// Query to fetch all driver records
$sql = "SELECT * FROM Driver";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bus Drivers</title>
    <style>
        
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

        /* Responsive styles */
        @media (max-width: 768px) {
            table {
                width: 100%;
                margin: 10px;
            }
        }
    </style>
</head>
<body>

    <h2>List of Bus Drivers</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>License Number</th>
                    <th>Experience (years)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        
                        <td><?php echo htmlspecialchars($row['Driver_Id']); ?></td>
                        <td><?php echo htmlspecialchars($row['Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['License_Number']); ?></td>
                        <td><?php echo htmlspecialchars($row['Experience']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No drivers found in the database.</p>
    <?php endif; ?>

    <?php
    // Close connection
    $con->close();
    ?>

</body>
</html>
