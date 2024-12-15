<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change to your database username
$password = "";     // Change to your database password
$database = "savior"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the fire station details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM fire_stations WHERE id = $id");
    $station = $result->fetch_assoc();
} else {
    die("Fire station not found");
}

// Handle updating the station
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $stationName = $_POST['station_name'];
    $location = $_POST['location'];
    $phoneNumber = $_POST['phone_number'];

    $stmt = $conn->prepare("UPDATE fire_stations SET station_name=?, location=?, phone_number=? WHERE id=?");
    $stmt->bind_param("sssi", $stationName, $location, $phoneNumber, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: fireservice.php"); // Redirect back to the main page
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fire Station</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-red-600 text-white p-4">
            <h1 class="text-2xl font-bold text-center">Edit Fire Station</h1>
        </header>

        <!-- Main Content -->
        <main class="flex-grow p-6">

            <!-- Edit Fire Station Form -->
            <form action="edit.php?id=<?= $id; ?>" method="POST" class="mb-6 bg-white p-4 rounded shadow-lg">
                <h3 class="text-lg font-semibold mb-2">Edit Fire Station</h3>
                <div class="space-y-4">
                    <input type="text" name="station_name" value="<?= htmlspecialchars($station['station_name']); ?>" class="w-full border rounded px-4 py-2" required>
                    <input type="text" name="location" value="<?= htmlspecialchars($station['location']); ?>" class="w-full border rounded px-4 py-2" required>
                    <input type="text" name="phone_number" value="<?= htmlspecialchars($station['phone_number']); ?>" class="w-full border rounded px-4 py-2" required>
                    <button type="submit" name="action" value="edit" class="w-full py-2 bg-red-600 text-white rounded hover:bg-red-700">Update Fire Station</button>
                </div>
            </form>

        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white p-4 text-center">
            <p>© 2024 Fire Service Management</p>
        </footer>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
