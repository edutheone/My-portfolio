<?php

include "../config.php";


$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $technologies = $_POST["technologies"];
    $github_link = $_POST["github_link"];

    // Image Upload Handling
    $image_name = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    $upload_dir = "../uploads/";

    // Generate unique image name
    $new_image_name = time() . "_" . basename($image_name);
    $target_file = $upload_dir . $new_image_name;

    if (move_uploaded_file($image_tmp, $target_file)) {

        // Prepared statement insert
        $stmt = $conn->prepare("INSERT INTO projects (title, description, image, technologies, github_link) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $description, $new_image_name, $technologies, $github_link);

        if ($stmt->execute()) {
            $message = "Project added successfully!";
        } else {
            $message = "Error adding project.";
        }

        $stmt->close();

    } else {
        $message = "Image upload failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project page</title>
    <link rel="stylesheet" href="project.css">
</head>
<body>

<div class="admin-container">

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin.php">Dashboard</a>
        <a href="view_messages.php">view messages</a>
        <a href="manage_projects.php">Manage Projects</a>
        
    </div>

    <div class="content">
        <h1>Add New Project</h1>

        <?php if ($message) echo "<p>$message</p>"; ?>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="title" placeholder="Project Title" required><br><br>

            <textarea name="description" placeholder="Project Description" required></textarea><br><br>

            <input type="text" name="technologies" placeholder="Technologies (e.g. PHP, MySQL, JS)" required><br><br>

            <input type="text" name="github_link" placeholder="github Link"><br><br>

            <input type="file" name="image" required><br><br>

            <button type="submit">Add Project</button>

        </form>

    </div>

</div>

</body>
</html>