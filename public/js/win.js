if (localStorage.getItem("lives") === "3") {
    document.getElementById("cheers").play()
    document.querySelector(".messageText").innerHTML = "Parfait! Vous avez répondu à toutes les questions sans perdre une seule vie!"
} else {
    document.querySelector(".messageText").innerHTML = "Vous avez répondu à toutes les questions!"
}

document.getElementById("winner").play()

clearStorage()