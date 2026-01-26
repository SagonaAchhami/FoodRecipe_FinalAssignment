<?php
require_once "../includes/header.php";

$ADMIN_USER = "sagona";
$ADMIN_PASS = "anogas"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        $_POST['username'] === $ADMIN_USER &&
        $_POST['password'] === $ADMIN_PASS
    ) {
        $_SESSION['user_id'] = 1;
        $_SESSION['is_admin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid admin credentials";
    }
}
?>

<h2>Admin Login</h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="post">
    Username <input name="username" required>
    Password <input type="password" name="password" required>
    <button>Login</button>
</form>

<?php require_once "../includes/footer.php"; ?>
