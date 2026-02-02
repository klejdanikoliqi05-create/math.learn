<?php
session_start();
require "config/db.php";
require "classes/Content.php";

$db = (new Database())->connect();
$content = new Content($db);
$data = $content->getPage("home");
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mëso Matematikën Vizualisht</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
</head>
<body>
   <header>
    <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
  <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="lesson.php">Leksione</a></li>
       <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="logout1.php">Log Out</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Regjistrohu</a></li>
        <?php endif; ?>
    </ul>
</nav>
</header>

    <section class="hero">
        <h1>Matematika bëhet argëtuese!</h1>
        <p>Shiko shembuj, tabela, grafika dhe animacione të thjeshta për të kuptuar konceptet matematikore.</p>
        <a href="lesson.php" class="btn">Filloni Leksionin</a>
    </section>

    <section class="features">
        <div class="feature">
            <div class="icon">📊</div>
            <h3>Grafikë dhe tabela</h3>
            <p>Shpjegime vizuale të koncepteve kryesore matematikore.</p>
        </div>

        <div class="feature">
            <div class="icon">🧩</div>
            <h3>Ushtrime Interaktive</h3>
            <p>Zgjidh detyra të vizualizuara dhe sfido veten.</p>
        </div>

        <div class="feature">
            <div class="icon">📚</div>
            <h3>Leksione të strukturuara</h3>
            <p>Koncepte të shpjeguara hap pas hapi me shembuj të thjeshtë.</p>
        </div>
    </section>



    
    <?php echo $data['body']; ?>
    <footer>
        <p>@Mëso Matematikën Vizualisht</p>
    </footer>
</body>
</html>
