<?php
// Include the database connection
include 'config.php';

// Fetch all police station records
try {
    $query = "SELECT * FROM police_stations";
    $stmt = $conn->query($query);
    $policeStations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Station Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Police Station Information</h1>
    
    <?php if (count($policeStations) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($policeStations as $station): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($station['id']); ?></td>
                        <td><?php echo htmlspecialchars($station['station_name']); ?></td>
                        <td><?php echo htmlspecialchars($station['location']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No police stations found.</p>
    <?php endif; ?>
</body>
</html>
