<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leksione - Mëso Matematikën Vizualisht</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
</head>
<body>
<header>
    <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
    <nav>
        <ul>
           
            <li><a href="index.php">Home</a></li>
            <li><a href="lesson.php" class="active">Leksione</a></li>
           <a href="/math.learn/exercise.php"><button class="nav-btn">Shko te Detyrat</button></a>

        </ul>
    </nav>
</header>

<div class="lesson-cards container">
    <div class="lesson-card algebra">
        <div class="card-header">🧮 Algebra</div>
        <p class="card-desc">Mëso ekuacione, formula dhe ushtrime vizuale.</p>
        <a href="lesson-detail.php?lesson=algebra" class="btn btn-primary">Hap Leksionin</a>
    </div>
    <div class="lesson-card geometry">
        <div class="card-header">📐 Gjeometri</div>
        <p class="card-desc">Figura, sipërfaqe dhe perimetra me vizualizime të qarta.</p>
        <a href="lesson-detail.php?lesson=geometry" class="btn btn-primary">Hap Leksionin</a>
    </div>
    <div class="lesson-card statistics">
        <div class="card-header">📊 Statistika</div>
        <p class="card-desc">Mesatare, mediana, modë dhe grafika vizuale.</p>
        <a href="lesson-detail.php?lesson=statistics" class="btn btn-primary">Hap Leksionin</a>
    </div>
</div>

<section id="categories" class="container">
    <h2 class="section-title">Kategoritë e Matematikës</h2>
    <div class="categories-container">
        <div class="category">
            <div class="icon">🧮</div>
            <h3>Llogaritje</h3>
            <p>Metoda të shpejta për të llogaritur, funksione dhe ekuacione të thjeshta.</p>
        </div>
        <div class="category">
            <div class="icon">📐</div>
            <h3>Gjeometri Vizuale</h3>
            <p>Figura dhe sipërfaqe të vizualizuara me ngjyra dhe forma.</p>
        </div>
        <div class="category">
            <div class="icon">📊</div>
            <h3>Statistika dhe Grafikë</h3>
            <p>Diagramë, grafika dhe tabela për të kuptuar shpejt të dhënat.</p>
        </div>
    </div>
</section>


<footer>
    <p>@Mëso Matematikën Vizualisht</p>
</footer>
</body>
</html>
