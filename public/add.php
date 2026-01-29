<?php
require_once "../config/db.php";
require_once "../includes/auth.php";
require_once "../includes/functions.php";

require_login();
$csrf = generate_csrf_token();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verify_csrf_token($_POST['csrf_token'])) {
        die("Invalid CSRF token");
    }

    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageName = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $imageName);
    }

    $stmt = $pdo->prepare(
        "INSERT INTO recipes (title,cuisine,difficulty,ingredients,instructions,image)
         VALUES (?,?,?,?,?,?)"
    );

    $stmt->execute([
        $_POST['title'],
        $_POST['cuisine'],
        $_POST['difficulty'],
        json_encode(explode(',', $_POST['ingredients'])),
        $_POST['instructions'],
        $imageName
    ]);

    header("Location: index.php");
    exit;
}

require_once "../includes/header.php";
?>

<h2>Add Recipe</h2>

<div class="container">
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="<?= $csrf ?>">

<label>Title:</label>
<input name="title" required>

<label>Cuisine:</label>
<input name="cuisine" required>

<label>Difficulty:</label>
<select name="difficulty">
<option>Easy</option>
<option>Medium</option>
<option>Hard</option>
</select>

<label>Ingredients:</label>
<input name="ingredients">

<label>Image:</label>
<input type="file" name="image">

<label>Instructions:</label>
<textarea name="instructions"></textarea>

<button>Add</button>
</form>
</div>

<?php require_once "../includes/footer.php"; ?>
