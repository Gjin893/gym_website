<?php
include_once('config.php');

if (!isset($_GET['id'])) {
    die("No ID provided.");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM memberships WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if (!$user = $result->fetch_assoc()) {
    die("User not found.");
}

$name = htmlspecialchars($user['name']);
$email = htmlspecialchars($user['email']);
$membership = $user['membership_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Member</title>

<style>
body {
    background: #111;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 420px;
    margin: 80px auto;
    background: #1e1e1e;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(255,0,0,0.3);
}

h2 {
    text-align: center;
    color: #ff3b3b;
    margin-bottom: 25px;
}

label {
    color: #ccc;
    display: block;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 18px;
    border-radius: 5px;
    border: none;
    background: #2a2a2a;
    color: #fff;
}

input:focus, select:focus {
    outline: 2px solid #ff3b3b;
}

button {
    width: 100%;
    padding: 12px;
    background: #ff3b3b;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background: #e62e2e;
}
</style>
</head>

<body>

<div class="container">
    <h2>Edit Membership</h2>

    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label>Name</label>
        <input type="text" name="name" value="<?= $name ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $email ?>" required>

        <label>Membership Type</label>
        <select name="membership_type" required>
            <option value="basic" <?= $membership === 'basic' ? 'selected' : '' ?>>Basic</option>
            <option value="premium" <?= $membership === 'premium' ? 'selected' : '' ?>>Premium</option>
        </select>

        <button type="submit">Update Member</button>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>


