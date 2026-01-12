<?php
include_once('config.php');

/* ================= VALIDATE REQUEST ================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request.");
}

if (
    !isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['membership_type'])
) {
    die("Missing required fields.");
}

/* ================= SANITIZE ================= */
$id = (int) $_POST['id'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$membership = $_POST['membership_type'];

/* ================= BASIC VALIDATION ================= */
if ($id <= 0 || empty($name) || empty($email)) {
    die("Invalid input.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

$allowedMemberships = ['basic', 'premium'];
if (!in_array($membership, $allowedMemberships)) {
    die("Invalid membership type.");
}

/* ================= UPDATE QUERY ================= */
$sql = "UPDATE memberships 
        SET name = ?, email = ?, membership_type = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssi", $name, $email, $membership, $id);

/* ================= EXECUTE ================= */
if ($stmt->execute()) {
    header("Location: index.php?updated=1");
    exit;
} else {
    die("Update failed.");
}

$conn->close();
?>
