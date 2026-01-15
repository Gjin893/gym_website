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
header('Location: login.php'); exit;
}


$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM bookings WHERE id=?");
$stmt->bind_param('i', $id);
$stmt->execute();


header('Location: my_bookings.php');
exit;
?>