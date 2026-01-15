
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
exit;
}


$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT b.*, t.name AS trainer_name FROM bookings b JOIN trainers t ON b.trainer_id=t.id WHERE b.user_id=$user_id");
?>


<h2>My Bookings</h2>
<a href="dashboard.php">Back</a>
<table border="1">
<tr>
<th>Trainer</th><th>Date</th><th>Time</th><th>Actions</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['trainer_name'] ?></td>
<td><?= $row['session_date'] ?></td>
<td><?= $row['session_time'] ?></td>
<td>
<a href="edit_booking.php?id=<?= $row['id'] ?>">Edit</a> |
<a href="delete_booking.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete booking?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
