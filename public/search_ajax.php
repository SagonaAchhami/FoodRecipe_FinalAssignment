<?php
require_once "../config/db.php";

$title = $_GET['title'] ?? '';
$cuisine = $_GET['cuisine'] ?? '';
$difficulty = $_GET['difficulty'] ?? '';
$ingredient = $_GET['ingredient'] ?? '';

$sql = "SELECT title FROM recipes WHERE 1";
$params = [];

if ($title) {
    $sql .= " AND title LIKE ?";
    $params[] = "%$title%";
}

if ($cuisine) {
    $sql .= " AND cuisine = ?";
    $params[] = $cuisine;
}

if ($difficulty) {
    $sql .= " AND difficulty = ?";
    $params[] = $difficulty;
}

if ($ingredient) {
    $sql .= " AND ingredients LIKE ?";
    $params[] = "%$ingredient%";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
