async function main() {
    //Récupération du quiz
    quiz = await quizFetcher()
    //Stockage des vies s'ils n'existent pas
    if (!localStorage.getItem("lives")) {
        localStorage.setItem("lives", JSON.stringify(quiz.lives)) 
    }
    lives = JSON.parse(localStorage.getItem("lives"));
    //Stockage des questions du quiz s'ils n'existent pas
    if (!localStorage.getItem("questions")) {
        localStorage.setItem("questions", JSON.stringify(quiz.questions)) 
    }
    questions = JSON.parse(localStorage.getItem("questions"));
    qIndex = 0
    displayQuestion()
    //Pour chaque bouton, ajouter comme texte la réponse associé à la question et l'index du bouton, et ajouter un event de clic
    buttons.forEach((button, index) => {
        button.addEventListener("click", function() {
            //Si la bonne réponse a été sélectionné, incrémentation de la question +1 dans le stockage, puis rechargement de la page
            if (index === question.correctAnswer) {
                document.getElementById("message").innerHTML = "Bonne réponse!"
                //Si c'était la dernière question, cesser la partie et afficher l'écran de victoire
                if (qIndex+1 === questionsKeys.length) {
                    location.replace("win.html");
                } else {
                    //Sinon passer à la question suivante et jouer le son correct answer
                    document.getElementById("correct-answer").play().then(() => {
                        setTimeout(() => {
                            document.getElementById("correct-answer").currentTime = 1;
                        },50)
                    });
                    localStorage.setItem("currentQuestion", qIndex+1)
                    displayQuestion()
                }
            } else {
                //Sinon, diminution du nombre de vies de 1, y compris dans le stockage, et jouer le son de mauvaise réponse
                
                document.getElementById("wrong-answer").play().then(() => {
                    setTimeout(() => {
                        document.getElementById("wrong-answer").currentTime = 1;
                    }   , 50)
                });
                document.getElementById("message").innerHTML = "Mauvaise réponse! -1 vie"
                lives = lives-1;
                document.getElementById("lives").innerHTML = "Vies restantes : "+lives;
                localStorage.setItem("lives", lives);
                //Si le nombre de vies est à 0 ou moins, cesser la partie et afficher l'écran de perte.
                if (lives <= 0) {
                    localStorage.setItem("totalQuestions", questionsKeys.length)
                    location.replace("lose.html");
                }
            }
        })
        switch(quiz.difficulty) {
            case "very easy":
                document.body.classList.add("veryeasy")
                document.getElementById("question").classList.add("veryeasy")
                document.getElementById("progress").classList.add("veryeasy")
                document.getElementById("lives").classList.add("veryeasy")
                document.querySelector(".answersList").classList.add("veryeasy")
                document.querySelector(".header").classList.add("veryeasy")
            break;
            default:
                document.body.classList.add(quiz.difficulty)
                document.getElementById("question").classList.add(quiz.difficulty)
                document.getElementById("progress").classList.add(quiz.difficulty)
                document.getElementById("lives").classList.add(quiz.difficulty)
                document.querySelector(".answersList").classList.add(quiz.difficulty)
                document.querySelector(".header").classList.add(quiz.difficulty)
        }
    })
}


document.addEventListener("DOMContentLoaded", async function() {
    main();
    document.body.classList.remove("loading");
    document.body.classList.add("loaded");
});

function displayQuestion() {
    //Récupération des boutons
    buttons = [document.getElementById("answer1"), 
        document.getElementById("answer2"), 
        document.getElementById("answer3"), 
        document.getElementById("answer4")]

    //Récupération des clés (index des questions dans le quiz) de la réponse dans un tableau
    questionsKeys = Object.keys(questions)
    // Si le currentQuestion est mis en stock, l'index est mis à la question actuelle (pour afficher la question suivante et non la première)
    if (localStorage.getItem("currentQuestion")) {           
        qIndex = parseInt(localStorage.getItem("currentQuestion"));
    } else {
        localStorage.setItem("currentQuestion", 0)
    }
    //Elément de progression
    document.getElementById("progress").innerHTML = "Question "+(qIndex+1)+"/"+questionsKeys.length;
    //Récupération de la question actuelle
    question = questions[qIndex]
    //Affichage du titre de la question (attribut question)
    document.getElementById("question").innerHTML = question.question
    //Affichage des vies restantes
    document.getElementById("lives").innerHTML = "Vies restantes : "+lives;

    buttons.forEach((button, index) => {
        //Affichage des réponses
        button.innerHTML = question.answers[index]
        //Si le bouton n'est pas associé à une réponse, le cacher
        if (button.innerHTML === "undefined") {
            button.classList.add("hide")
        } else {
            button.classList.remove("hide")
        }
    })
}
