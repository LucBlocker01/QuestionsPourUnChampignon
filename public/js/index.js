document.getElementById("start").addEventListener("click", function() {
    location.replace("questions.html");
});

document.getElementById("instructions").addEventListener("click", function() {
    location.replace("instructions.html");
});

if (!localStorage.getItem("difficulty")) {
    localStorage.setItem("difficulty", "veryeasy")
    document.getElementById("veryeasy").classList.add("selected")
    document.getElementById("veryeasy").classList.removeEventListener("mouseover", playSoundHover)
} else {
    let difficulty = localStorage.getItem("difficulty")
    document.getElementById(difficulty).classList.add("selected")
    document.getElementById(difficulty).removeEventListener("mouseover", playSoundHover)
}
let buttons = [
    document.getElementById("veryeasy"),
    document.getElementById("easy"),
]

buttons.forEach((button) => {
    button.addEventListener("click", function() {
        localStorage.setItem("difficulty", button.id)
        let selectedButton = document.querySelector(".selected")
        selectedButton.classList.remove("selected")
        selectedButton.addEventListener("mouseover", playSoundHover)
        button.classList.add("selected")
        button.removeEventListener("mouseover", playSoundHover)
    })
})
