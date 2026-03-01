<?php
include "../config.php";

$stmt = $conn->prepare(
    "SELECT * FROM messages ORDER BY created_at DESC"
);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Messages</title>
    <link rel="stylesheet" href="message.css">
</head>

<body>

<div class="admin-container">

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="../index.php">Dashboard</a>
    <a href="manage_projects.php">Projects</a>
    <a href="messages.php"></a>
    
</div>

<div class="content">

<h1>Received Messages</h1>

<table>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>

<tr>
<td><?= $row['name']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['message']; ?></td>
<td><?= $row['created_at']; ?></td>
</tr>

<?php endwhile; ?>

</table>

</div>
</div>

</body>
</html>

<?php $stmt->close(); ?>