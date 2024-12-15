<?php include('config.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $station_name = $_POST['station_name'];
    $location = $_POST['location'];
    $officer_name = $_POST['officer_name'];
    $designation = $_POST['designation'];
    $phone_number = $_POST['phone_number'];

    $sql = "UPDATE police_stations SET station_name='$station_name', location='$location', officer_name='$officer_name', designation='$designation', phone_number='$phone_number' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM police_stations WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="station_name" value="<?php echo $row['station_name']; ?>" required>
    <input type="text" name="location" value="<?php echo $row['location']; ?>" required>
    <input type="text" name="officer_name" value="<?php echo $row['officer_name']; ?>" required>
    <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
    <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
    <button type="submit">Update Police Station</button>
</form>
