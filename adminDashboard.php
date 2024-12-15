<?php
// Starting session to handle admin-related data
session_start();

// Add Area
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_area'])) {
    $area_name = htmlspecialchars($_POST['area_name']);
    $query = "INSERT INTO areas (name) VALUES ('$area_name')";
    $conn->query($query);
}

// Add Hospital
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_hospital'])) {
    $hospital_name = htmlspecialchars($_POST['hospital_name']);
    $hospital_location = htmlspecialchars($_POST['hospital_location']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $query = "INSERT INTO hospitals (name, location, contact_number) 
              VALUES ('$hospital_name', '$hospital_location', '$contact_number')";
    $conn->query($query);
}

// Add Police Station
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_police_station'])) {
    $police_station_name = htmlspecialchars($_POST['police_station_name']);
    $area = htmlspecialchars($_POST['area']);
    $query = "INSERT INTO police_stations (name, area) 
              VALUES ('$police_station_name', '$area')";
    $conn->query($query);
}

// Add Police
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_police'])) {
    $police_name = htmlspecialchars($_POST['police_name']);
    $police_station = htmlspecialchars($_POST['police_station']);
    $query = "INSERT INTO police (name, police_station) 
              VALUES ('$police_name', '$police_station')";
    $conn->query($query);
}

// Add Fire Station
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_fire_station'])) {
    $fire_station_name = htmlspecialchars($_POST['fire_station_name']);
    $query = "INSERT INTO fire_stations (name) VALUES ('$fire_station_name')";
    $conn->query($query);
}

// Add Emergency Contact
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_emergency_contact'])) {
    $contact_name = htmlspecialchars($_POST['contact_name']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $query = "INSERT INTO emergency_contacts (name, contact_number) 
              VALUES ('$contact_name', '$contact_number')";
    $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <!-- Navbar -->
  <nav class="bg-blue-600 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">Admin Dashboard</h1>
      <form method="POST" action="./adminLogin.php">
        <button class="bg-blue-500 px-4 py-2 rounded hover:bg-blue-700">Logout</button>
      </form>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Add Area -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Add Area</h2>
        <form method="POST">
          <div class="mb-4">
            <label class="block text-gray-700">Area Name</label>
            <input type="text" name="area_name" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter area name">
          </div>
          <button type="submit" name="add_area" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add Area</button>
        </form>
      </div>
      
      <!-- Add Hospital -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Add Hospital</h2>
        <form method="POST">
          <div class="mb-4">
            <label class="block text-gray-700">Hospital Name</label>
            <input type="text" name="hospital_name" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter hospital name">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Hospital Location</label>
            <input type="text" name="hospital_location" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter hospital location">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Contact Number</label>
            <input type="text" name="contact_number" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter contact number">
          </div>
          <button type="submit" name="add_hospital" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add Hospital</button>
        </form>
      </div>

      <!-- Add Police Station -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Add Police Station</h2>
        <form method="POST">
          <div class="mb-4">
            <label class="block text-gray-700">Police Station Name</label>
            <input type="text" name="police_station_name" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter police station name">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Area</label>
            <input type="text" name="area" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Assign to area">
          </div>
          <button type="submit" name="add_police_station" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add Police Station</button>
        </form>
      </div>

      <!-- Add Police -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Add Police</h2>
        <form method="POST">
          <div class="mb-4">
            <label class="block text-gray-700">Police Name</label>
            <input type="text" name="police_name" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter police name">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Police Station</label>
            <input type="text" name="police_station" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Assign to police station">
          </div>
          <button type="submit" name="add_police" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add Police</button>
        </form>
      </div>

      <!-- Add Fire Station -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Add Fire Station</h2>
        <form method="POST">
          <div class="mb-4">
            <label class="block text-gray-700">Fire Station Name</label>
            <input type="text" name="fire_station_name" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter fire station name">
          </div>
          <button type="submit" name="add_fire_station" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add Fire Station</button>
        </form>
      </div>

      <!-- Add Emergency Contact -->
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-bold mb-4">Add Emergency Contact</h2>
        <form method="POST">
          <div class="mb-4">
            <label class="block text-gray-700">Contact Name</label>
            <input type="text" name="contact_name" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter contact name">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Contact Number</label>
            <input type="text" name="contact_number" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Enter contact number">
          </div>
          <button type="submit" name="add_emergency_contact" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Add Contact</button>
        </form>
      </div>

    </div>
  </div>
</body>
</html>
