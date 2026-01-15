<?php
require 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="nav">Available Trainers</div>

<div class="container">
<h2>Find Your Trainer</h2>

<?php
$result = $conn->query("SELECT users.id, users.name, trainers.specialty, trainers.bio 
                        FROM users 
                        JOIN trainers ON users.id = trainers.id");

while ($row = $result->fetch_assoc()): ?>

    <div class="trainer-card">
        <h3><?= $row['name']; ?></h3>
        <p><strong>Specialty:</strong> <?= $row['specialty']; ?></p>
        <p><?= $row['bio']; ?></p>
        <a href="book.php?trainer_id=<?= $row['id']; ?>">
            <button>Book Session</button>
        </a>
    </div>

<?php endwhile; ?>

</div>
</body>
</html>