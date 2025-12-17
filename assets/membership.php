<?php
include 'config.php';
$user_id = $_SESSION['user_id'];

mysqli_query($conn, "INSERT INTO memberships (user_id) VALUES ($user_id)");
header("Location: index.php");
