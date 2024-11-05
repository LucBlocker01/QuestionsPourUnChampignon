document.addEventListener("DOMContentLoaded", function() {
    if (!localStorage.getItem("currentQuestion")) {
        location.replace("index.html");
    }
})

document.getElementById("loser").play()

let res;

localStorage.getItem("lives") === "0" ? res = "Vous êtes tombé à court de vies." : res = "Le temps est écoulé."

document.getElementById("messageText").innerHTML =
res+" Vous avez répondu à "
+localStorage.getItem("currentQuestion")
+"/"+localStorage.getItem("totalQuestions")
+" questions.";