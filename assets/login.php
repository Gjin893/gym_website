<?php include 'config.php'; ?>

<?php
if($_POST){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    $user = mysqli_fetch_assoc($q);
    if($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        if($user['role'] == 'admin') header("Location: admin/dashboard.php");
        else header("Location: index.php");
    } else { $error="Invalid credentials"; }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Login</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="register.php">Sign Up</a></p>
</div>
</body>
</html>
