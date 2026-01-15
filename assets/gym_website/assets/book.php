<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/gym_website/assets/style.css">
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
$trainer_id = $_POST['trainer_id'];
$date = $_POST['session_date'];
$time = $_POST['session_time'];


$stmt = $conn->prepare("INSERT INTO bookings (user_id, trainer_id, session_date, session_time) VALUES (?, ?, ?, ?)");
$stmt->bind_param('iiss', $user_id, $trainer_id, $date, $time);
$stmt->execute();


header('Location: dashboard.php');
exit;
?>