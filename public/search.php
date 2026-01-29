<?php
require_once "../includes/header.php";
?>

<h2>Search Recipes</h2>

<div class="container">
<label for="title">Recipe Title:</label>
<input id="title" placeholder="Search by title">

<label for="cuisine">Cuisine:</label>
<input id="cuisine" placeholder="Search by cuisine">

<label for="difficulty">Difficulty:</label>
<select id="difficulty">
    <option value="">All Difficulty</option>
    <option value="Easy">Easy</option>
    <option value="Medium">Medium</option>
    <option value="Hard">Hard</option>
</select>

<label for="ingredient">Ingredient:</label>
<input id="ingredient" placeholder="Ingredient (autocomplete)">
<ul id="ingredient-list" style="border:1px solid #ccc;"></ul>

<hr>

<h3>Results</h3>
<div id="results"></div>
</div>

<script src="../assets/js/script.js"></script>


<?php require_once "../includes/footer.php"; ?>
