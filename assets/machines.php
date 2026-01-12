<?php include '../config.php'; ?>

<form method="POST">
    <input name="name" placeholder="Machine Name">
    <textarea name="desc"></textarea>
    <button>Add</button>
</form>

<?php
if($_POST){
    mysqli_query($conn, "INSERT INTO machines (name,description) VALUES ('$_POST[name]','$_POST[desc]')");
}

$machines = mysqli_query($conn, "SELECT * FROM machines");
while($m = mysqli_fetch_assoc($machines)){
    echo $m['name']." <a href='?del=".$m['id']."'>Delete</a><br>";
}

if(isset($_GET['del'])){
    mysqli_query($conn, "DELETE FROM machines WHERE id=".$_GET['del']);
    header("Location: machines.php");
}
?>
