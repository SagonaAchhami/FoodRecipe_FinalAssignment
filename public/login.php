<?php
require_once "../includes/header.php";

$ADMIN_USER = "sagona";
$ADMIN_HASH = password_hash("anogas", PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        $_POST['username'] === $ADMIN_USER &&
        password_verify($_POST['password'], $ADMIN_HASH)
    ) {
        $_SESSION['user_id'] = 1;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>

<h2>Admin Login</h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="post">
Username <input name="username" required><br>
Password <input type="password" name="password" required>
<button>Login</button>
</form>

<?php require_once "../includes/footer.php"; ?>
