<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gym Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyGym</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h1 class="mb-4">Welcome to MyGym</h1>

    <h3>Our Gym Interior & Machines</h3>
    <div class="row">
        <div class="col-md-3"><img src="images/gym1.jpg" class="img-fluid rounded mb-3"></div>
        <div class="col-md-3"><img src="images/gym2.jpg" class="img-fluid rounded mb-3"></div>
        <div class="col-md-3"><img src="images/machine1.jpg" class="img-fluid rounded mb-3"></div>
        <div class="col-md-3"><img src="images/machine2.jpg" class="img-fluid rounded mb-3"></div>
    </div>

    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="mt-4">
            <h3>Buy Membership</h3>
            <form method="POST" action="membership.php">
                <button type="submit" class="btn btn-primary">Pay & Request Membership</button>
            </form>
        </div>
    <?php else: ?>
        <p class="mt-4">Please <a href="login.php">login</a> to purchase a membership.</p>
  
  <?php endif; ?>
</div>

</body>
</html>
