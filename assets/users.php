<?php include '../config.php'; ?>

<h2>Users</h2>
<?php
$users = mysqli_query($conn, "SELECT * FROM users");
while($u = mysqli_fetch_assoc($users)){
    echo $u['name']." - ".$u['email']." <a href='?del=".$u['id']."'>Delete</a><br>";
}

if(isset($_GET['del'])){
    mysqli_query($conn, "DELETE FROM users WHERE id=".$_GET['del']);
    header("Location: users.php");
}
?>
