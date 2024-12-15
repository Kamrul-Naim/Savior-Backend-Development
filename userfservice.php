<?php
// Database connection
$servername = "localhost"; // Change this to your server's host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "savior"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch fire service details from the database
$sql = "SELECT * FROM fire_stations";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fire Service Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Fire Service Information</h1>

        <?php
        // Check if any records exist in the database
        if ($result->num_rows > 0) {
            // Output data for each fire service
            while($row = $result->fetch_assoc()) {
                echo "<div class='bg-white shadow-md rounded-lg p-6 mb-6'>";
                echo "<h2 class='text-xl font-semibold text-gray-800'>" . $row['station_name'] . "</h2>";
                echo "<p class='text-lg text-gray-600'><strong>Location:</strong> " . $row['location'] . "</p>";
                echo "<p class='text-lg text-gray-600'><strong>Phone:</strong> <a href='tel:" . $row['phone_number'] . "' class='text-blue-600'>" . $row['phone_number'] . "</a></p>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center text-gray-600'>No fire service data found.</p>";
        }

        // Close the connection
        $conn->close();
        ?>

    </div>

</body>
</html>
