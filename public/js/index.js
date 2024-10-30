document.getElementById("start").addEventListener("click", function() {
    location.replace("questions.html");
});

document.getElementById("instructions").addEventListener("click", function() {
    location.replace("instructions.html");
});

if (!localStorage.getItem("difficulty")) {
    localStorage.setItem("difficulty", "veryeasy")
    document.getElementById("veryeasy").classList.add("selected")
} else {
    let difficulty = localStorage.getItem("difficulty")
    document.getElementById(difficulty).classList.add("selected")
}
let buttons = [
    document.getElementById("veryeasy"),
    document.getElementById("easy"),
]

buttons.forEach((button) => {
    button.addEventListener("click", function() {
        localStorage.setItem("difficulty", button.id)
        document.querySelector(".selected").classList.remove("selected")
        button.classList.add("selected")
    })
})
