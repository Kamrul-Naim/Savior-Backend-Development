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

// Fetch all hospitals and their associated doctors
$hospitals = $conn->query("SELECT * FROM hospitals");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savior Hospitals</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-full">
    <!-- Navbar -->
    <nav class="shadow-md px-4 py-6 md:px-8" style="background-color: #61B6D6;">
        <div class="mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <p class="text-xl font-bold text-black" style="color: #03045e;">
                    <a href="./homePage2.html">SAVIOR HOSPITAL SERVICE</a>
                </p>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Hospitals and Doctors</h1>
            <p class="text-gray-600">Browse through the list of hospitals and their associated doctors.</p>
        </div>

        <!-- Hospital List -->
        <div class="space-y-6">
            <?php while ($hospital = $hospitals->fetch_assoc()): ?>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <!-- Hospital Name -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800"><?= htmlspecialchars($hospital['name']); ?></h2>
                        <p class="text-gray-600">Address: <?= htmlspecialchars($hospital['address']); ?></p>
                    </div>
                    <!-- Doctors List -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <?php
                        $hospital_id = $hospital['id'];
                        $doctors = $conn->query("SELECT * FROM doctors WHERE hospital_id = $hospital_id");
                        while ($doctor = $doctors->fetch_assoc()):
                        ?>
                            <div class="bg-gray-50 rounded-md p-4 shadow">
                                <h3 class="text-lg font-semibold text-gray-700"><?= htmlspecialchars($doctor['name']); ?></h3>
                                <p class="text-sm text-gray-500">Specialty: <?= htmlspecialchars($doctor['specialty']); ?></p>
                                <p class="text-sm text-gray-500">Experience: <?= htmlspecialchars($doctor['experience']); ?> years</p>
                                <p class="text-sm text-gray-500">Phone: <?= htmlspecialchars($doctor['phone_number']); ?></p>
                                <a href="tel:<?= htmlspecialchars($doctor['phone_number']); ?>">
                                    <button class="mt-2 bg-green-500 text-white px-3 py-1 text-sm rounded-md hover:bg-green-600">
                                        Call Doctor
                                    </button>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-gray-800 text-white">
        <footer class="py-10">
            <div class="container mx-auto px-4 text-center">
                <p>© Copyright by Savior | Design by <a href="#" class="text-cyan-500">musfiq611891</a></p>
            </div>
        </footer>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
