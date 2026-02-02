<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detyra – Mëso Matematikën Vizualisht</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            
            <li><a href="lesson.php">Leksione</a></li>
        </ul>
    </nav>
</header>

<main class="container">

    <h1>Ushtrime:</h1>
    <div class="exercise-card">
        <p>1️⃣ 5 + 7 = ?</p>
        <input type="number" id="u1">
        <button onclick="check('u1', 12, 'r1')">Kontrollo</button>
        <span id="r1"></span>
    </div>

    
    <div class="exercise-card">
        <p>2️⃣ 3 × 4 = ?</p>
        <input type="number" id="u2">
        <button onclick="check('u2', 12, 'r2')">Kontrollo</button>
        <span id="r2"></span>
    </div>

<div class="exercise-card">
    <p>3️⃣ 6 × 7 = ?</p>
    <input type="number" id="u3">
    <button onclick="check('u3', 42, 'r3')">Kontrollo</button>
    <span id="r3"></span>
</div>

<div class="exercise-card">
    <p>4️⃣ 8 ÷ 2 = ?</p>
    <input type="number" id="u4">
    <button onclick="check('u4', 4, 'r4')">Kontrollo</button>
    <span id="r4"></span>
</div>

<div class="exercise-card">
    <p>5️⃣ 9 × 5 = ?</p>
    <input type="number" id="u5">
    <button onclick="check('u5', 45, 'r5')">Kontrollo</button>
    <span id="r5"></span>
</div>

<div class="exercise-card">
    <p>6️⃣ 20 ÷ 4 = ?</p>
    <input type="number" id="u6">
    <button onclick="check('u6', 5, 'r6')">Kontrollo</button>
    <span id="r6"></span>
</div>

<div class="exercise-card">
    <p>7️⃣ 7 × 3 = ?</p>
    <input type="number" id="u7">
    <button onclick="check('u7', 21, 'r7')">Kontrollo</button>
    <span id="r7"></span>
</div>

<div class="exercise-card">
    <p>8️⃣ 18 ÷ 3 = ?</p>
    <input type="number" id="u8">
    <button onclick="check('u8', 6, 'r8')">Kontrollo</button>
    <span id="r8"></span>
</div>


   <section class="graphs">
    <h2>📈 Funksione:</h2>
    <p>Funksionet rriten sipas x-it:<p>

    <div class="graph-row">
        <div class="graph-card">
            <p>f(x) = x</p>
            <canvas id="g1"></canvas>
        </div>

        <div class="graph-card">
            <p>f(x) = x²</p>
            <canvas id="g2"></canvas>
        </div>

        <div class="graph-card">
            <p>f(x) = 0.1x³ - x</p>
            <canvas id="g3"></canvas>
        </div>

        <div class="graph-card">
            <p>f(x) = sin(x)</p>
            <canvas id="g4"></canvas>
        </div>

        <div class="graph-card">
            <p>f(x) = cos(x)</p>
            <canvas id="g5"></canvas>
        </div>
    </div>
</section>
   <a href="index.php" class="home-btn">🏠 Kthehu në Home</a>


</main>

<script src="scripts.js"></script>
</body>
</html>
