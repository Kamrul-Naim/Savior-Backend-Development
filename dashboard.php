<?php
// Database connection
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = ''; // Replace with your database password
$dbName = 'savior';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_hospital'])) {
        // Add new hospital
        $name = $conn->real_escape_string($_POST['hospital_name']);
        $address = $conn->real_escape_string($_POST['address']);
        $conn->query("INSERT INTO hospitals (name, address) VALUES ('$name', '$address')");
    }

    if (isset($_POST['add_doctor'])) {
        // Add new doctor
        $name = $conn->real_escape_string($_POST['doctor_name']);
        $specialty = $conn->real_escape_string($_POST['specialty']);
        $experience = (int)$_POST['experience'];
        $phone_number = $conn->real_escape_string($_POST['phone_number']);
        $hospital_id = (int)$_POST['hospital_id'];
        $conn->query("INSERT INTO doctors (name, specialty, experience, phone_number, hospital_id) VALUES ('$name', '$specialty', $experience, '$phone_number', $hospital_id)");
    }

    if (isset($_POST['edit_doctor'])) {
        // Edit doctor details
        $doctor_id = (int)$_POST['doctor_id'];
        $name = $conn->real_escape_string($_POST['doctor_name']);
        $specialty = $conn->real_escape_string($_POST['specialty']);
        $experience = (int)$_POST['experience'];
        $phone_number = $conn->real_escape_string($_POST['phone_number']);
        $conn->query("UPDATE doctors SET name='$name', specialty='$specialty', experience=$experience, phone_number='$phone_number' WHERE id=$doctor_id");
    }

    if (isset($_POST['delete_hospital'])) {
        // Delete hospital
        $hospital_id = (int)$_POST['hospital_id'];
        $conn->query("DELETE FROM hospitals WHERE id = $hospital_id");
    }

    if (isset($_POST['delete_doctor'])) {
        // Delete doctor
        $doctor_id = (int)$_POST['doctor_id'];
        $conn->query("DELETE FROM doctors WHERE id = $doctor_id");
    }
}

// Fetch hospitals and doctors
$hospitals = $conn->query("SELECT * FROM hospitals");
$doctors = $conn->query("SELECT doctors.*, hospitals.name AS hospital_name FROM doctors LEFT JOIN hospitals ON doctors.hospital_id = hospitals.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-4">
            <h1 class="text-2xl font-bold text-center">Hospital Management Dashboard</h1>
        </header>

        <!-- Main Content -->
        <main class="p-6">
            <!-- Hospitals Section -->
            <section class="mb-8">
                <h2 class="text-xl font-bold mb-4">Hospitals</h2>
                <form method="POST" class="mb-4 bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-semibold mb-2">Add Hospital</h3>
                    <div class="space-y-4">
                        <input type="text" name="hospital_name" placeholder="Hospital Name" class="w-full border rounded px-4 py-2" required>
                        <input type="text" name="address" placeholder="Address" class="w-full border rounded px-4 py-2" required>
                        <button type="submit" name="add_hospital" class="px-4 py-2 bg-blue-500 text-white rounded">Add Hospital</button>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Name</th>
                                <th class="border p-2">Address</th>
                                <th class="border p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($hospital = $hospitals->fetch_assoc()): ?>
                                <tr>
                                    <td class="border p-2"><?= htmlspecialchars($hospital['name']) ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($hospital['address']) ?></td>
                                    <td class="border p-2">
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="hospital_id" value="<?= $hospital['id'] ?>">
                                            <button type="submit" name="delete_hospital" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Doctors Section -->
            <section>
                <h2 class="text-xl font-bold mb-4">Doctors</h2>
                <form method="POST" class="mb-4 bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-semibold mb-2">Add Doctor</h3>
                    <div class="space-y-4">
                        <input type="text" name="doctor_name" placeholder="Doctor Name" class="w-full border rounded px-4 py-2" required>
                        <input type="text" name="specialty" placeholder="Specialty" class="w-full border rounded px-4 py-2" required>
                        <input type="number" name="experience" placeholder="Experience (Years)" class="w-full border rounded px-4 py-2" required>
                        <input type="text" name="phone_number" placeholder="Phone Number" class="w-full border rounded px-4 py-2" required>
                        <select name="hospital_id" class="w-full border rounded px-4 py-2" required>
                            <option value="" disabled selected>Select Hospital</option>
                            <?php $hospitals->data_seek(0); while ($hospital = $hospitals->fetch_assoc()): ?>
                                <option value="<?= $hospital['id'] ?>"><?= htmlspecialchars($hospital['name']) ?></option>
                            <?php endwhile; ?>
                        </select>
                        <button type="submit" name="add_doctor" class="px-4 py-2 bg-blue-500 text-white rounded">Add Doctor</button>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Name</th>
                                <th class="border p-2">Specialty</th>
                                <th class="border p-2">Experience</th>
                                <th class="border p-2">Phone</th>
                                <th class="border p-2">Hospital</th>
                                <th class="border p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($doctor = $doctors->fetch_assoc()): ?>
                                <tr>
                                    <td class="border p-2"><?= htmlspecialchars($doctor['name']) ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($doctor['specialty']) ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($doctor['experience']) ?> years</td>
                                    <td class="border p-2"><?= htmlspecialchars($doctor['phone_number']) ?></td>
                                    <td class="border p-2"><?= htmlspecialchars($doctor['hospital_name']) ?></td>
                                    <td class="border p-2">
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="doctor_id" value="<?= $doctor['id'] ?>">
                                            <input type="hidden" name="doctor_name" value="<?= $doctor['name'] ?>">
                                            <input type="hidden" name="specialty" value="<?= $doctor['specialty'] ?>">
                                            <input type="hidden" name="experience" value="<?= $doctor['experience'] ?>">
                                            <input type="hidden" name="phone_number" value="<?= $doctor['phone_number'] ?>">
                                            <button type="submit" name="edit_doctor" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                                            <button type="submit" name="delete_doctor" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
