<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<a href="my_bookings.php" >My Bookings</a>
<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
exit;
}


$trainers = $conn->query("SELECT * FROM trainers");
?>


<h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
<a href="logout.php">Logout</a>


<h3>Book a Training Session</h3>
<form method="POST" action="book.php">
<select name="trainer_id" required>
<?php while ($t = $trainers->fetch_assoc()): ?>
<option value="<?= $t['id'] ?>"><?= $t['name'] ?> - <?= $t['specialty'] ?></option>
<?php endwhile; ?>
</select>
<input type="date" name="session_date" required>
<input type="time" name="session_time" required>
<button type="submit">Book Session</button>
</form>