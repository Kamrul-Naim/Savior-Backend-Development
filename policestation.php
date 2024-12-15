<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Police Station Dashboard</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Police Station Dashboard</h1>

    <!-- Add Police Station -->
    <h2>Add Police Station</h2>
    <form method="POST" action="add_station.php">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Location:</label>
        <input type="text" name="location" required>
		<label>phone_number:</label>
        <input type="text" name="phone_number" required>
        <button type="submit">Add</button>
    </form>

    <!-- List Police Stations -->
    <h2>Police Stations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>phone_number</th>
				<th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stations = $conn->query("SELECT * FROM police_stations")->fetchAll();
            foreach ($stations as $station) {
                echo "<tr>
                    <td>{$station['id']}</td>
                    <td>{$station['station_name']}</td>
                    <td>{$station['location']}</td>
					<td>{$station['phone_number']}</td>
                    <td>
                        <a href='edit_station.php?id={$station['id']}'>Edit</a> |
                        <a href='delete_station.php?id={$station['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Add Police Personnel -->
    <h2>Add Police Personnel</h2>
    <form method="POST" action="add_personnel.php">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Designation:</label>
        <input type="text" name="designation" required>
        <label>Contact Number:</label>
        <input type="text" name="contact_number">
        <label>Station:</label>
        <select name="station_id" required>
            <?php
            foreach ($stations as $station) {
                echo "<option value='{$station['id']}'>{$station['name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Add</button>
    </form>

    <!-- List Police Personnel -->
    <h2>Police Personnel</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Contact Number</th>
                <th>Station</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $personnel = $conn->query("
                SELECT *, name AS station_name 
                FROM police_personnel 
                JOIN police_stations  ON station_id = id
            ")->fetchAll();
            foreach ($personnel as $person) {
                echo "<tr>
                    <td>{$person['id']}</td>
                    <td>{$person['name']}</td>
                    <td>{$person['designation']}</td>
                    <td>{$person['contact_number']}</td>
                    <td>{$person['station_name']}</td>
                    <td>
                        <a href='edit_personnel.php?id={$person['id']}'>Edit</a> |
                        <a href='delete_personnel.php?id={$person['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
