<?php
session_start();

include '../config.php';




if ($_SERVER['REQUEST_METHOD']=='POST') {
    $admin_username = trim($_POST['username']);
    $admin_password = trim($_POST['password']);

    $valid_username = "Edwin";
    $valid_password = "Edwin2158";

    if ($admin_username === $valid_username && $admin_password === $valid_password) {
        $_SESSION['is_admin'] = true;
        $_SESSION['admin_username'] = $admin_username;
        header("Location: admin.php");
        exit;
    } 
    else{
        $error = "X invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
     <div class="login-container">
        <h2>🔐 Admin Login</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label>User name</label>
            <input type="text" name="username" placeholder="Enter admin username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>

            <button type="submit">Login</button>
        </form>

        <p class="note">Return to <a href="index.php">Home</a></p>
    </div>
</body>
</html>