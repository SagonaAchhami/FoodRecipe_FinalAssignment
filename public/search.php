<?php require_once "../includes/header.php"; ?>

<h2>Search Recipes</h2>

<input id="title" placeholder="Search by title"><br><br>

<select id="cuisine">
    <option value="">All Cuisines</option>
    <option>Italian</option>
    <option>Indian</option>
    <option>Chinese</option>
</select>

<select id="difficulty">
    <option value="">All Difficulty</option>
    <option>Easy</option>
    <option>Medium</option>
    <option>Hard</option>
</select>

<br><br>

<input id="ingredient" placeholder="Ingredient (autocomplete)">
<ul id="ingredient-list"></ul>

<hr>

<ul id="results"></ul>

<?php require_once "../includes/footer.php"; ?>
