//Fonction de récupération des questions depuis le générateur php
async function quizFetcher() {
    switch(localStorage.getItem("difficulty")) {
        case "veryeasy":
            lives = 5;
            break;
        case "easy":
            lives = 4;
            break;
        case "impossible":
            lives = 1;
            break;
        default :
            lives = 3;
            break;
    }
    localStorage.setItem("totalLives", lives)
    response = await fetch("http://localhost:8000/src/quizCreator.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "difficulty=" + encodeURIComponent(localStorage.getItem("difficulty"))
              + "&lives=" + encodeURIComponent(lives)
    }).catch(
        error => console.error("Erreur :", error)
    )
    return await response.json()
}

//Fonction qui vide le stockage
function clearStorage() {
    localStorage.removeItem("currentQuestion")
    localStorage.removeItem("questions")
    localStorage.removeItem("lives")
}

const sound = new Audio("sound/interface-button-154180.mp3")

function playSoundHover() {
  sound.currentTime = 0;
  sound.play()
}

document.querySelectorAll("button").forEach(button => {
    if (!button.classList.contains("disabled")) {
        button.addEventListener("mouseover", playSoundHover)
    }
})

