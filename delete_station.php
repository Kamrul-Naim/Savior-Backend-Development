<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM police_stations WHERE id = ?");
$stmt->execute([$id]);

header("Location: policestation.php");
?>
