
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<?php
session_start();
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();


if ($user = $result->fetch_assoc()) {
if (password_verify($password, $user['password'])) {
$_SESSION['user_id'] = $user['id'];
$_SESSION['name'] = $user['name'];
header('Location: dashboard.php');
exit;
}
}
$error = 'Invalid login credentials';
}
?>


<form method="POST">
<h2>Login</h2>
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>