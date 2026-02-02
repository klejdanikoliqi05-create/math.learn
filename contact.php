<?php
require "config/db.php";
$db=(new Database())->connect();

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $stmt=$db->prepare(
        "INSERT INTO contact (name,email,message) VALUES (?,?,?)"
    );
    $stmt->bind_param("sss",
        $_POST['name'],$_POST['email'],$_POST['message']
    );
    $stmt->execute();
}


<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakti - Mëso Matematikën Vizualisht</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
</head>
<body>
    <header>
        <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">Rreth Nesh</a></li>
                <li><a href="lesson.php">Leksione</a></li>
                <li><a href="register.php">Regjistrohu</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="form-section">
        <h1>Na Kontaktoni</h1>
        <form method="POST" action="contact.php">
            <label for="name">Emri:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mesazhi:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn">Dërgo Mesazhin</button>
        </form>
        <p id="contactMessage"><?php echo $contactMessage; ?></p>
    </section>

    <footer>
        <p>@Mëso Matematikën Vizualisht</p>
    </footer>
</body>
</html>

