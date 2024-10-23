async function main() {
    quiz = await quizFetcher()
    
    console.log(quiz)
    if (!localStorage.getItem("lives")) {
        localStorage.setItem("lives", JSON.stringify(quiz.lives)) 
    }
    lives = JSON.parse(localStorage.getItem("lives"));
    if (!localStorage.getItem("questions")) {
        localStorage.setItem("questions", JSON.stringify(quiz.questions)) 
    }
    questions = JSON.parse(localStorage.getItem("questions"));
    //Récupération des boutons
    buttons = [document.getElementById("answer1"), 
        document.getElementById("answer2"), 
        document.getElementById("answer3"), 
        document.getElementById("answer4")]

    //Récupération les clés (index des questions dans le quiz) de la réponse dans un tableau
    questionsKeys = Object.keys(questions);
    console.log(questionsKeys, questions)
    // Si le currentQuestion est pas mis en stock, l'index est mis à la question actuelle (pour afficher la question suivante et non la première)
    qIndex = 0;
    if (localStorage.getItem("currentQuestion")) {           
        qIndex = parseInt(localStorage.getItem("currentQuestion"));
    } else {
        localStorage.setItem("currentQuestion", 0)
    }
    document.getElementById("progress").innerHTML = "Question "+(qIndex+1)+"/"+questionsKeys.length;
    // Si toutes les questions ont été répondu (donc si l'index vaut la longueur de la liste des questions) redirection vers l'écran de victoire
    //Sinon voir clause else
    if (qIndex === questionsKeys.length) {
        clearStorage()
        window.location.href = "win.html";
    } else {
        question = questions[qIndex]
        console.log(quiz, question)
        //Titre de la question (attribut question)
        document.getElementById("question").innerHTML = question.question
        document.getElementById("lives").innerHTML = "Vies restantes : "+lives;
        //Réponses pour chaque question (attribut answers)
        //Pour chaque bouton, ajouter comme texte la réponse associé à la question et l'index du bouton, et ajouter un event de clic
        buttons.forEach((button, index) => {
            button.innerHTML = question.answers[index]
            console.log(button.innerHTML, button.innerHTML === "undefined")
            if (button.innerHTML === "undefined") {
                button.classList.add("hide")
            }
            button.addEventListener("click", function() {
                //Si la bonne réponse a été sélectionné, incrémentation de la question +1 dans le stockage, puis rechargement de la page
                if (index === question.correctAnswer) {
                    document.getElementById("message").innerHTML = "Bonne réponse!"
                    localStorage.setItem("currentQuestion", qIndex+1)
                    location.reload()
                } else {
                    document.getElementById("message").innerHTML = "Mauvaise réponse! -1 vie"
                    lives = lives-1;
                    document.getElementById("lives").innerHTML = "Vies restantes : "+lives;
                    localStorage.setItem("lives", lives);
                    if (lives <= 0) {
                        localStorage.setItem("totalQuestions", questionsKeys.length)
                        window.location.href = "lose.html";
                    } 
                }
            })
        })
    }
}

main();

