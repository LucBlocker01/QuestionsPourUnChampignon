document.addEventListener("DOMContentLoaded", function() {
    if (!localStorage.getItem("currentQuestion")) {
        location.replace("index.html");
    }
})



document.getElementById("messageText").innerHTML = 
"Vous êtes tombé à court de vies. Vous avez répondu à "
+localStorage.getItem("currentQuestion")
+"/"+localStorage.getItem("totalQuestions")
+" questions.";