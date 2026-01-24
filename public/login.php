<?php
require_once "../config/db.php";
require_once "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && hash('sha256', $_POST['password']) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    }
    echo "Invalid login";
}
?>

<h2>Login</h2>
<form method="post">
    Username <input name="username">
    Password <input type="password" name="password">
    <button>Login</button>
</form>

<p>New user? <a href="signup.php">Signup here</a></p>

<?php require_once "../includes/footer.php"; ?>
