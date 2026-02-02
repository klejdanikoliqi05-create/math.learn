<?php
session_start();
require "config/db.php";
if(!isset($_SESSION['role']) || $_SESSION['role'] !== "admin"){
    die("No access");
}

$db = (new Database())->connect();
$result = $db->query("SELECT id, username, email, role FROM users");
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Users - Dashboard</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Users</h2>
<table border="1" cellpadding="5">
<tr>
<th>ID</th><th>Username</th><th>Email</th><th>Role</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['username'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['role'] ?></td>
</tr>
<?php endwhile; ?>
</table>
<a href="dashboard.php">Kthehu tek Dashboard</a>
</body>
</html>
