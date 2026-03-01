<?php
include "config.php";

// Fetch projects
$stmt = $conn->prepare("SELECT * FROM projects ORDER BY created_at DESC");
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>Monari Edwin portfolio</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>


<header class="navbar">
    <h2>Monari Ediwin</h2>
    <nav>
        <a href="#home">Home</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>
    </nav>
</header>


<section class="hero" id="home">
    <h1>Hi, I'm Monari 👋</h1>
    <p>Full Stack Web Developer <br>(HTML, CSS, Java script,PHP ,MySQL Specialist).<br>
Network Administrator</p>
    <a href="#projects" class="btn">View my work</a>
    <a href="about.php" class="btn">About mySelf</a>
    <a href="#projects" class="btn">contact me</a>
    
    <h2>Download My CV</h2>
    
    <a href="http://localhost/portfolio/uploads/my_cv.pdf" target="_blank" class="btn">
        View CV
    </a>

    <a href="http://localhost/portfolio/uploads/my_cv.pdf" download class="btn">
        Download CV
    </a>

</section>


<section class="projects" id="projects">
    <h2>My Live Projects</h2>

    <div class="project-grid">

        <?php while ($row = $result->fetch_assoc()): ?>

        <div class="project-card">
            <img src="uploads/<?php echo $row['image']; ?>" alt="Project Image">

            <h3><?php echo htmlspecialchars($row['title']); ?></h3>

            <p><?php echo htmlspecialchars($row['description']); ?></p>

            <p class="tech">
                <strong>Tech:</strong>
                <?php echo htmlspecialchars($row['technologies']); ?>
            </p>

            <?php if (!empty($row['github_link'])): ?>
                <a href="<?php echo $row['github_link']; ?>" target="_blank" class="btn-small">
                    View Code
                </a>
            <?php endif; ?>
        </div>

        <?php endwhile; ?>

    </div>
</section>


<section class="contact" id="contact">
    <h2>Contact Me</h2>

    <form method="POST" action="contact.php">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="text" name="phone" placeholder="Your phone no" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send me message</button>
        <button type="submit">whatsapp me</button>
    </form>
</section>

<footer>
    <p>© <?php echo date("Y"); ?> Monari Ediwin. All Rights Reserved.</p>
</footer>

</body>
</html>

<?php $stmt->close(); ?>