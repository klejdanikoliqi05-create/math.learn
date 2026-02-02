<?php
session_start();
require_once "config/db.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role']!=="admin"){
    header("Location: admin-login.php");
    exit;
}


$messages = [
    ["id"=>1,"name"=>"Kleidi","email"=>"kleidi@gmail.com","message"=>"Si funksionon platforma?"],
    ["id"=>2,"name"=>"Arta","email"=>"arta@yahoo.com","message"=>"Kur fillon kursi?"],
    ["id"=>3,"name"=>"Florian","email"=>"florian@outlook.com","message"=>"Kam një problem me detyrat"]
];

$students = [
    ["id"=>1,"username"=>"Kleidi","email"=>"kleidi@gmail.com","created_at"=>"2026-01-15"],
    ["id"=>2,"username"=>"Arta","email"=>"arta@yahoo.com","created_at"=>"2026-01-20"],
    ["id"=>3,"username"=>"Florian","email"=>"florian@outlook.com","created_at"=>"2026-01-25"]
];

$payments = [
    ["username"=>"Kleidi","Janar"=>50,"Shkurt"=>50,"Mars"=>50,"Prill"=>0,"Maj"=>0,"Qershor"=>0],
    ["username"=>"Arta","Janar"=>50,"Shkurt"=>50,"Mars"=>0,"Prill"=>0,"Maj"=>0,"Qershor"=>0],
    ["username"=>"Florian","Janar"=>50,"Shkurt"=>50,"Mars"=>50,"Prill"=>50,"Maj"=>0,"Qershor"=>0]
];
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="dashboard-header">
    <div class="logo">🧮 Dashboard Admin</div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="logout.php" class="logout-btn">Log Out</a></li>
        </ul>
    </nav>
</header>

<main class="dashboard-container">

    <section class="dashboard-section">
        <h2>✉️ Mesazhet nga Kontakti</h2>
        <div class="table-container">
            <table>
                <tr><th>ID</th><th>Emri</th><th>Email</th><th>Mesazhi</th></tr>
                <?php foreach($messages as $msg): ?>
                <tr>
                    <td><?= $msg['id'] ?></td>
                    <td><?= $msg['name'] ?></td>
                    <td><?= $msg['email'] ?></td>
                    <td><?= $msg['message'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>

   
    <section class="dashboard-section">
        <h2>👥 Nxënësit e Regjistruar</h2>
        <div class="table-container">
            <table>
                <tr><th>ID</th><th>Username</th><th>Email</th><th>Data Regjistrimit</th></tr>
                <?php foreach($students as $stu): ?>
                <tr>
                    <td><?= $stu['id'] ?></td>
                    <td><?= $stu['username'] ?></td>
                    <td><?= $stu['email'] ?></td>
                    <td><?= $stu['created_at'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>

   
    <section class="dashboard-section">
        <h2>💳 Pagesat e Studentëve</h2>
        <div class="table-container">
            <table>
                <tr><th>Student</th><th>Janar</th><th>Shkurt</th><th>Mars</th><th>Prill</th><th>Maj</th><th>Qershor</th></tr>
                <?php foreach($payments as $pay): ?>
                <tr>
                    <td><?= $pay['username'] ?></td>
                    <td><?= $pay['Janar'] ?>€</td>
                    <td><?= $pay['Shkurt'] ?>€</td>
                    <td><?= $pay['Mars'] ?>€</td>
                    <td><?= $pay['Prill'] ?>€</td>
                    <td><?= $pay['Maj'] ?>€</td>
                    <td><?= $pay['Qershor'] ?>€</td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>

</main>

</body>
</html>