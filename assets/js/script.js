document.getElementById("search")?.addEventListener("input", function(){
    fetch("search_ajax.php?q=" + this.value)
        .then(res => res.json())
        .then(data => {
            document.getElementById("results").innerHTML =
                data.map(r => `<li>${r.title}</li>`).join("");
        });
});
