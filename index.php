<?php
require 'config.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_hospital'])) {
        $name = $_POST['hospital_name'];
        $doctor_name = $_POST['doctor_name'];
        $address = $_POST['address'];
        $stmt = $conn->prepare("INSERT INTO hospitals (name, doctor_name, address) VALUES (?, ?, ?)");
        $stmt->execute([$name, $doctor_name, $address]);
    } elseif (isset($_POST['add_fire_service'])) {
        $name = $_POST['fire_station_name'];
        $contact_number = $_POST['contact_number'];
        $stmt = $conn->prepare("INSERT INTO fire_stations (name, contact_number) VALUES (?, ?)");
        $stmt->execute([$name, $contact_number]);
    } elseif (isset($_POST['add_police_station'])) {
        $station_name = $_POST['station_name'];
        $officer_name = $_POST['officer_name'];
        $contact_number = $_POST['contact_number'];
        $stmt = $conn->prepare("INSERT INTO police_stations (station_name, officer_name, contact_number) VALUES (?, ?, ?)");
        $stmt->execute([$station_name, $officer_name, $contact_number]);
    } elseif (isset($_POST['add_emergency_contact'])) {
        $name = $_POST['contact_name'];
        $contact_number = $_POST['contact_number'];
        $stmt = $conn->prepare("INSERT INTO emergency_contacts (name, contact_number) VALUES (?, ?)");
        $stmt->execute([$name, $contact_number]);
    }
}

// Fetch data for display
$hospitals = $conn->query("SELECT * FROM hospitals")->fetchAll(PDO::FETCH_ASSOC);
$fireStations = $conn->query("SELECT * FROM fire_stations")->fetchAll(PDO::FETCH_ASSOC);
$policeStations = $conn->query("SELECT * FROM police_stations")->fetchAll(PDO::FETCH_ASSOC);
$emergencyContacts = $conn->query("SELECT * FROM emergency_contacts")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
  <!-- Sidebar -->
  <aside class="bg-white w-64 border-r hidden md:block">
    <div class="p-6">
      <h1 class="text-lg font-semibold mb-6">Admin Dashboard</h1>
      <nav>
        <ul class="space-y-4">
          <li><button class="w-full text-left flex items-center p-2 rounded-md hover:bg-gray-100 bg-blue-100" onclick="switchSection('hospital')">🏥 Hospital</button></li>
          <li><button class="w-full text-left flex items-center p-2 rounded-md hover:bg-gray-100" onclick="switchSection('fireService')">🚒 Fire Service</button></li>
          <li><button class="w-full text-left flex items-center p-2 rounded-md hover:bg-gray-100" onclick="switchSection('policeStation')">🚓 Police Station</button></li>
          <li><button class="w-full text-left flex items-center p-2 rounded-md hover:bg-gray-100" onclick="switchSection('emergencyContact')">📞 Emergency Contact</button></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <!-- Hospital Section -->
    <div id="hospitalSection" class="hidden">
      <h2 class="text-2xl font-bold mb-4">Hospital Management</h2>
      <form method="POST" class="bg-white p-4 rounded-lg shadow-md mb-6">
        <input type="text" name="hospital_name" placeholder="Hospital Name" class="w-full border rounded-md px-4 py-2 mb-2">
        <input type="text" name="doctor_name" placeholder="Doctor Name" class="w-full border rounded-md px-4 py-2 mb-2">
        <input type="text" name="address" placeholder="Address" class="w-full border rounded-md px-4 py-2 mb-2">
        <button name="add_hospital" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Hospital</button>
      </form>
      <ul>
        <?php foreach ($hospitals as $hospital): ?>
          <li><?= $hospital['name'] ?> - <?= $hospital['doctor_name'] ?> - <?= $hospital['address'] ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <!-- Other sections... -->
  </main>

  <script>
    function switchSection(sectionId) {
      const sections = ['hospitalSection', 'fireServiceSection', 'policeStationSection', 'emergencyContactSection'];
      sections.forEach(section => document.getElementById(section).classList.add('hidden'));
      document.getElementById(sectionId).classList.remove('hidden');
    }
    switchSection('hospital');
  </script>
</body>
</html>
