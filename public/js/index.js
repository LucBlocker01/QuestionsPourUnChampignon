document.getElementById("start").addEventListener("click", function() {
    location.replace("questions.html");
});

document.getElementById("instructions").addEventListener("click", function() {
    location.replace("instructions.html");
});

if (!localStorage.getItem("difficulty")) {
    localStorage.setItem("difficulty", "very easy")
    document.getElementById("veryeasy").classList.add("selected")
} else {
    let difficulty = localStorage.getItem("difficulty")
    difficulty === "very easy" && (difficulty = "veryeasy")
    document.getElementById(difficulty).classList.add("selected")
}
let buttons = [
    document.getElementById("veryeasy"),
    document.getElementById("easy"),
]

buttons.forEach((button) => {
    button.addEventListener("click", function() {
        localStorage.setItem("difficulty", button.id)
        if (localStorage.getItem("difficulty") === "veryeasy") {
            localStorage.setItem("difficulty", "very easy")
        }
        document.querySelector(".selected").classList.remove("selected")
        button.classList.add("selected")
    })
})
