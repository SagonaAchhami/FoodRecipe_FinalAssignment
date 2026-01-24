<?php
require_once "../config/db.php";
require_once "../includes/auth.php";

require_login();

$id = $_GET['id'] ?? null;
if(!$id) die("Invalid recipe ID.");

$stmt = $pdo->prepare("DELETE FROM recipes WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
