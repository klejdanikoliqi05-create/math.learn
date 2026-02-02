<?php
session_start();
require_once "config/db.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = (new Database())->connect();

    $email = trim($_POST["emailLogin"]);
    $password = $_POST["passwordLogin"];

    $stmt = $db->prepare("SELECT id, username, password, role FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["username"] = $user["username"]; 

            header("Location: index.php");
            exit;
        } else {
            $msg = "Fjalëkalimi është gabim!";
        }
    } else {
        $msg = "Email nuk u gjet!";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Mëso Matematikën Vizualisht</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
    <nav>
        <ul>
            
            <li><a href="about.php">Rreth Nesh</a></li>
          
            <li><a href="register.php">Regjistrohu</a></li>
            <li><a href="login.php" class="active">Login</a></li>
            <li><a href="admin-login.php" class="admin-btn">Admin</a></li>

        </ul>
    </nav>
</header>

<section class="form-section">
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label>Email:</label>
        <input type="email" name="emailLogin" required>

        <label>Fjalëkalimi:</label>
        <input type="password" name="passwordLogin" required>

        <button type="submit" class="btn">Login</button>
    </form>
    <p style="color:red;"><?= $msg ?></p>
</section>

<footer>
<p>@Mëso Matematikën Vizualisht</p>
</footer>
</body>
</html>
