<?php
require "config/db.php";
require "classes/User.php";

$msg = "";
$msgClass = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $db = (new Database())->connect();
    $user = new User($db);
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirmPassword'];

    if($password !== $confirm){
        $msg = "Fjalëkalimet nuk përputhen!";
        $msgClass = "error";
    } elseif($user->exists($email)) {
        $msg = "Ky email ekziston tashmë!";
        $msgClass = "error";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        if($user->register($username, $email, $hashed)){
            $msg = "✅ Regjistrimi u krye me sukses, tani mund të bëni login!";
            $msgClass = "success"; 
        } else {
            $msg = "Diçka shkoi gabim, provoni përsëri!";
            $msgClass = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Regjistrohu - Mëso Matematikën Vizualisht</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
    <nav>
        <ul>
            
            <li><a href="about.php">Rreth Nesh</a></li>
           
            <li><a href="register.php" class="active">Regjistrohu</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>

<section class="form-section">
    <h1>Regjistrohu</h1>
    <form method="POST" action="register.php">
        <label>Emri përdoruesit:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Fjalëkalimi:</label>
        <input type="password" name="password" required>

        <label>Konfirmo fjalëkalimin:</label>
        <input type="password" name="confirmPassword" required>

        <button type="submit" class="btn">Regjistrohu</button>
    </form>
    <p style="color:red;"><?= $msg ?></p>
</section>
<?php if($msg != ""): ?>
    <p class="<?= $msgClass ?>"><?= $msg ?></p>
<?php endif; ?>

<footer>
<p>@Mëso Matematikën Vizualisht</p>
</footer>
</body>
</html>

