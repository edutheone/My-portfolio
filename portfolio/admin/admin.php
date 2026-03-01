<?php
session_start();
include "../config.php";

if (!isset($_SESSION["is_admin"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="admin-container">

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="projects.php">Add Project</a>
        <a href="manage_projects.php">Manage Projects</a>
        <a href="view_messages.php">View Messages</a>
        <a href="logout.php"></a>
    </div>

    <div class="content">
        <h1>Welcome, <?php echo $_SESSION["admin_username"]; ?> 👋</h1>

        <?php
        // Count total projects
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM projects");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $total_projects = $data["total"];
        $stmt->close();
        ?>

        <div class="card">
            <h3>Total Projects</h3>
            <p><?php echo $total_projects; ?></p>
        </div>

    </div>

</div>

</body>
</html>