<?php
// Start session to track user login state
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking Platform</title>
    <style>
        /* Reset and Basic Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        body {
            font-family: Arial, sans-serif;
            background: url('busimage.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
        }

        /* Flexbox layout */
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6); /* Transparent background */
            color: white;
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #ffffff;
            font-weight: 500;
        }

        .admin-signin {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .admin-signin:hover {
            background-color: #45a049;
        }

        .mobile-menu-icon {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Main Section */
        .main-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-bottom: 50px;
        }

        .main-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .search-form input {
            padding: 10px;
            width: 200px;
            border: none;
            border-radius: 4px;
        }

        .search-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #45a049;
        }

        /* Footer */
        footer {
            padding: 40px 20px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .navbar {
                flex-wrap: wrap;
            }

            .mobile-menu-icon {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
            }

            .nav-links a {
                text-align: center;
                padding: 10px;
                background-color: #333333;
                border-radius: 4px;
            }

            .nav-links.show {
                display: flex;
            }

            .main-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">
                BUS SYSTEM
            </div>
            <div class="mobile-menu-icon" onclick="toggleMenu()">☰</div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="viewRoute.php">Route</a></li>
                <li><a href="viewBus.php">Bus</a></li>
                <li><a href="viewStatoin.php">Station</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact Us</a></li>
                <?php if (isset($_SESSION['contact_Info'])): ?>
                    <li><a href="profile.php" class="admin-signin">Profile</a></li>
                    <li><a href="logout.php" class="admin-signin">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="admin-signin">Admin Sign In</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content">
        <!-- Main Section -->
        <main class="main-section">
            <h1>Search for Bus Tickets</h1>
            <form class="search-form">
                <input type="text" placeholder="Enter Bus Name" required>
                <input type="text" placeholder="Enter Bus Station" required>
                <button type="submit">Search</button>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Bus System. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript for Mobile Menu -->
    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('show');
        }
    </script>

</body>
</html>
