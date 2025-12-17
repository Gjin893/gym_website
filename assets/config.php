<?php
$conn = mysqli_connect("localhost", "root", "", "gym_db");
session_start();

if (!$conn) {
    die("Database connection failed");
}
?>
