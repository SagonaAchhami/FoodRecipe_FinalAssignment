<?php
require_once "../config/db.php";
require_once "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (username,password) VALUES (?,?)");
    $stmt->execute([
        $_POST['username'],
        hash('sha256', $_POST['password'])
    ]);
    header("Location: login.php");
}
?>

<h2>Signup</h2>
<form method="post">
    Username <input name="username" required>
    Password <input type="password" name="password" required>
    <button>Signup</button>
</form>

<?php require_once "../includes/footer.php"; ?>
