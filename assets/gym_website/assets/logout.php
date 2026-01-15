
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<?php
session_start();
session_destroy();
header('Location: index.html');
?>