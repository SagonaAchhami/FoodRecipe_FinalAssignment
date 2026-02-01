<?php
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    // Localhost config
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "recipe_db";
} else {
    // Server config
    $host = "localhost";
    $user = "np03cs4s250102";
    $pass = "4pOTFRQ1f3";
    $db   = "np03cs4s250102";
}

$pdo = new PDO(
    "mysql:host=$host;dbname=$db;charset=utf8mb4",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
