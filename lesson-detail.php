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
                <li><a href="register.php">Regjistrohu</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">Rreth Nesh</a></li>
                <li><a href="lesson.php">Leksione</a></li>
                <li><a href="exercise.php">Shko Te Detyrat</a></li>
            </ul>
        </nav>
    </header><section class="lesson-detail-container">

    <div class="lesson-header">
        <h1 id="lessonTitle">Detaje Leksioni</h1>
        <p id="lessonDescription">Zgjidh konceptet matematikore përmes shembujve dhe shpjegimeve vizuale.</p>
    </div>

    <div class="lesson-content" id="lessonContent"></div>

    <a href="lesson.php" class="btn back-btn">Kthehu tek Leksionet</a>
</section>

<script>
const params = new URLSearchParams(window.location.search);
const lesson = params.get('lesson');
const content = document.getElementById('lessonContent');

if(lesson === 'algebra') {
    document.getElementById('lessonTitle').textContent = 'Algebra';
    document.getElementById('lessonDescription').textContent = 'Algebra: Zgjidh ekuacione, punon me variabla dhe formula.';
    
    content.innerHTML = `
        <div class="lesson-card algebra-card">
            <h2>Çfarë është Algebra?</h2>
            <p>Algebra është dega e matematikës që përdor simbole për të përfaqësuar numra dhe marrëdhënie midis tyre.</p>

            <h3>Përdorimi</h3>
            <ul>
                <li>Zgjidhja e ekuacioneve</li>
                <li>Lidhja e variablave me formula</li>
                <li>Analiza e modeleve matematikore</li>
            </ul>

            <h3>Shembuj të thjeshtë</h3>
            <table>
                <tr><th>Ekuacioni</th>
                <th>Zgjidhja</th></tr>
                <tr><td>2x + 3 = 7</td><td>x = 2</td></tr>
                <tr><td>x + 2 = 5</td><td>x=3</td></tr>
            </table>

            <p>Algebra përdoret në shkencë, teknologji dhe ekonominë e përditshme për të modeluar probleme reale.</p>
        </div>
    `;
}
else if(lesson === 'geometry') {
    document.getElementById('lessonTitle').textContent = 'Gjeometri';
    document.getElementById('lessonDescription').textContent = 'Gjeometri: Studimi i formave, sipërfaqeve dhe hapësirave.';
    
    content.innerHTML = `
        <div class="lesson-card geometry-card">
            <h2>Çfarë është Gjeometria?</h2>
            <p>Gjeometria merret me studimin e formave, madhësive dhe marrëdhënieve në hapësirë dhe plan.</p>

            <h3>Përdorimi</h3>
            <ul>
                <li>Krijimi i dizajneve dhe arkitekturës</li>
                <li>Llogaritja e sipërfaqeve dhe perimetrave</li>
                <li>Grafikë kompjuterike dhe animacione</li>
            </ul>

            <h3>Shembuj Vizual</h3>
            <div class="geometry-shapes">
                <div class="shape square"></div>
                <div class="shape circle"></div>
                <div class="shape triangle"></div>
            </div>

            <p>Këto forma përdoren për të kuptuar marrëdhëniet mes dimensioneve dhe për të zgjidhur probleme praktike në botën reale.</p>
        </div>
    `;
}
else if(lesson === 'statistics') {
    document.getElementById('lessonTitle').textContent = 'Statistika';
    document.getElementById('lessonDescription').textContent = 'Statistika: Mbledhja, analiza dhe interpretimi i të dhënave.';
    
    content.innerHTML = `
        <div class="lesson-card statistics-card">
            <h2>Çfarë është Statistika?</h2>
            <p>Statistika është shkenca që merret me mbledhjen, analizimin dhe interpretimin e të dhënave për të nxjerrë konkluzione.</p>

            <h3>Përdorimi</h3>
            <ul>
                <li>Analiza e të dhënave ekonomike dhe shoqërore</li>
                <li>Krijimi i grafikeve dhe tabelave për të kuptuar trendet</li>
                <li>Marrja e vendimeve bazuar në të dhëna reale</li>
            </ul>

            <h3>Shembuj Vizual</h3>
            <table>
                <tr><th>Kategoria</th><th>Vlera</th></tr>
                <tr><td>A</td><td>5</td></tr>
                <tr><td>B</td><td>8</td></tr>
                <tr><td>C</td><td>2</td></tr>
            </table>

            <div class="bar-chart">
                <div class="bar" style="height:50px;">A</div>
                <div class="bar" style="height:80px;">B</div>
                <div class="bar" style="height:20px;">C</div>
            </div>

            <p>Statistika përdoret në biznes, shkencë dhe teknologji për të marrë vendime të informuara.</p>
        </div>
    `;
}
else {
    content.innerHTML = '<p>Leksioni nuk u gjet.</p>';
}
</script>

<footer>
        <p>@Mëso Matematikën Vizualisht</p>
    </footer>
    <body>
        <html>