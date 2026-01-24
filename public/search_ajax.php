<?php
require_once "../config/db.php";
$q = $_GET['q'] ?? '';
$stmt = $pdo->prepare("SELECT title FROM recipes WHERE title LIKE ?");
$stmt->execute(["%$q%"]);
echo json_encode($stmt->fetchAll());
