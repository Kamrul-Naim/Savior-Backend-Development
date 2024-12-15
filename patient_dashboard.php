<?php
// Fetch appointments for the logged-in patient
// Assuming the logged-in patient's ID is stored in $_SESSION['patient_id']


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-green-600 text-white p-4">
      <h1 class="text-2xl font-bold text-center">Patient Dashboard</h1>
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <section id="appointments-section">
        <h2 class="text-xl font-bold mb-4">My Appointments</h2>

        <!-- Appointments Table -->
        <div class="overflow-x-auto">
          <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-200">
              <tr>
                <th class="border border-gray-300 p-2">Appointment ID</th>
                <th class="border border-gray-300 p-2">Doctor</th>
                <th class="border border-gray-300 p-2">Date</th>
                <th class="border border-gray-300 p-2">Status</th>
              </tr>
            </thead>
            <tbody id="appointments-list">
             
                <tr>
                  <td class="border border-gray-300 p-2 text-center"></td>
                  <td class="border border-gray-300 p-2"></td>
                  <td class="border border-gray-300 p-2"></td>
                  <td class="border border-gray-300 p-2 text-center">
                    
                      <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Approved</span>
                    
                      <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Canceled</span>
                   
                      <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Pending</span>
                   
                  </td>
                </tr>
                
              
              <tr>
                <td colspan="4" class="border border-gray-300 p-4 text-center text-gray-500">No appointments found.</td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center p-4">
      <p>&copy; 2024 Hospital Management</p>
    </footer>
  </div>
</body>

</html>
