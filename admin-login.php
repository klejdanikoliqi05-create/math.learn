<?php
session_start();
require_once "config/db.php";
$db = new Database();
$conn = $db->connect();

$loginMessage = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email=? AND role='admin'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows === 1){
        $admin = $res->fetch_assoc();
        if(password_verify($password, $admin["password"])){
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = $admin['role'];
            header("Location: dashboard.php");
            exit;
        }
    }
    $loginMessage = "Email ose fjalëkalim gabim!";
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    <div class="logo">🧮 Mëso Matematikën Vizualisht</div>
     <nav>
        <ul>
            <li><a href="register.php">Regjistrohu</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="about.php">Rreth Nesh</a></li>
        </ul>
    </nav>

</header>
<section class="form-section">
    <h1>Admin Login</h1>
    <form method="POST" action="admin-login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Fjalëkalimi:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" class="btn">Login</button>
    </form>
    <p style="color:red;"><?= $loginMessage ?></p>
</section>
<footer>
    <p>@Mëso Matematikën Vizualisht</p>
</footer>
</body>
</html>