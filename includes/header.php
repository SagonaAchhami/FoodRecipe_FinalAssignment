<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Food Recipe Database</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<nav>
<?php if(is_logged_in()): ?>
    <a href="index.php">Dashboard</a> |
    <a href="add.php">Add Recipe</a> |
    <a href="search.php">Search</a> |
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Admin Login</a>
<?php endif; ?>

</nav>
<hr>
