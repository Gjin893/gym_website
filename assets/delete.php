<?php
include_once('config.php');

if (!isset($_GET['id'])) {
    die("No ID provided.");
}

$id = (int) $_GET['id'];

/* ================= FETCH USER ================= */
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
$membership = htmlspecialchars($user['membership_type']);

/* ================= DELETE ON CONFIRM ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $delete = $conn->prepare("DELETE FROM memberships WHERE id = ?");
    $delete->bind_param("i", $id);

    if ($delete->execute()) {
        header("Location: index.php?deleted=1");
        exit;
    } else {
        $error = "Failed to delete member.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Member</title>

<style>
body {
    background: #0f0f0f;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 420px;
    margin: 90px auto;
    background: #1b1b1b;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(255,0,0,0.4);
}

h2 {
    text-align: center;
    color: #ff3b3b;
    margin-bottom: 20px;
}

p {
    color: #ccc;
    text-align: center;
}

.info {
    background: #262626;
    padding: 15px;
    border-radius: 6px;
    margin: 20px 0;
    color: #eee;
}

.info strong {
    color: #ff3b3b;
}

.actions {
    display: flex;
    gap: 15px;
}

button {
    flex: 1;
    padding: 12px;
    border-radius: 6px;
    font-size: 15px;
    border: none;
    cursor: pointer;
}

.delete {
    background: #ff3b3b;
    color: white;
}

.delete:hover {
    background: #e62e2e;
}

.cancel {
    background: #333;
    color: #ccc;
}

.cancel:hover {
    background: #444;
}
</style>
</head>

<body>

<div class="container">
    <h2>Delete Member</h2>

    <p>Are you sure you want to permanently delete this member?</p>

    <div class="info">
        <p><strong>Name:</strong> <?= $name ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Membership:</strong> <?= ucfirst($membership) ?></p>
    </div>

    <?php if (!empty($error)): ?>
        <p style="color:red; text-align:center"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <div class="actions">
            <button class="delete" type="submit">Yes, Delete</button>
            <a href="index.php" style="flex:1">
                <button type="button" class="cancel">Cancel</button>
            </a>
        </div>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
