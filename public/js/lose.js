document.getElementById("messageText").innerHTML = 
"Vous êtes tombé à court de vies. Vous avez répondu à "
+localStorage.getItem("currentQuestion")
+"/"+localStorage.getItem("totalQuestions")
+" questions.";