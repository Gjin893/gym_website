<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<link rel="stylesheet" href="../assets/style.css">
<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user_id'])) {
header('Location: login.php'); exit;
}


$id = $_GET['id'];
$booking = $conn->query("SELECT * FROM bookings WHERE id=$id")->fetch_assoc();
$trainers = $conn->query("SELECT * FROM trainers");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$trainer_id = $_POST['trainer_id'];
$date = $_POST['session_date'];
$time = $_POST['session_time'];


$stmt = $conn->prepare("UPDATE bookings SET trainer_id=?, session_date=?, session_time=? WHERE id=?");
$stmt->bind_param('issi', $trainer_id, $date, $time, $id);
$stmt->execute();
header('Location: my_bookings.php'); exit;
}
?>


<h2>Edit Booking</h2>
<form method="POST">
<select name="trainer_id">
<?php while($t = $trainers->fetch_assoc()): ?>
<option value="<?= $t['id'] ?>" <?= $t['id']==$booking['trainer_id']?'selected':'' ?>>
<?= $t['name'] ?>
</option>
<?php endwhile; ?>
</select>
<input type="date" name="session_date" value="<?= $booking['session_date'] ?>" required>
<input type="time" name="session_time" value="<?= $booking['session_time'] ?>" required>
<button type="submit">Update</button>
</form>