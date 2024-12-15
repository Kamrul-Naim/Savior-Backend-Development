<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM police_personnel WHERE id = ?");
$stmt->execute([$id]);

header("Location: policestation.php");
?>
