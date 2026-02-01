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

<div class="login-page">
    <div class="login-box">
        <h2>Admin Login</h2>

        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<?php require_once "../includes/footer.php"; ?>
