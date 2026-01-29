<?php
require_once "../config/db.php";
require_once "../includes/auth.php";
require_once "../includes/functions.php";

require_login();
require_once "../includes/header.php";
$recipes = $pdo->query("SELECT * FROM recipes")->fetchAll();
?>
<h2>Recipe Dashboard</h2>
<table border="1" cellpadding="8">
<tr>
    <th>Image</th>
    <th>Title</th>
    <th>Cuisine</th>
    <th>Difficulty</th>
    <th>Ingredients</th>
    <th>Instructions</th> 
    <th>Actions</th>
</tr>

<?php foreach($recipes as $r): ?>
<tr>
<td>
<?php if($r['image']): ?>
<img src="../assets/images/<?= escape($r['image']) ?>" width="60">
<?php endif; ?>
</td>

<td><?= escape($r['title']) ?></td>
<td><?= escape($r['cuisine']) ?></td>
<td><?= escape($r['difficulty']) ?></td>

<td>
    <?= escape(implode(', ', json_decode($r['ingredients'], true))) ?>
</td>
<td>
    <?= escape(substr($r['instructions'], 0, 80)) ?>...
</td>

<td>
    <a href="edit.php?id=<?= $r['id'] ?>">Edit</a> |
    <a href="delete.php?id=<?= $r['id'] ?>" class="delete-link"
       onclick="return confirm('Delete this recipe?')">Delete</a>
</td>

</tr>
<?php endforeach; ?>
</table>

<?php require_once "../includes/footer.php"; ?>
