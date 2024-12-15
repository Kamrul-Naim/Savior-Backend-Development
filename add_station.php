<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $stmt = $conn->prepare("INSERT INTO police_stations (station_name, location) VALUES (?, ?)");
    $stmt->execute([$name, $location]);

    header("Location: policestation.php");
}
?>
