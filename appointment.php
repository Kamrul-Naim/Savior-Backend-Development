<?php
// Start the session to manage user interactions
session_start();

// Handle appointment booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $notes = htmlspecialchars($_POST['notes']);

    // Save booking details to the database (logic not shown here)
    // For example: $conn->query("INSERT INTO appointments (date, time, notes) VALUES ('$date', '$time', '$notes')");

    // Redirect back to the page with a success message
    $_SESSION['message'] = 'Your appointment has been successfully booked!';
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-full">
  <!-- Navbar -->
  <nav class="shadow-md px-4 py-6 md:px-8" style="background-color: #61B6D6;">
    <div class="mx-auto flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center">
        <img src="./Images/Logo-removebg-preview.png" alt="Logo" class="h-8 w-8 mr-2">
        <p class="text-xl font-bold text-black" style="color: #03045e;"><a href="./homePage2.html">SAVIOR HOSPITAL SERVICE</a></p>
      </div>

      <!-- Desktop Navigation Links -->
      <div class="hidden md:flex space-x-3">
        <a href="./hospital.html" class="text-black hover:text-white text-xl font-medium" style="color: #03045e;">Hospital</a>
        <a href="./Police Management.html" class="text-white hover:text-black text-xl font-medium">Police Station</a>
        <a href="./Fire Service.html" class="text-white hover:text-black text-xl font-medium">Fire Service</a>
        <a href="#" class="text-white hover:text-black text-xl font-medium">About Us</a>
        <a href="./Emergency Contact.html" class="text-white hover:text-black text-xl font-medium">E.Contact</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-button" class="md:hidden text-gray-500 focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </nav>

  <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-full">
    <!-- Doctor Details Section -->
    <div class="flex flex-col md:flex-row md:items-start md:gap-6">
      <!-- Doctor's Photo -->
      <div class="w-full md:w-1/3 flex justify-center mb-4 md:mb-0">
        <img 
          src="./Images/woman-doctor-wearing-lab-coat-with-stethoscope-isolated.jpg" 
          alt="Doctor's Photo" 
          class="rounded-lg shadow-md w-48 h-48 object-cover"
        >
      </div>

      <!-- Doctor's Info -->
      <div class="w-full md:w-2/3">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Dr. John Doe</h1>
        <p class="text-blue-500 text-sm font-semibold mb-4">Cardiologist</p>

        <!-- Details -->
        <div class="text-gray-700 space-y-2">
          <p><span class="font-medium">Experience:</span> 15 years</p>
          <p><span class="font-medium">Education:</span> MBBS, MD (Cardiology)</p>
          <p><span class="font-medium">Languages:</span> English, Spanish</p>
        </div>

        <!-- Contact Info -->
        <div class="mt-6 space-y-2">
          <h3 class="font-bold text-gray-800 text-lg">Contact Information:</h3>
          <p><span class="font-medium">Phone:</span> +1 234 567 890</p>
          <p><span class="font-medium">Email:</span> johndoe@example.com</p>
          <p><span class="font-medium">Clinic Address:</span> 123 Medical Lane, Health City</p>
        </div>
      </div>
    </div>

    <!-- Biography Section -->
    <div class="mt-6">
      <h3 class="font-bold text-gray-800 text-lg">Biography:</h3>
      <p class="text-gray-600 mt-2">
        Dr. John Doe is a highly experienced cardiologist with over 15 years of expertise in diagnosing and treating cardiovascular diseases. He is passionate about patient care and specializes in minimally invasive procedures to improve heart health.
      </p>
    </div>

    <!-- Appointment Form -->
    <form method="POST">
      <!-- Select Date -->
      <div class="mb-4">
        <label for="date" class="block text-gray-700 font-medium mb-2">Select Date</label>
        <input type="date" id="date" name="date" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
      </div>

      <!-- Select Time -->
      <div class="mb-4">
        <label for="time" class="block text-gray-700 font-medium mb-2">Select Time</label>
        <input type="time" id="time" name="time" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
      </div>

      <!-- Additional Notes -->
      <div class="mb-4">
        <label for="notes" class="block text-gray-700 font-medium mb-2">Additional Notes (Optional)</label>
        <textarea id="notes" name="notes" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition">
        Book Appointment
      </button>
    </form>
  </div>

  <?php if (isset($_SESSION['message'])): ?>
    <!-- Popup Modal -->
    <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Appointment Confirmed</h2>
        <p class="text-gray-600"><?= $_SESSION['message']; ?></p>
        <button 
          onclick="closePopup()"
          class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition w-full">
          Close
        </button>
      </div>
    </div>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

  <script>
    // Function to close the popup
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
    }
  </script>
</body>
</html>
