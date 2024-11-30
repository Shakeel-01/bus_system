
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Insertion Form</title>
    <style>
        /* Styles remain the same */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            color: #333333;
        }

        input[type="text"],
        input[type="number"] {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Insert Employee</h2>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="Driver">Driver</option>
            <option value="Manager">Manager</option>
            <option value="Bus_Supervisor">Bus Supervisor</option>
        </select><br><br>

            <label for="contact_info">Contact Info:</label>
            <input type="text" id="contact_info" name="contact_Info">

            <label for="password">Password:</label>
            <input type="text" id="password" name="password">

            <label for="shift_schedule">Shift Schedule:</label>
            <input type="text" id="shift_schedule" name="shift_schedule">

            <button type="submit">Insert Employee</button>
        </form>
    </div>
</body>
</html>

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

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $role = $_POST['role'];
    $contact_Info = $_POST['contact_Info'];
    $password = $_POST['password'];
    $shift_schedule = $_POST['shift_schedule'];

    // Fetch Station_Id dynamically
    $station_query = "SELECT Station_Id FROM Bus_Station LIMIT 1";
    $result = $con->query($station_query);

    if (!$result) {
        die("Query failed: " . $con->error);
    }

    if ($result->num_rows > 0) {
        $station_row = $result->fetch_assoc();
        $station_Id = $station_row['Station_Id'];

        // Insert query
        $sql = "INSERT INTO Employee (`Name`, `Password`, `Role`, `Contact_Info`, `Shift_Schedule`, `Station_Id`) 
                VALUES ('$name', '$password', '$role', '$contact_Info', '$shift_schedule', $station_Id)";

        if ($con->query($sql) === TRUE) {
            echo "<script type='text/javascript'>
                    alert('Registration successful...You may Login now !!');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            die("Error: " . $sql . "<br>" . $con->error);
        }
    } else {
        die("No station found in the database.");
    }
}

// Close the connection
$con->close();
?>




