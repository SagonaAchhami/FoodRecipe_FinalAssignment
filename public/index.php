<?php
require_once "../config/db.php";
require_once "../includes/auth.php";
require_login();

require_once "../includes/header.php";

$recipes = $pdo->query("SELECT * FROM recipes")->fetchAll();
?>

<h2>Recipe Dashboard</h2>

<table border="1">
<tr>
<th>Title</th><th>Cuisine</th><th>Actions</th>
</tr>
<?php foreach($recipes as $r): ?>
<tr>
<td><?= escape($r['title']) ?></td>
<td><?= escape($r['cuisine']) ?></td>
<td>
<a href="edit.php?id=<?= $r['id'] ?>">Edit</a> |
<a href="delete.php?id=<?= $r['id'] ?>">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once "../includes/footer.php"; ?>
