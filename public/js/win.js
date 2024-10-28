if (localStorage.getItem("lives") === localStorage.getItem("totalLives")) {
    document.getElementById("cheers").play()
    document.querySelector(".messageText").innerHTML = "Parfait! Vous avez répondu à toutes les questions sans perdre une seule vie!"
} else {
    document.querySelector(".messageText").innerHTML = "Vous avez répondu à toutes les questions!"
}

document.getElementById("winner").play()

clearStorage()