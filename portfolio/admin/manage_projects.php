<?php

include "../config.php";

// Fetch projects
$stmt = $conn->prepare("SELECT * FROM projects ORDER BY created_at DESC");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Projects</title>
    <link rel="stylesheet" href=".css">
    <style>
        /* General layout */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #f4f6f9;
    color: #333;
}

/* Container */
.admin-container {
    display: flex;
    min-height: 100vh;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background: #2c3e50;
    color: #fff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}

.sidebar h2 {
    margin-top: 0;
    font-size: 22px;
    text-align: center;
    border-bottom: 1px solid #444;
    padding-bottom: 10px;
}

.sidebar a {
    display: block;
    color: #ecf0f1;
    text-decoration: none;
    padding: 10px;
    margin: 8px 0;
    border-radius: 4px;
    transition: background 0.3s ease;
}

.sidebar a:hover {
    background: #34495e;
}

/* Content area */
.content {
    flex: 1;
    padding: 30px;
}

.content h1 {
    margin-top: 0;
    font-size: 26px;
    color: #2c3e50;
    margin-bottom: 20px;
}

/* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
    vertical-align: middle;
}

table th {
    background: #2c3e50;
    color: #fff;
    font-weight: bold;
}

table tr:nth-child(even) {
    background: #f9f9f9;
}

table tr:hover {
    background: #f1f1f1;
}

/* Image column */
table img {
    border-radius: 6px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.2);
}

/* Action links */
table td a {
    display: inline-block;
    padding: 6px 12px;
    background: #e74c3c;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s ease;
}

table td a:hover {
    background: #c0392b;
}
    </style>
</head>
<body>

<div class="admin-container">

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin.php">Dashboard</a>
        
        
    </div>

    <div class="content">
        <h1>Manage Projects</h1>

        <table border="1" cellpadding="10">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Technologies</th>
                <th>Actions</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <img src="../uploads/<?php echo $row['image']; ?>" width="80">
                </td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['technologies']; ?></td>
                <td>
                    <a href="delete_project.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>

        </table>

    </div>

</div>

</body>
</html>

<?php $stmt->close(); ?>