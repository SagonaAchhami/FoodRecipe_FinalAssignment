<?php
require_once "../config/db.php";
require_once "../includes/auth.php";
require_once "../includes/functions.php";

require_login();

$csrf_token = generate_csrf_token();

$recipes = $pdo->query("SELECT * FROM recipes")->fetchAll();

require_once "../includes/header.php";
?>

<h2>Recipe Dashboard</h2>

<table border="1" cellpadding="8" style="width:100%; border-collapse:collapse;">
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
    <td style="text-align:center;">
        <?php if($r['image']): ?>
            <img src="../assets/images/<?= escape($r['image']) ?>" width="60" alt="Recipe Image">
        <?php endif; ?>
    </td>

    <td><?= escape($r['title']) ?></td>
    <td><?= escape($r['cuisine']) ?></td>
    <td><?= escape($r['difficulty']) ?></td>

    <td><?= escape(implode(', ', json_decode($r['ingredients'], true))) ?></td>
    <td><?= escape(substr($r['instructions'], 0, 80)) ?>...</td>

  <td>
    <a href="edit.php?id=<?= $r['id'] ?>">Edit</a> |

    <a href="#" class="delete-link" data-id="<?= $r['id'] ?>">Delete</a>

    <form method="post" action="delete.php" class="delete-form" style="display:none;">
        <input type="hidden" name="id" value="<?= $r['id'] ?>">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    </form>
</td>
</tr>
<?php endforeach; ?>

</table>
<script>
document.querySelectorAll('.delete-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); 
        if(confirm('Are you sure you want to delete this recipe?')) {
            const form = this.nextElementSibling; 
            form.submit(); 
        }
    });
});
</script>

<?php require_once "../includes/footer.php"; ?>
