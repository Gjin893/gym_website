<?php
$conn = new mysqli("localhost", "root", "", "fitness_booking");
if ($conn->connect_error) die("DB connection error: " . $conn->connect_error);
?>