<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

/* Later you can add payment logic here */

header("Location: dashboard.php");
exit;

