buttons = [document.getElementById("answer1"), 
    document.getElementById("answer2"), 
    document.getElementById("answer3"), 
    document.getElementById("answer4")]

fetch("http://localhost:8000/src/questionGenerator.php").then(
    response => response.json()
).then(
    question => {
        console.log(question.question.correctAnswer)
        document.getElementById("question").innerHTML = question.question.question
        buttons[0].innerHTML = question.question.answers[0]
        buttons[1].innerHTML = question.question.answers[1]
        buttons[2].innerHTML = question.question.answers[2]
        buttons[3].innerHTML = question.question.answers[3]
        buttons.forEach((button, index) => {
            button.addEventListener("click", function() {
                console.log(index, question.question.correctAnswer)
                if (index === question.question.correctAnswer) {
                    document.getElementById("message").innerHTML = "Bonne réponse! :)"
                } else {
                    document.getElementById("message").innerHTML = "Mauvaise réponse! :("
                }
            })
        })
    }
).catch(
    error => console.error("Erreur :", error)
)