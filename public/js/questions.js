async function main() {
  let timerId
    //Récupération du quiz
    quiz = await quizFetcher()
    //Stockage des vies s'ils n'existent pas
    !localStorage.getItem("lives") && (localStorage.setItem("lives", JSON.stringify(quiz.lives)))
    lives = JSON.parse(localStorage.getItem("lives"));
    //Stockage des questions du quiz s'ils n'existent pas
    !localStorage.getItem("questions") && (localStorage.setItem("questions", JSON.stringify(quiz.questions)))
    questions = JSON.parse(localStorage.getItem("questions"));
    //Définition de qIndex à 0 et afficher la première question
    qIndex = 0
    displayQuestion()
    //Pour chaque bouton, ajouter comme texte la réponse associé à la question et l'index du bouton, et ajouter un event de clic
    buttons.forEach((button, index) => {
        button.addEventListener("click", function () {
            //Si la bonne réponse a été sélectionné, incrémentation de la question +1 dans le stockage, puis rechargement de la page
            if (button.innerHTML === question.correctAnswer) {
                document.getElementById("message").innerHTML = "Bonne réponse!"
                //Si c'était la dernière question, cesser la partie et afficher l'écran de victoire
                if (qIndex + 1 === questionsKeys.length) {
                    location.replace("win.html");
                } else {
                    //Sinon, afficher la question suivante, réinitialisation du timer et jouer le son correct answer
                    document.getElementById("correct-answer").currentTime = 0;
                    document.getElementById("correct-answer").play()
                    localStorage.setItem("currentQuestion", qIndex + 1)
                    localStorage.removeItem("timer")
                    displayQuestion()
                }
            } else {
                //Sinon, diminution du nombre de vies de 1, y compris dans le stockage, et jouer le son de mauvaise réponse
                document.getElementById("wrong-answer").currentTime = 0
                document.getElementById("wrong-answer").play()
                document.getElementById("message").innerHTML = "Mauvaise réponse! -1 vie"
                lives--
                document.getElementById("lives").innerHTML = "Vies restantes : " + lives;
                localStorage.setItem("lives", lives);
                //Si le nombre de vies est à 0 ou moins, cesser la partie et afficher l'écran de perte.
                if (lives <= 0) {
                    localStorage.setItem("totalQuestions", questionsKeys.length)
                    location.replace("lose.html");
                }
            }
        })
        //Ajout de la classe correspondant à la difficulté du quiz aux divers composantes de la page
        document.body.classList.add(quiz.difficulty)
        document.getElementById("question").classList.add(quiz.difficulty)
        document.getElementById("progress").classList.add(quiz.difficulty)
        document.getElementById("lives").classList.add(quiz.difficulty)
        document.getElementById("timer").classList.add(quiz.difficulty)
        document.querySelector(".answersList").classList.add(quiz.difficulty)
        document.querySelector(".header").classList.add(quiz.difficulty)
    })
}

//Initialisation de l'id du timer
let timerId;
//initialisation du son tick
const tick = new Audio("sound/timer-with-chime-101253.mp3")

//Après chargement du DOM, appeler main et changement des classes du body pour afficher le contenu
document.addEventListener("DOMContentLoaded", async function () {
    main();
    document.body.classList.remove("loading");
    document.body.classList.add("loaded");
});

function displayQuestion() {
    //Récupération des boutons
    buttons = document.querySelectorAll("button")
    //Récupération des clés (index des questions dans le quiz) de la réponse dans un tableau
    questionsKeys = Object.keys(questions)
    // Si le currentQuestion est mis en stock, l'index est mis à la question actuelle (pour afficher la question suivante et non la première)
    localStorage.getItem("currentQuestion") ? qIndex = parseInt(localStorage.getItem("currentQuestion"))
    : localStorage.setItem("currentQuestion", 0)
    //Elément de progression
    document.getElementById("progress").innerHTML = "Question " + (qIndex + 1) + "/" + questionsKeys.length;
    //Récupération de la question actuelle
    question = questions[qIndex]
    //Affichage du titre de la question (attribut question)
    document.getElementById("question").innerHTML = question.question
    //Affichage des vies restantes
    document.getElementById("lives").innerHTML = "Vies restantes : " + lives;
    buttons.forEach((button, index) => {
        //Affichage des réponses
        button.innerHTML = question.answers[index]
        //Si le bouton n'est pas associé à une réponse, le cacher
        button.innerHTML === "undefined" ? button.classList.add("hide")
        : button.classList.remove("hide")
    })
    //Gérer le timer
    if (["hard", "impossible"].includes(localStorage.getItem("difficulty"))) {
      //Arrêter le timer déjà en route
      clearTimeout(timerId)
      //Arrêter le son déjà en route
      tick.pause();
      //20 secondes pour "difficile", 10 secondes pour "impossible"
      if (!localStorage.getItem("timer")) {
        switch(localStorage.getItem("difficulty")) {
          case "hard":
            localStorage.setItem("timer", 20);
            break;
          case "impossible":
            localStorage.setItem("timer", 10);
            break;
        }
      }
      //Afficher le timer
      document.getElementById("timer").classList.remove("hide")
      //Démarrage du timer
      startTimer(localStorage.getItem("timer"));
    }
}

function startTimer(timer) {
  //Si le timer n'est pas en-dessous de 0, updater le contenu de timer, diminution du timer de 1, rappeler la fonction avec un setTimeout 1 seconde après
  if (timer >= 0) {
    document.getElementById("timer").innerHTML = timer;
    timer--
    localStorage.setItem("timer", timer)
    timerId = setTimeout(() => startTimer(timer), 1000)
    if (timer === 4) {
      tick.currentTime = 0;
      tick.play();
    }
  } else {
    //Sinon, perdu!
    location.replace("lose.html")
  }
}