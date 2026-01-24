<?php
require_once "../config/db.php";
require_once "../includes/auth.php";
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "INSERT INTO recipes (title,cuisine,difficulty,ingredients,instructions)
         VALUES (?,?,?,?,?)"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['cuisine'],
        $_POST['difficulty'],
        json_encode(explode(',', $_POST['ingredients'])),
        $_POST['instructions']
    ]);
    header("Location: index.php");
}

require_once "../includes/header.php";
?>

<h2>Add Recipe</h2>
<form method="post">
Title <input name="title"><br>
Cuisine <input name="cuisine"><br>
Difficulty <select name="difficulty">
<option>Easy</option><option>Medium</option><option>Hard</option>
</select><br>
Ingredients <input name="ingredients"><br>
Instructions <textarea name="instructions"></textarea><br>
<button>Add</button>
</form>

<?php require_once "../includes/footer.php"; ?>
