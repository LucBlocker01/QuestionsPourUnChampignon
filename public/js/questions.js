//Récupération la liste des boutons
buttons = [document.getElementById("answer1"), 
    document.getElementById("answer2"), 
    document.getElementById("answer3"), 
    document.getElementById("answer4")]

//Récupération les questions définis dans questionGenerator
fetch("http://localhost:8000/src/questionGenerator.php").then(
    response => response.json()
).then(
    response => {

    //Récupération les clés (index des questions) de la réponse dans un tableau
        questions = Object.keys(response);
        // Si le currentQuestion n'est pas mis en stock, on affiche la première question, sinon la question actuelle définit par qIndex
        if (!localStorage.getItem("currentQuestion")) {
            qIndex = 0;
        } else {
            qIndex = localStorage.getItem("currentQuestion");
        }     
        question = response[qIndex]
        console.log(response, question)
        //Titre de la question (attribut question)
        document.getElementById("question").innerHTML = question.question
        //Réponses pour chaque question (attribut answers)
        buttons[0].innerHTML = question.answers[0]
        buttons[1].innerHTML = question.answers[1]
        buttons[2].innerHTML = question.answers[2]
        buttons[3].innerHTML = question.answers[3]
        //Pour chaque bouton, ajouter un event de clic
        buttons.forEach((button, index) => {
            button.addEventListener("click", function() {
                //Si la bonne réponse a été sélectionné, incrémentation de +1 dans le stockage la question, puis rechargement de la page
                if (index === question.correctAnswer) {
                    document.getElementById("message").innerHTML = "Bonne réponse! :)"
                    localStorage.setItem("currentQuestion", qIndex+1)
                    location.reload()
                } else {
                    document.getElementById("message").innerHTML = "Mauvaise réponse! :("
                }
            })
        })
    }
).catch(
    error => console.error("Erreur :", error)
)