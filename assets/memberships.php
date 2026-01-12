<?php include '../config.php'; ?>

<h2>Membership Requests</h2>

<?php
$req = mysqli_query($conn, "SELECT m.id, u.name, m.status FROM memberships m JOIN users u ON m.user_id=u.id");

while($r = mysqli_fetch_assoc($req)){
    echo $r['name']." - ".$r['status'].
    " <a href='?acc=".$r['id']."'>Accept</a>
      <a href='?rej=".$r['id']."'>Reject</a><br>";
}

if(isset($_GET['acc'])){
    mysqli_query($conn, "UPDATE memberships SET status='accepted' WHERE id=".$_GET['acc']);
}
if(isset($_GET['rej'])){
    mysqli_query($conn, "UPDATE memberships SET status='rejected' WHERE id=".$_GET['rej']);
}
?>
