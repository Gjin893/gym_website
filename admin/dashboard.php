<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <div class="list-group mt-4">
        <a href="users.php" class="list-group-item list-group-item-action">Manage Users</a>
        <a href="machines.php" class="list-group-item list-group-item-action">Manage Machines</a>
        <a href="memberships.php" class="list-group-item list-group-item-action">Membership Requests</a>
        <a href="../logout.php" class="list-group-item list-group-item-action list-group-item-danger">Logout</a>
    </div>
</div>
</body>
</html>
