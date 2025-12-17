<?php include 'config.php'; ?>
<?php
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    mysqli_query($conn, "INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')");
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Sign Up</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Register</button>
    </form>
    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
