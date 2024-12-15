<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $contact_number = $_POST['contact_number'];
    $station_id = $_POST['station_id'];

    $stmt = $conn->prepare("INSERT INTO police_personnel (name, designation, contact_number, station_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $designation, $contact_number, $station_id]);

    header("Location: policestation.php");
}
?>
