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

// Handle adding new fire station
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $stationName = $_POST['station_name'];
        $location = $_POST['location'];
        $phoneNumber = $_POST['phone_number'];

        $stmt = $conn->prepare("INSERT INTO fire_stations (station_name, location, phone_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $stationName, $location, $phoneNumber);
        $stmt->execute();
        $stmt->close();
    }

    // Handle updating an existing station
    if ($_POST['action'] == 'edit') {
        $id = $_POST['id'];
        $stationName = $_POST['station_name'];
        $location = $_POST['location'];
        $phoneNumber = $_POST['phone_number'];

        $stmt = $conn->prepare("UPDATE fire_stations SET station_name=?, location=?, phone_number=? WHERE id=?");
        $stmt->bind_param("sssi", $stationName, $location, $phoneNumber, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Handle deleting a fire station
    if ($_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM fire_stations WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all fire stations
$stations = $conn->query("SELECT * FROM fire_stations");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fire Service Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-red-600 text-white p-4">
            <h1 class="text-2xl font-bold text-center">Fire Service Dashboard</h1>
        </header>

        <!-- Main Content -->
        <main class="flex-grow p-6">

            <!-- Fire Stations Section -->
            <section class="mb-8">
                <h2 class="text-xl font-bold mb-4">Fire Stations</h2>

                <!-- Add Fire Station Form -->
                <form action="fireservice.php" method="POST" class="mb-6 bg-white p-4 rounded shadow-lg">
                    <h3 class="text-lg font-semibold mb-2">Add Fire Station</h3>
                    <div class="space-y-4">
                        <input type="text" name="station_name" placeholder="Fire Station Name" class="w-full border rounded px-4 py-2" required>
                        <input type="text" name="location" placeholder="Location" class="w-full border rounded px-4 py-2" required>
                        <input type="text" name="phone_number" placeholder="Phone Number" class="w-full border rounded px-4 py-2" required>
                        <button type="submit" name="action" value="add" class="w-full py-2 bg-red-600 text-white rounded hover:bg-red-700">Add Fire Station</button>
                    </div>
                </form>

                <!-- Fire Stations List -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Station Name</th>
                                <th class="border p-2">Location</th>
                                <th class="border p-2">Phone Number</th>
                                <th class="border p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($station = $stations->fetch_assoc()): ?>
                                <tr class="border-b">
                                    <td class="border p-2"><?= htmlspecialchars($station['station_name']); ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($station['location']); ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($station['phone_number']); ?></td>
                                    <td class="border p-2">
                                        <!-- Edit and Delete buttons -->
                                        <form action="index.php" method="POST" class="inline-block">
                                            <input type="hidden" name="id" value="<?= $station['id']; ?>">
                                            <button type="submit" name="action" value="delete" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                                        </form>
                                        <form action="edit.php" method="GET" class="inline-block">
                                            <input type="hidden" name="id" value="<?= $station['id']; ?>">
                                            <button type="submit" class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
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
