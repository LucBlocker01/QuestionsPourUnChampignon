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
        //Si questions dans le stockage, les récupérer, sinon les stocker (pour éviter la répétition des questions en raison du mélange)
        if (!localStorage.getItem("questions")) {
            localStorage.setItem("questions", JSON.stringify(response))
        } else {
            response = JSON.parse(localStorage.getItem("questions"))
        }
        //Récupération les clés (index des questions) de la réponse dans un tableau
        questions = Object.keys(response);
        console.log(questions, response)
        // Si le currentQuestion est pas mis en stock, l'index est mis à la question actuelle (pour afficher la question suivante et non la première)
        qIndex = 0;
        if (localStorage.getItem("currentQuestion")) {           
            qIndex = parseInt(localStorage.getItem("currentQuestion"));
        }
        // Si toutes les questions ont été répondu (donc si l'index vaut la longueur de la liste des questions) redirection vers l'écran de victoire
        //Sinon voir clause else
        if (qIndex === questions.length) {
            localStorage.removeItem("currentQuestion")
            localStorage.removeItem("questions")
            window.location.href = "win.html";
        } else {
            question = response[qIndex]
            console.log(response, question)
            //Titre de la question (attribut question)
            document.getElementById("question").innerHTML = question.question
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
                        document.getElementById("message").innerHTML = "Bonne réponse! :)"
                        localStorage.setItem("currentQuestion", qIndex+1)
                        location.reload()
                    } else {
                        document.getElementById("message").innerHTML = "Mauvaise réponse! :("
                    }
                })
            })
            
            buttons.forEach((button, index) => {
                
            })
        }    
        
    }
).catch(
    error => console.error("Erreur :", error)
)