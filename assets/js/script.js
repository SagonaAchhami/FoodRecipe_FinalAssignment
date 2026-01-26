const title = document.getElementById("title");
const cuisine = document.getElementById("cuisine");
const difficulty = document.getElementById("difficulty");
const ingredient = document.getElementById("ingredient");

function search() {
    const params = new URLSearchParams({
        title: title.value,
        cuisine: cuisine.value,
        difficulty: difficulty.value,
        ingredient: ingredient.value
    });

    fetch("search_ajax.php?" + params)
        .then(res => res.json())
        .then(data => {
            document.getElementById("results").innerHTML =
                data.map(r => `<li>${r.title}</li>`).join("");
        });
}

[title, cuisine, difficulty, ingredient].forEach(el =>
    el.addEventListener("input", search)
);
ingredient.addEventListener("input", function () {
    if (this.value.length < 2) return;

    fetch("ingredient_ajax.php?q=" + this.value)
        .then(res => res.json())
        .then(data => {
            document.getElementById("ingredient-list").innerHTML =
                data.map(i => `<li onclick="selectIngredient('${i}')">${i}</li>`).join("");
        });
});

function selectIngredient(value) {
    ingredient.value = value;
    document.getElementById("ingredient-list").innerHTML = "";
    search();
}
